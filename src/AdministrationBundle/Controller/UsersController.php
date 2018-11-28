<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\Entity\Slide;
use AdministrationBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;

class UsersController extends Controller
{
    /**
     * @Route("/admin/users", name="users")
     *
     */
    public function indexAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Slide[] $slides */
        $slides =  $entityManager->getRepository(Slide::class)->findAll();

        if(!$slides){
            throw new \RuntimeException("error while fetching users");
        }

        return $this->render(
            '@Administration/Users/users.html.twig',
            array('slides' => $slides)
        );
    }

//    /**
//     * @Route("/admin/users/new", name="users_new", methods={"GET", "POST"})
//     *
//     * @param Request $request
//     * @param EntityManagerInterface $em
//     *
//     * @return RedirectResponse|Response
//     */
//    public function newUser(Request $request, EntityManagerInterface $em) : Response
//    {
//        $location = new User();
//        $form = $this->createForm(LocationType::class, $location);
//        $form->handleRequest($request);
//
//        if($form->isSubmitted() && $form->isValid()){
//            $em->persist($location);
//            $em->flush();
//
//            return $this->redirectToRoute('locations');
//        }
//
//        return $this->render('@Administration/Locations/new.html.twig', array(
//            'form' => $form->createView()
//        ));
//
//        return $this->render(
//            '@Administration/Users/new.html.twig', array(
//
//            )
//        );
//    }
}
