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
        $entityManager = $this->getDoctrine()->getManager();
        $slideRepository =  $entityManager->getRepository('AdministrationBundle:Slide');

        $slides = $slideRepository->getSlidesByLocationName($location);

        dump($slides);

        return $this->render('@Display/Display/display.html.twig',array(
            'slides' => $slides
        ));
    }
}