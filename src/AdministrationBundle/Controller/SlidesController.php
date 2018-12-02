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
     * @throws \Exception
     */
    public function listSlides()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $slides =  $entityManager->getRepository(Slide::class)->findAll();

        if(!$slides){
            throw new \Exception('error while fetching slides');
        }

        return $this->render(
            '@Administration/Slides/slides.html.twig',
            array('slides' => $slides)
        );
    }

    /**
     * @Route("/admin/slides/preview/{id}", name="slide_preview")
     * @throws \Exception
     */
    public function previewSlide($id){
        $entityManager = $this->getDoctrine()->getManager();
        $slide = $entityManager->getRepository(Slide::class)->find($id);

        if(!$slide){
            throw new \Exception('Slide with this id not found');
        }


        return $this->render(
            '@Administration/Slides/preview.html.twig',
            array('slide' => $slide)
        );
    }

    /**
     * @Route("/admin/slides/edit/{id}", name="slide_edit")
     * @throws \Exception
     */
    public function editSlide($id){
        $entityManager = $this->getDoctrine()->getManager();
        $slide = $entityManager->getRepository(Slide::class)->find($id);

        if(!$slide){
            throw new \Exception('Slide with this id not found.');
        }

        return $this->render(
            '@Administration/Slides/edit.html.twig',
            array('slide' => $slide)
        );
    }

    /**
     * @Route("/admin/slides/new", name="slide_new")
     */
    public function newSlide(){

        return $this->render(
            '@Administration/Slides/new.html.twig'
        );
    }

    /**
     * @Route("/admin/slides/deletion/{id}", name="slide_delete")
     */
    public function deleteSlide($id){
        $entityManaget = $this->getDoctrine()->getManager();

        $slide = $this->getDoctrine()
            ->getRepository(Slide::class)
            ->find($id);

        $entityManaget->remove($slide);
        $entityManaget->flush();

        return $this->redirectToRoute("slides");
    }
}















