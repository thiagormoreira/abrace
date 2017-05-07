<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Blog controller.
 *
 * @Route("blog")
 */
class BlogController extends Controller
{
    /**
     * @Route("/", name="blog")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $dql   = 'SELECT a FROM AppBundle:Post a WHERE a.status=1 ORDER BY a.createDate DESC';
        $query = $em->createQuery($dql);
        
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );
        
        return $this->render('frontend/blog/index.html.twig', array(
            'pagination' => $pagination
        ));
    }
    
    /**
     * Finds and displays a post entity.
     *
     * @Route("/{title}", name="post_view")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {
        return $this->render('frontend/blog/show.html.twig', array(
            'post' => $post,
        ));
    }
}
