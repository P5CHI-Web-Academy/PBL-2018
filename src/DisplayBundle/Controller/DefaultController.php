<?php

namespace DisplayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/display", name="display")
     */
    public function indexAction()
    {
        die('display');
    }
}
