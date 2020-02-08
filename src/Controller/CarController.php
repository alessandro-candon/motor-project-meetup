<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index()
    {
        /** @var Car $car */
        $car = new Car();
        /** @var FormInterface $carForm */
        $carForm = $this->createForm(CarType::class, $car);

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'car_form' => $carForm->createView()
        ]);
    }
}
