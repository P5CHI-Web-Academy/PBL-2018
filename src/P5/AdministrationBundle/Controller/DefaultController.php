<?php

namespace P5\AdministrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="homepage")
     */
    public function indexAction()
    {
        die('admin');
    }
}
