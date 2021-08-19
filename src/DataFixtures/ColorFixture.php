<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ColorFixture extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $color1 = new Color();
        $color1->setName('rouge');

        $color2 = new Color();
        $color2->setName('rose');

        $color3 = new Color();
        $color3->setName('noir');

        $color4 = new Color();
        $color4->setName('blanc');

        $color5 = new Color();
        $color5->setName('or');

        $color6 = new Color();
        $color6->setName('vert');

        $color7 = new Color();
        $color7->setName('bleu');

        $manager->persist($color1);
        $manager->persist($color2);
        $manager->persist($color3);
        $manager->persist($color4);
        $manager->persist($color5);
        $manager->persist($color6);
        $manager->persist($color7);

        $manager->flush();
    }
}