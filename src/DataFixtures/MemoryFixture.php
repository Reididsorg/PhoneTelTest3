<?php

namespace App\DataFixtures;

use App\Entity\Memory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MemoryFixture extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $memory1 = new Memory();
        $memory1->setLabel('64 Go');
        $memory1->setValue('64');

        $memory2 = new Memory();
        $memory2->setLabel('128 G0');
        $memory2->setValue('128');

        $memory3 = new Memory();
        $memory3->setLabel('256 G0');
        $memory3->setValue('128');

        $memory4 = new Memory();
        $memory4->setLabel('320 Go');
        $memory4->setValue('320');

        $manager->persist($memory1);
        $manager->persist($memory2);
        $manager->persist($memory3);
        $manager->persist($memory4);

        $manager->flush();
    }
}