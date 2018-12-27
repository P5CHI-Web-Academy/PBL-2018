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
use AdministrationBundle\Entity\Tag;
use AdministrationBundle\Form\TagType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class TagsController extends Controller
{
    /**
     *  Lists all tags
     *
     *  @Route("/admin/tags", name="tags")
     *
     *  @return Response
     */
    public function list() : Response {
        $tags = $this->getDoctrine()->getRepository(Tag::class)->findAll();

        return $this->render('@Administration/Tags/listOfTags.html.twig', [
            'tags' => $tags,
        ]);
    }

    /**
     *  Creates a new Tag in system
     *
     *  @Route("/admin/tag/new", name = "tag_new", methods={"GET", "POST"})
     *
     *  @param Request $request
     *  @param EntityManagerInterface $em
     *
     *  @return RedirectResponse|Response
     */
    public function create(Request $request, EntityManagerInterface $em) : Response {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('tags');
        }

        return $this->render('@Administration/Tags/createTag.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Edit existing tag entity
     *
     * @Route("/admin/tag/edit/{id}", name="tag_edit", methods={"GET", "POST"})
     *
     * @param Request $request
     * @param Tag $tag
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function edit(Request $request, Tag $tag, EntityManagerInterface $em) : Response
    {
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('tags');
        }

        return $this->render('@Administration/Tags/editTag.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Delete slide functionality
     *
     * @Route("/admin/tag/delete/{id}", name = "tag_delete", methods = {"GET", "POST"})
     *
     * @param Request $request
     * @param Tag $tag
     * @param EntityManagerInterface $em
     *
     * @return Response
     */

    public function delete(Request $request, Tag $tag, EntityManagerInterface $em) : Response{
        if(!$tag){
            throw $this->createNotFoundException("No tag was found!");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($tag);
        $em->flush();

        return $this->redirectToRoute('tags');
    }
}