<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\AdministrationBundle;
use AdministrationBundle\Entity\Location;
use AdministrationBundle\Entity\Slide;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class SlidesController extends Controller
{
    /**
     * @Route("/admin/slides", name="slides")
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $slides =  $entityManager->getRepository(Slide::class)->findAll();

        if(!$slides) die('error while finding fetching');

        return $this->render(
            '@Administration/Slides/slides.html.twig',
            array('slides' => $slides)
        );
    }
}