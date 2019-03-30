<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('layout_extends/layout_ext_home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/moncompte", name="page_moncompte")
     */
    public function moncompte()
    {
        return $this->render('layout_extends/user/layout_ext_myaccount.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
