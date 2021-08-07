<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PhoneFixture extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 41; $i++) {
            $phoneName = 'Phone' . $i;
            $phoneDescription = 'Description du téléphone : Phone' . $i;
            $phoneYear = new \DateTime('2021-07-12');
            $phone = new Phone();
            $phone->setName($phoneName);
            $phone->setDescription($phoneDescription);
            $phone->setYear($phoneYear);
            $manager->persist($phone);
            $this->addReference('Phone ' .$i, $phone);
        }
        $manager->flush();
    }
}