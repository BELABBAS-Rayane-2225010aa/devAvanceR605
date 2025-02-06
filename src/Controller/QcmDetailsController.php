<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class QcmDetailsController extends AbstractController
{
    #[Route('/qcm/details', name: 'app_qcm_details')]
    public function index(): Response
    {
        return $this->render('qcm_details/index.html.twig', [
            'controller_name' => 'QcmDetailsController',
        ]);
    }
}
