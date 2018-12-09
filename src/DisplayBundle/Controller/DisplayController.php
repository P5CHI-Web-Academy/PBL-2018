<?php

namespace DisplayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DisplayController extends Controller
{
    /**
     * @Route("/display/{location}", name="display")
     * @param $location
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function displaySlides($location): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('@Display/Display/display.html.twig', array(
            'location' => $location
        ));
    }

    /**
     * @Route("/fetch/{location}", name="fetch")
     * @param $location
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fetchSlides($location): \Symfony\Component\HttpFoundation\Response
    {
        $slideRepository =  $this->getDoctrine()->getManager()
            ->getRepository('AdministrationBundle:Slide');
        $slides = $slideRepository->getEnabledSlidesByLocationName($location);

        $slides = $this->filterSlides($slides);

        return $this->json($slides);
    }

    private function filterSlides($slides) : array
    {
        date_default_timezone_set('Europe/Chisinau');
        $currentTime = date('H:i');
        $currentDate = new \DateTime(date('Y-m-d'));

        dump($currentDate);


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

            if($type === 1) {
                if($timeDiff->days % $step !== 0){
                    unset($slides[$i]);
                    continue;
                }
            }
            else if($type === 2) {

            }
            else if($type === 3) {

            }
        }

        return $slides;
    }
}