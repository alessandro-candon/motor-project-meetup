<?php

namespace App\Controller;

use App\Entity\Color;
use App\Repository\ColorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController
{
    /**
     * @Route("/color", name="color")
     * @param ColorRepository $colorRepository
     * @return Response
     */
    public function index(ColorRepository $colorRepository)
    {
        /** @var Color[] $colors */
        $colors = $colorRepository->findAll();

        return $this->render('color/index.html.twig', [
            'colors' => $colors,
        ]);
    }
}
