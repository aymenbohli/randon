<?php
/**
 * Created by PhpStorm.
 * User: AymenB
 * Date: 27/12/2019
 * Time: 10:12
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function Home(){
        return  $this->render('front/home.html.twig');
    }

}