<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param CarRepository $carRepository
     * @return Response
     */
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        CarRepository $carRepository
    ) {
        /** @var Car $car */
        $car = new Car();
        /** @var FormInterface $carForm */
        $carForm = $this->createForm(CarType::class, $car);
        $carForm->handleRequest($request);
        if ($carForm->isSubmitted() && $carForm->isValid()) {
            /** @var Car $car */
            $car = $carForm->getData();

            $entityManager->persist($car);
            $entityManager->flush();
        }

        /** @var Car[] $cars */
        $cars = $carRepository->findAll();

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'car_form' => $carForm->createView(),
            'cars' => $cars
        ]);
    }
}
