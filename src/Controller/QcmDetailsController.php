<?php

namespace App\Controller;

use App\Entity\Qcm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class QcmDetailsController extends AbstractController
{
    #[Route('/qcm/{id}', name: 'app_qcm_details')]
    public function index(int $id): Response
    {
        $qcm = $this->entityManager->getRepository(Qcm::class)->find($id);

        if (!$qcm) {
            throw $this->createNotFoundException('The QCM does not exist');
        }

        return $this->render('qcm_details/show.html.twig', [
            'qcm' => $qcm,
        ]);
    }
}
