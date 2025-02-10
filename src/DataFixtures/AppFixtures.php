<?php

namespace App\DataFixtures;

use App\Entity\Qcm;
use App\Entity\Question;
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

        $qcm = new Qcm();
        $qcm->setTheme('Maths');
        $qcm->setName('Maths 1');
        $question1 = new Question();
        $question1->setQustionstr('1 + 1 = ?');
        $question1->setType(\Suit::CU);
        $question2 = new Question();
        $question2->setQustionstr('2 + 2 = ?');
        $question2->setType(\Suit::CU);
        $question3 = new Question();
        $question3->setQustionstr('3 + 3 = ?');
        $question3->setType(\Suit::CU);
        $qcm->addQuestion($question1);
        $qcm->addQuestion($question2);
        $qcm->addQuestion($question3);

        $manager->persist($question1);
        $manager->persist($question2);
        $manager->persist($question3);
        $manager->persist($qcm);



        $manager->flush();
    }
}
