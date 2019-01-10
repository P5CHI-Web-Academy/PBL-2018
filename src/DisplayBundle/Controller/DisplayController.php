<?php

namespace DisplayBundle\Controller;

use AdministrationBundle\Entity\Slide;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        /** If it is needed to delete expired slides automatically
         *
         *  $slideRepository =  $this->getDoctrine()->getManager()
         *      ->getRepository('AdministrationBundle:Slide');
         *  $slideRepository->deleteExpiredSlides();
         */

        return $this->render('@Display/Display/display.html.twig', array(
            'location' => $location
        ));
    }

    /**
     * @Route("/fetch/{location}", name="fetch")
     * @param $location
     * @return JsonResponse
     */
    public function fetchSlides($location): JsonResponse
    {
        $slideRepository =  $this->getDoctrine()->getManager()
            ->getRepository(Slide::class);

        $slides = $slideRepository->getEnabledSlidesByLocationName($location);
        $slides = $slideRepository->filterSlides($slides);

        $response = new JsonResponse($slides);

        return $response;
    }
}