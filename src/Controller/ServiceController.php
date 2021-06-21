<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Service;
use App\Repository\ServiceRepository;
use App\Repository\EmployeeRepository;

class ServiceController extends AbstractController
{
    /**
     * @Route("/service", name="service")
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }
    
     /**
    * @Route("/service/{id}", name="service_id")
    */
    public function show(Service $service, EmployeeRepository $employeeRepository): Response
    {
        return new Response($this->render('service/show.html.twig', [
            'service' => $service,
            'employees' => $employeeRepository->findBy(['service' => $service->getId()]),
    ]));
    }

}
