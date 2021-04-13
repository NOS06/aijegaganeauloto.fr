<?php

namespace App\DataFixtures;

use App\Entity\Drawing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class AppFixtures extends Fixture
{
    public const WINNING_ID = 'fc9a54b7-0949-4bfb-b58a-bcf1b6462419';

    public function load(ObjectManager $manager): void
    {
        $drawingDate = new \DateTime();
        for ($i = 0; $i <= 100; ++$i) {
            $drawing = new Drawing(Uuid::uuid4());
            $drawing->setDrawDate(clone $drawingDate);
            $drawing->setBall1(random_int(1, 49));
            $drawing->setBall2(random_int(1, 49));
            $drawing->setBall3(random_int(1, 49));
            $drawing->setBall4(random_int(1, 49));
            $drawing->setBall5(random_int(1, 49));
            $drawing->setLuckyNumber(random_int(1, 10));

            $drawingDate->modify('-1 day');
            $manager->persist($drawing);
        }

        $drawing = new Drawing(Uuid::fromString(self::WINNING_ID));
        $drawing->setDrawDate(new \DateTime());
        $drawing->setBall1(1);
        $drawing->setBall2(2);
        $drawing->setBall3(3);
        $drawing->setBall4(4);
        $drawing->setBall5(5);
        $drawing->setLuckyNumber(6);
        $manager->persist($drawing);

        $manager->flush();
    }
}
