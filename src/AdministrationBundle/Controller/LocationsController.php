<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\AdministrationBundle;
use AdministrationBundle\Entity\Location;
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
     * @Route("/admin/locations/edit/{id}", name="location_edit")
     */
    public function editLocation($id){

        return $this->render(
            '@Administration/Locations/edit.html.twig',
            array()
        );
    }

    /**
     * @Route("/admin/locations/new", name="location_new")
     */
    public function newLocation(){

        return $this->render('@Administration/Locations/new.html.twig');
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