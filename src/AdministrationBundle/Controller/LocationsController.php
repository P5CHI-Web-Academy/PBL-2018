<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\AdministrationBundle;
use AdministrationBundle\Entity\Location;
use AdministrationBundle\Entity\Tag;
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
//        $entityManager = $this->getDoctrine()->getManager();
//        $locations =  $entityManager->getRepository(Location::class)->findAll();
//
//        if(!$locations){
//            throw new \Exception("error while fetching locations");
//        }
//
//        return $this->render(
//            '@Administration/Locations/locations.html.twig',
//            array('locations' => $locations)
//        );

        $entityManager = $this->getDoctrine()->getManager();
        $tags =  $entityManager->getRepository(Tag::class)->findAll();

        if(!$tags){
            throw new \Exception("error while fetching tags");
        }

        return $this->render(
            '@Administration/Locations/locations.html.twig',
            array('tags' => $tags)
        );
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
