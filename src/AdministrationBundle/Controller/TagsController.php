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
     *  @Route("/admin/tag/listOfTags", name="tag.list")
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
     *  Finds and displays a job entity.
     *
     *  @Route("/admin/tag/{id}/show", name="tag.show")
     *
     *  @param Tag $someTag
     *
     *  @return Response
     */
    public function show(Tag $someTag) : Response {
        $deleteForm = $this->deleteForm($someTag);

        return $this->render('@Administration/Tags/showTag.html.twig', [
            'someTag' => $someTag,
            'deleteForm' => $deleteForm->createView(),
        ]);
    }

    /**
     *  Creates a new Tag in system
     *
     *  @Route("/admin/tag/create", name = "tag.create", methods={"GET", "POST"})
     *
     *  @param Request $request
     *  @param EntityManagerInterface $em
     *
     *  @return RedirectResponse|Response
     */
    public function create(Request $request, EntityManagerInterface $em) : Response {
        $tag = new Tag();
        //create form for setting new tag
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('tag.list');
        }

        return $this->render('@Administration/Tags/createTag.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Edit existing tag entity
     *
     * @Route("/admin/tag/{id}/edit", name="tag.edit", methods={"GET", "POST"})
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

            return $this->redirectToRoute('tag.list');
        }

        return $this->render('@Administration/Tags/editTag.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Creates a form to delete Tag
     *
     * @return FormInterface
     */
    private function deleteForm(Tag $tag) : FormInterface{
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tag.delete', ['id' => $tag->getId()]))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Delete a tag functionality
     *
     * @Route("/admin/tag/{id}/delete", name="tag.delete", methods="DELETE")
     *
     * @param Request $request
     * @param Tag $tag
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function delete(Request $request, Tag $tag, EntityManagerInterface $em) : Response{
        $form = $this->deleteForm($tag);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->remove($tag);
            $em->flush();
        }

        return $this->redirectToRoute('tag.list');
    }
}