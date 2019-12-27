<?php
/**
 * Created by PhpStorm.
 * User: AymenB
 * Date: 27/12/2019
 * Time: 10:31
 */

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/admin")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard", methods={"GET"})
     */
    public function Home()
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'User tried to access a page without having ROLE_SUPER_ADMIN');
        return $this->render('back/dashboard.html.twig');
    }

}