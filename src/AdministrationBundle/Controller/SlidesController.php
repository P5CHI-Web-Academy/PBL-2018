<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\AdministrationBundle;
use AdministrationBundle\Entity\Location;
use AdministrationBundle\Entity\Slide;
use AdministrationBundle\Form\SlideType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SlidesController extends Controller
{
    /**
     * List all slides in system
     *
     * @Route("/admin/slides", name = "slide.list")
     *
     * @return Response
     */
    public function list() : Response {
        $slides = $this->getDoctrine()->getRepository(Slide::class)->findAll();

        return $this->render('@Administration/Slides/listOfSlides.html.twig',[
            'slides' => $slides,
        ]);
    }

    /**
     * Shows slide
     *
     * @Route("/admin/slides/show/{id}", name = "slide.show")
     *
     * @param Slide $someSlide
     *
     * @return Response
     */
    public function show(Slide $someSlide) : Response {
        return $this->render('@Administration/Slides/showSlide.html.twig', [
            'someSlide' => $someSlide,
        ]);
    }

    /**
     * Create new slide in the system
     *
     * @Route("/admin/slides/new", name = "slide.create", methods = {"GET", "POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $em
     *
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function create(Request $request, EntityManagerInterface $em) : Response {
        $slide = new Slide();
        $slide->setCreatedBy($this->getUser());
        $slide->setUpdatedBy($this->getUser());
        $slide->setCreatedAt(new \DateTime("now"));
        $slide->setUpdatedAt(new \DateTime("now"));
        //create form for setting new slide
        $form = $this->createForm(SlideType::class, $slide);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($slide);
            $em->flush();

            return $this->redirectToRoute('slide.list');
        }

        return $this->render('@Administration/Slides/createSlide.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Edit slide
     *
     * @Route("/admin/slide/edit/{id}", name = "slide.edit", methods = {"GET", "POST"})
     *
     * @param Request $request
     * @param Slide $slide
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function edit(Request $request, Slide $slide, EntityManagerInterface $em) : Response {
        $slide->setUpdatedBy($this->getUser());
        $slide->setUpdatedAt(new \DateTime("now"));

        $form = $this->createForm(SlideType::class, $slide);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('slide.list');
        }

        return $this->render('@Administration/Slides/editSlide.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Delete slide functionality
     *
     * @Route("/admin/slide/delete/{id}", name = "slide.delete", methods = {"GET", "POST"})
     *
     * @param Request $request
     * @param Slide $slide
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function delete(Request $request, Slide $slide, EntityManagerInterface $em) : Response{
        if(!$slide){
            throw $this->createNotFoundException("No tag was found!");
        }

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($slide);
        $em->flush();

        return $this->redirectToRoute('slide.list');
    }

}














