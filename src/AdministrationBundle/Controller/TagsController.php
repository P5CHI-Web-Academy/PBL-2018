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
     *  @Route("/admin/listOfTags", name="tag.list")
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
     *  @Route("/{id}/show", name="tag.show")
     *
     *  @param Tag $tag
     *
     *  @return Response
     */
    public function show(Tag $tag) : Response {
        return $this->render('@Administration/Tags/showTag.html.twig', [
            'tag' => $tag,
        ]);
    }

    /**
     *  Creates a new Tag in system
     *
     *  @Route("/Tag/Create", name = "tag.create", methods={"GET", "POST"})
     *
     *  @param Request @request
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
     * Edit existing job entity
     *
     * @Route("/Tag/{id}/edit", name="tag.edit", methods={"GET", "POST"})
     *
     * @param Request $request
     * @param Tag $tag
     * @param EntityManagerInterface $em
     *
     * @return Response
     */
    public function edit(Request $request, Tag $tag, EntityManagerInterface $em) : Response
    {
        $form = $this->createForm(JobType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('tag.list');
        }

        return $this->render('@Administration/Tags/editTag.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}