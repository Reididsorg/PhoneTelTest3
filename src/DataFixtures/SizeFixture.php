<?php

namespace App\DataFixtures;

use App\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SizeFixture extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $size1 = new Size();
        $size1->setWidthPx('200');
        $size1->setHeightPx('300');
        $size1->setLabel('20"');

        $size2 = new Size();
        $size2->setWidthPx('300');
        $size2->setHeightPx('400');
        $size2->setLabel('30"');

        $size3 = new Size();
        $size3->setWidthPx('400');
        $size3->setHeightPx('500');
        $size3->setLabel('40"');

        $size4 = new Size();
        $size4->setWidthPx('500');
        $size4->setHeightPx('600');
        $size4->setLabel('50"');

        $size5 = new Size();
        $size5->setWidthPx('600');
        $size5->setHeightPx('700');
        $size5->setLabel('60"');

        $manager->persist($size1);
        $manager->persist($size2);
        $manager->persist($size3);
        $manager->persist($size4);
        $manager->persist($size5);

        $manager->flush();
    }
}