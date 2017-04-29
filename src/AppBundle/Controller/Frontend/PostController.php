<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 * @Route("post")
 */
class PostController extends Controller
{
    /**
     * Finds and displays a post entity.
     *
     * @Route("/{id}", name="post_view")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {
        return $this->render('frontend/post/show.html.twig', array(
            'post' => $post,
        ));
    }
}
