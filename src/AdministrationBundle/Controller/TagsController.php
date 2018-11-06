<?php
/**
 * Created by PhpStorm.
 * User: filpatterson
 * Date: 11/6/18
 * Time: 12:02 PM
 */

namespace AdministrationBundle\Controller;

use AdministrationBundle\AdministrationBundle;
use AdministrationBundle\Entity\Location;
use AdministrationBundle\Entity\Slide;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class TagsController extends Controller
{
    /**
     * @Route("/admin/tags", name = "tags")
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tags =  $entityManager->getRepository(Tag::class)->findAll();

        if(!$tags) die('error while finding tags');

        return $this->render(
            '@Administration/Tags/tags.html.twig',
            array('tags' => $tags)
        );
    }
}