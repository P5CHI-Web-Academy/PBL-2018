<?php

namespace AdministrationBundle\Repository;
/**
 * SlideRepository
 */
class SlideRepository extends \Doctrine\ORM\EntityRepository
{
    public function getEnabledSlidesByLocationName($location): array
    {
        date_default_timezone_set('Europe/Chisinau');

        $query = $this->_em->createQuery('
            SELECT s, sch, t, l
            FROM AdministrationBundle:Slide s
                JOIN s.tags t
                JOIN t.locations l
                JOIN s.schedule sch
            WHERE l.location = :location and s.enabled = 1 
                and ( s.startDate <= CURRENT_DATE() and s.endDate > CURRENT_DATE() )
        ')->setParameter('location', $location);

        return $query->getArrayResult();
    }

    public function filterSlides($slides) : array
    {
        date_default_timezone_set('Europe/Chisinau');
        $currentTime = date('H:i');
        $currentDate = new \DateTime(date('Y-m-d'));

        for($i = 0, $iMax = count($slides); $i < $iMax; $i++){
            $activeTimeStart = $slides[$i]['activeTimeStart']->format('H:i');
            $activeTimeEnd = $slides[$i]['activeTimeEnd']->format('H:i');
            if($currentTime < $activeTimeStart || $currentTime > $activeTimeEnd){
                unset($slides[$i]);
                continue;
            }

            $type = $slides[$i]['typeOfSchedule'];
            $step = $slides[$i]['step'];
            $createdAtDate = $slides[$i]['createdAt'];
            $timeDiff = $currentDate->diff($createdAtDate);

            // every # days
            if($type === 1) {
                if($timeDiff->days % $step !== 0){
                    unset($slides[$i]);
                }
            }
            // every # week
            else if($type === 2) {
                if(($timeDiff->days / 7 + 1) % $step !== 0){
                    unset($slides[$i]);
                }
                $actual = false;
                foreach($slides[$i]['schedule'] as $schedule){
                    if($schedule['day'] == date('N')){
                        $actual = true;
                    }
                }
                if(!$actual){
                    unset($slides[$i]);
                }
            }
            // every # month
            else if($type === 3) {
                if($timeDiff->m % $step !== 0){
                    unset($slides[$i]);
                }
                $actual = false;
                foreach($slides[$i]['schedule'] as $schedule){
                    if($schedule['day'] == date('j')){
                        $actual = true;
                    }
                }
                if(!$actual){
                    unset($slides[$i]);
                }
            }
        }

        return $slides;
    }

    public function deleteExpiredSlides(): void
    {
        date_default_timezone_set('Europe/Chisinau');

        $query = $this->_em->createQuery('
            SELECT sl.id
            FROM AdministrationBundle:Slide sl
            WHERE sl.endDate < CURRENT_DATE()
        ');

        foreach($query->getResult() as $slide){
            $this->_em->createQuery('
                DELETE AdministrationBundle:Schedule sch
                WHERE sch.slide = :id
            ')->setParameter('id', $slide['id'])->execute();

            $this->_em->createQuery('
                DELETE AdministrationBundle:Slide sl
                WHERE sl.id = :id
            ')->setParameter('id', $slide['id']) ->execute();
        }
    }
}