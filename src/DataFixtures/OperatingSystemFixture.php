<?php

namespace App\DataFixtures;

use App\Entity\OperatingSystem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OperatingSystemFixture extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $operatingSystem1 = new OperatingSystem();
        $operatingSystem1->setName('Androïd');

        $operatingSystem2 = new OperatingSystem();
        $operatingSystem2->setName('Mac iOS');

        $operatingSystem3 = new OperatingSystem();
        $operatingSystem3->setName('Bada');

        $operatingSystem4 = new OperatingSystem();
        $operatingSystem4->setName('Windows OS');

        $operatingSystem5 = new OperatingSystem();
        $operatingSystem5->setName('Symbian OS');

        $operatingSystem6 = new OperatingSystem();
        $operatingSystem6->setName('Tizen');

        $operatingSystem7 = new OperatingSystem();
        $operatingSystem7->setName('Blackberry OS');

        $manager->persist($operatingSystem1);
        $manager->persist($operatingSystem2);
        $manager->persist($operatingSystem3);
        $manager->persist($operatingSystem4);
        $manager->persist($operatingSystem5);
        $manager->persist($operatingSystem6);
        $manager->persist($operatingSystem7);

        $manager->flush();
    }
}