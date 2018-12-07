<?php

namespace DisplayBundle\Controller;

use AdministrationBundle\Entity\Location;
use AdministrationBundle\Entity\Slide;
use AdministrationBundle\Entity\Tag;
use Doctrine\ORM\PersistentCollection;
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
//        $location = $this->getDoctrine()->getRepository(Location::class)
//            ->findOneBy(
//                array('location' => $location)
//            );

//        $tags = $location->getTags();

//        return $this->render('@Display/Display/display.html.twig',array(
//            'tags' => $tags
//        ));

//        return $this->json($tags);
    }
}