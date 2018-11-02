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
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $locations =  $entityManager->getRepository(Location::class)->findAll();

        if(!$locations) die('error while finding locations');

        return $this->render(
            '@Administration/Locations/locations.html.twig',
            array('locations' => $locations)
        );
    }
}
