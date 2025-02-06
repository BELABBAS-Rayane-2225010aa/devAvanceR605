<?php

namespace App\Controller;

use App\Entity\Qcm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class QcmController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/qcm', name: 'app_qcm')]
    public function index(): Response
    {
        $qcms = $this->entityManager->getRepository(Qcm::class)->findAll();

        return $this->render('qcm/index.html.twig', [
            'qcms' => $qcms,
        ]);
    }

    #[Route('/qcm/{id}', name: 'app_qcm_show')]
    public function show(int $id): Response
    {
        $qcm = $this->entityManager->getRepository(Qcm::class)->find($id);

        if (!$qcm) {
            throw $this->createNotFoundException('The QCM does not exist');
        }

        return $this->render('qcm/show.html.twig', [
            'qcm' => $qcm,
        ]);
    }
}