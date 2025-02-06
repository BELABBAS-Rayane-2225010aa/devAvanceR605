<?php

namespace App\Controller;

use App\Entity\Qcm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;

final class QcmController extends AbstractController
{

    private $security;

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager ,Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    #[Route('/qcm', name: 'app_qcm')]
    public function index(): Response
    {
        $user = $this->security->getUser();
        $username = $user ? $user->getEmail() : 'Guest';
        $qcms = $this->entityManager->getRepository(Qcm::class)->findAll();

        return $this->render('qcm/index.html.twig', [
            'controller_name' => 'QcmController',
            'username' => $username,
            'qcms' => $qcms,
        ]);
    }
}