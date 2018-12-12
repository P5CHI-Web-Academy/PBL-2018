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
        $slideRepository =  $this->getDoctrine()->getManager()
            ->getRepository('AdministrationBundle:Slide');

        $slideRepository->deleteExpiredSlides();

        return $this->render('@Display/Display/display.html.twig', array(
            'location' => $location
        ));
    }

    /**
     * @Route("/fetch/{location}", name="fetch")
     * @param $location
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function fetchSlides($location): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $slideRepository =  $this->getDoctrine()->getManager()
            ->getRepository('AdministrationBundle:Slide');

        $slides = $slideRepository->getEnabledSlidesByLocationName($location);
        $slides = $slideRepository->filterSlides($slides);

        return $this->json($slides);
    }
}