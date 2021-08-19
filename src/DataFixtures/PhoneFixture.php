<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\OperatingSystem;
use App\Entity\Phone;
use App\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PhoneFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $brands = $manager->getRepository(Brand::class)->findAll();
        $sizes = $manager->getRepository(Size::class)->findAll();
        $operatingSystems = $manager->getRepository(OperatingSystem::class)->findAll();
        $faker = Factory::create('fr-FR');

        for ($i = 1; $i < 41; $i++) {
            $phoneName = 'mobilephone' . $i;
            $phoneDescription = 'description du mobilephone' . $i;
            $phoneYear = new \DateTime('2021-07-12');
            $phone = new Phone();
            $phone->setName($phoneName);
            $phone->setDescription($phoneDescription);
            $phone->setYear($phoneYear);
            $phone->setBrand($faker->randomElement($brands));
            $phone->setSize($faker->randomElement($sizes));
            $phone->setOperatingSystem($faker->randomElement($operatingSystems));
            $manager->persist($phone);
            //$this->addReference('Phone ' .$i, $phone);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [
            BrandFixture::class,
        ];
    }
}