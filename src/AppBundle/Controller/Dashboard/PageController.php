<?php

namespace AppBundle\Controller\Dashboard;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

/**
 * Page controller.
 *
 * @Route("dashboard/page")
 */
class PageController extends Controller
{
    /**
     * Lists all page entities.
     *
     * @Route("/", name="page_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
    
        $dql   = 'SELECT a FROM AppBundle:Post a WHERE a.postType=2 ORDER BY a.id DESC';
        $query = $em->createQuery($dql);
    
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );
    
        return $this->render('dashboard/page/index.html.twig', array(
            'pagination' => $pagination
        ));
    }

    /**
     * Creates a new page entity.
     *
     * @Route("/new", name="page_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $page = new Post();
        $form = $this->createForm('AppBundle\Form\PageType', $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $now = new \DateTime("now");
            $page->setCreateDate($now);
            $page->setStatus(1);
    
            $page->setPostType(
                $em->getRepository('AppBundle:PostType')->find(2)
            );
            
            $em->persist($page);
            $em->flush();
    
            $this->addFlash(
                'notice',
                'Nova página adicionada com sucesso!'
            );

            return $this->redirectToRoute('page_index');
        }

        return $this->render('dashboard/page/new.html.twig', array(
            'page' => $page,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a page entity.
     *
     * @Route("/{id}", name="page_show")
     * @Method("GET")
     */
    public function showAction(Post $page)
    {
        $deleteForm = $this->createDeleteForm($page);

        return $this->render('dashboard/page/show.html.twig', array(
            'page' => $page,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing page entity.
     *
     * @Route("/{id}/edit", name="page_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Post $page)
    {
        $deleteForm = $this->createDeleteForm($page);
        $editForm = $this->createForm('AppBundle\Form\PageType', $page);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
    
            $this->addFlash(
                'notice',
                'Página editada com sucesso!'
            );
    
    
            return $this->redirectToRoute('page_index');
        }
    
        if($page->getFeatureImage() != '') {
            $page->setFeatureImage(
                new File($this->getParameter('upload_directory') . '/' . $page->getFeatureImage())
            );
            //$featureImage = '/uploads/images/' . $page->getFeatureImage();
        } else {
            //$featureImage = '';
        }
        
        return $this->render('dashboard/page/edit.html.twig', array(
            'page' => $page,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            //'featureImage' => $featureImage,
        ));
    }

    /**
     * Deletes a page entity.
     *
     * @Route("/{id}", name="page_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Post $page)
    {
        $form = $this->createDeleteForm($page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($page);
            $em->flush();
        }

        return $this->redirectToRoute('page_index');
    }

    /**
     * Creates a form to delete a page entity.
     *
     * @param Post $page The page entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Post $page)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('page_delete', array('id' => $page->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
