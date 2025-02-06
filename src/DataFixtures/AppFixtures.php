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
        $adminUser->setPassword('$2y$13$ePnGgMqJyjCL6Z/03nIONe.u4DT5KWebo0lrwr1hry1X23r6RwWI2');
        $manager->persist($adminUser);

        $manager->flush();
    }
}
