<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('welcome/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }
}
