<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Security;

final class QcmController extends AbstractController
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/qcm', name: 'app_qcm')]
    public function index(): Response
    {
        $user = $this->security->getUser();
        $username = $user ? $user->getEmail() : 'Guest';

        return $this->render('qcm/index.html.twig', [
            'controller_name' => 'QcmController',
            'username' => $username,
        ]);
    }
}
