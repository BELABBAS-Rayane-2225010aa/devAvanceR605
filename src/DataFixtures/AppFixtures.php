<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $adminUser = new User();
        $adminUser->setEmail('admin@admin.com');
        $adminUser->setRoles(['ROLE_ADMIN']);
        $adminUser->setPassword('$2y$13$z6hYmZpMspyl.cCm4hRzh.HvPEwSFUCaJd6QaWio0jikpd8sfOb3q');
        $manager->persist($adminUser);

        $manager->flush();
    }
}
