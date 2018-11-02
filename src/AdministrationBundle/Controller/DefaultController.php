<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="homepage")
     */
    public function indexAction()
    {

    }
}
