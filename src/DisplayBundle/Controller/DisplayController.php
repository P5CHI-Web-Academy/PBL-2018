<?php

namespace DisplayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\DateTime;

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

        date_default_timezone_set('Europe/Chisinau');
        $current_time = date('H:i');
        for($i = 0, $iMax = count($slides); $i < $iMax; $i++){
            $activeTimeStart = $slides[$i]['activeTimeStart']->format('H:i');
            $activeTimeEnd = $slides[$i]['activeTimeEnd']->format('H:i');
            if($current_time < $activeTimeStart || $current_time > $activeTimeEnd){
                unset($slides[$i]);
            }
        }

        return $this->json($slides);
    }
}