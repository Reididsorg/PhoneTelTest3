<?php

namespace App\DataFixtures;


use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixture extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $brand1 = new Brand();
        $brand1->setName('apple');

        $brand2 = new Brand();
        $brand2->setName('nokia');

        $brand3 = new Brand();
        $brand3->setName('samsung');

        $brand4 = new Brand();
        $brand4->setName('wawei');

        $brand5 = new Brand();
        $brand5->setName('motorola');

        $brand6 = new Brand();
        $brand6->setName('honor');

        $manager->persist($brand1);
        $manager->persist($brand2);
        $manager->persist($brand3);
        $manager->persist($brand4);
        $manager->persist($brand5);
        $manager->persist($brand6);

        $manager->flush();
    }
}