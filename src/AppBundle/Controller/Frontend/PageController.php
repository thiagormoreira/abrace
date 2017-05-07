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
 * @Route("/")
 */
class PageController extends Controller
{
    /**
     * Finds and displays a page entity.
     *
     * @Route("/{title}", name="page_view")
     * @Method("GET")
     */
    public function showAction(Post $page)
    {
        return $this->render('frontend/page/show.html.twig', array(
            'page' => $page,
        ));
    }
}
