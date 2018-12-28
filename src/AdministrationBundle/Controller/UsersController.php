<?php

namespace AdministrationBundle\Controller;

use AdministrationBundle\Entity\User;
use AdministrationBundle\Form\ChangePassword;
use AdministrationBundle\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use \AdministrationBundle\Resources\views\base;


class UsersController extends Controller
{
    /**
     * @Route("/admin/users", name="users")
     *
     */
    public function listUsers(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users =  $entityManager->getRepository(User::class)->findBy(
            array('isDeleted' => 0)
        );

        if(!$users){
            throw new \RuntimeException('error while fetching users');
        }

        return $this->render(
            '@Administration/Users/users.html.twig',
            array('users' => $users, 'logged_in_user' => $this->getUser())
        );
    }

    /**
     * @Route("/admin/users/new", name="users_new", methods={"GET", "POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $em
     *
     * @return RedirectResponse|Response
     */
    public function newUser(Request $request, EntityManagerInterface $em) : Response
    {
        if(!$this->getUser()->isSupervisor()){
            return $this->redirectToRoute('homepage');
        }

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setIsDeleted(false);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('users');
        }

        return $this->render('@Administration/Users/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/users/edit/{id}", name="user_edit", methods={"GET", "POST"})
     *
     * @param $id
     * @param Request $request
     *
     * @return Response
     */
    public function editUser($id, Request $request) : Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->find($id);

        $form = $this->createForm(UserType::class,
            $user,
            array('logged_in_user' => $this->getUser())
        );

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render('@Administration/Users/edit.html.twig', array(
            'form' => $form->createView(),
            'logged_in_user' => $this->getUser()
        ));
    }

    /**
     * @Route("/admin/users/deletion/{id}", name="user_delete")
     * @param $id
     * @return RedirectResponse
     */
    public function deleteUser($id): RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if($user) {
            $user->setIsDeleted(true);
        }

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('users');
    }

    /**
     * @Route("/admin/users/change_password", name="change_password")
     * @param Request $request
     * @return Response
     */
    public function changePasswordAction(Request $request): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(ChangePassword::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($form->get('password')->getData());
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('account');
        }

        return $this->render('@Administration/Users/change_password.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
