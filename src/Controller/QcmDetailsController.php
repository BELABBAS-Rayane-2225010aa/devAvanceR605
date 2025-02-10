<?php

namespace App\Controller;

use App\Entity\Qcm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;

final class QcmDetailsController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager ,Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    #[Route('/qcm/{id}', name: 'app_qcm_details')]
    public function index(int $id): Response
    {
        $qcm = $this->entityManager->getRepository(Qcm::class)->find($id);

        if (!$qcm) {
            throw $this->createNotFoundException('The QCM does not exist');
        }

        return $this->render('qcm_details/index.html.twig', [
            'qcm' => $qcm,
        ]);
    }
}
