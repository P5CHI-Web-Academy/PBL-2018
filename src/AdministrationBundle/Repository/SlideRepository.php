<?php

namespace AdministrationBundle\Repository;

/**
 * SlideRepository
 */
class SlideRepository extends \Doctrine\ORM\EntityRepository
{
    public function getEnabledSlidesByLocationName($location): array
    {
        $query = $this->_em->createQuery('
            SELECT s, sch, t, l
            FROM AdministrationBundle:Slide s
                JOIN s.tags t
                JOIN t.locations l
                JOIN s.schedule sch
            WHERE l.location = :location and s.enabled = 1
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

            $type = $slides[$i]['schedule'][0]['type'];
            $step = $slides[$i]['step'];
            $createdAtDate = $slides[$i]['createdAt'];
            $timeDiff = $currentDate->diff($createdAtDate);
            dump($timeDiff);

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
            }
            // every # month, predefined days
            else if($type === 31) {
                if($timeDiff->m % $step !== 0){
                    unset($slides[$i]);
                }
            }
            // every # month, selected days
            else if($type === 32) {
                if($timeDiff->m % $step !== 0){
                    unset($slides[$i]);
                }
            }
        }
        
        return $slides;
    }
}
