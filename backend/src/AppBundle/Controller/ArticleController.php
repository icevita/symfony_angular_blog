<?php

namespace AppBundle\Controller;

use Doctrine\ORM\Query;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

/**
 * Article controller.
 *
 * @Rest\RouteResource("Article")
 */
class ArticleController extends FOSRestController
{
    /**
     * Lists all Article entities.
     *
     * @return array|JsonResponse
     *
     * @Rest\Get("/articles")
     * @Rest\View
     */
    public function indexAction()
    {
        $em       = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('AppBundle:Article')->findAll();

        return $articles;
    }

    /**
     * Creates a new Article entity.
     *
     * @param Request $request
     * @return Article|JsonResponse
     *
     * @Rest\Post("/articles")
     * @Rest\View
     */
    public function createAction(Request $request)
    {
        $article = new Article();
        $form    = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
        } else {
            return new JsonResponse((string)$form->getErrors(true), 409);
        }

        return $article;
    }

    /**
     * Finds and displays a Article entity.
     *
     * @param $id
     * @return Article|JsonResponse
     *
     * @Rest\Get("/articles/{id}")
     * @Rest\View
     */
    public function viewAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        /** @var Article $article */
        $article = $em->getRepository('AppBundle:Article')->find($id);

        return $article;
    }

    /**
     * Displays a form to edit an existing Article entity.
     *
     * @param Request $request
     * @param $id
     * @return Article|JsonResponse
     *
     * @Rest\Put("/articles/{id}")
     * @Rest\View
     */
    public function updateAction(Request $request, $id)
    {
        $em      = $this->getDoctrine()->getManager();
        /** @var Article $article */
        $article = $em->getRepository('AppBundle:Article')->find($id);

        $form = $this->createForm(ArticleType::class, $article, ['method' => 'PUT']);
        $form->handleRequest($request);
        
        if ($article === null) {
            return new JsonResponse('No data found', 404);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
        }

        return $article;
    }

    /**
     * Deletes a Article entity.
     *
     * @param $id
     * @return Article|null|JsonResponse
     *
     * @Rest\Delete("/articles/{id}")
     * @Rest\View
     */
    public function deleteAction($id)
    {
        $em      = $this->getDoctrine()->getManager();
        /** @var Article $article */
        $article = $em->getRepository('AppBundle:Article')->find($id);

        if ($article === null) {
            return new JsonResponse('No data found', 404);
        }

        $em->remove($article);
        $em->flush();

        return $article;
    }
}
