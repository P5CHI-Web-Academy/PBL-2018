<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\Entity\Slide;
use AdministrationBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends Controller
{
    /**
     * @Route("/admin/account", name="account")
     */
    public function account(): \Symfony\Component\HttpFoundation\Response
    {
        $logged_in_user = $this->getUser();
        $id = $logged_in_user->getId();

        $entityManager = $this->getDoctrine()->getManager();
        $own_slides = $entityManager->getRepository(Slide::class)
            ->findBy(
                array('createdBy' => $id)
            );

        return $this->render(
            '@Administration/Account/account.html.twig',
            array(
                'logged_in_user' => $logged_in_user,
                'own_slides' => $own_slides
            )
        );
    }
}
