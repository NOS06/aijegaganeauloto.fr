<?php

namespace App\DataFixtures;

use App\Entity\Drawing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $drawingDate = new \DateTime();
        for ($i=0; $i <= 100; $i++) {
            $drawing = new Drawing();
            $drawing->setDrawDate(clone $drawingDate);
            $drawing->setBall1(random_int(1, 49));
            $drawing->setBall2(random_int(1, 49));
            $drawing->setBall3(random_int(1, 49));
            $drawing->setBall4(random_int(1, 49));
            $drawing->setBall5(random_int(1, 49));
            $drawing->setBall6(random_int(1, 49));
            $drawing->setAdditionalBall(random_int(1, 10));

            $drawingDate->modify('-1 day');
            $manager->persist($drawing);
        }

        $manager->flush();
    }
}
