<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\Entity\Location;
use AdministrationBundle\Form\LocationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class LocationsController extends Controller
{
    /**
     * @Route("/admin/locations", name="locations")
     * @throws \Exception
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $locations =  $entityManager->getRepository(Location::class)->findAll();

        if(!$locations){
            throw new \Exception("error while fetching locations");
        }

        return $this->render(
            '@Administration/Locations/locations.html.twig',
            array('locations' => $locations)
        );
    }

    /**
     * @Route("/admin/locations/edit/{id}", name="location_edit", methods={"GET", "POST"})
     *
     * @param Request $request
     *
     * @return Response
     */
    public function editLocation($id, Request $request) : Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $location = $this->getDoctrine()
            ->getRepository(Location::class)
            ->find($id);

        $form = $this->createForm(LocationType::class, $location);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
//            $entityManager->persist($location);
            $entityManager->flush();
            return $this->redirectToRoute('locations');
        }

        return $this->render('@Administration/Locations/edit.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/admin/locations/new", name="location_new", methods={"GET", "POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $em
     *
     * @return RedirectResponse|Response
     */
    public function newLocation(Request $request, EntityManagerInterface $em) : Response {
        $location = new Location();
        $form = $this->createForm(LocationType::class, $location);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($location);
            $em->flush();

            return $this->redirectToRoute('locations');
        }

        return $this->render('@Administration/Locations/new.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/admin/locations/deletion/{id}", name="location_delete")
     */
    public function deleteLocation($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $location = $this->getDoctrine()
            ->getRepository(Location::class)
            ->find($id);

        $entityManager->remove($location);
        $entityManager->flush();

        return $this->redirectToRoute('locations');
    }
}
