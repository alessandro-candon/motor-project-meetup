<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Security("is_granted('ROLE_ADMIN') and is_granted('ROLE_FRIENDLY_USER')")
     * @Route("/car", name="car")
     */
    public function index()
    {
        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }
}
