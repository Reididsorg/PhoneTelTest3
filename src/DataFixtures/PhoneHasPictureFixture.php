<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use App\Entity\Phone;
use App\Entity\PhoneHasPicture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PhoneHasPictureFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $phones = $manager->getRepository(Phone::class)->findAll();
        $pictures = $manager->getRepository(Picture::class)->findAll();
        $faker = Factory::create('fr-FR');

        foreach ($phones as $phone) {
            $mainPhoneHasPicture = new PhoneHasPicture();
            $mainPhoneHasPicture->setPhone($phone);
            $mainPhoneHasPicture->setMain(true);
            $mainPhoneHasPicture->setPicture($faker->randomElement($pictures));

            $phoneHasPicture1 = new PhoneHasPicture();
            $phoneHasPicture1->setPhone($phone);
            $phoneHasPicture1->setMain(false);
            $phoneHasPicture1->setPicture($faker->randomElement($pictures));

            $phoneHasPicture2 = new PhoneHasPicture();
            $phoneHasPicture2->setPhone($phone);
            $phoneHasPicture2->setMain(false);
            $phoneHasPicture2->setPicture($faker->randomElement($pictures));

            $manager->persist($mainPhoneHasPicture);
            $manager->persist($phoneHasPicture1);
            $manager->persist($phoneHasPicture2);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [
            PhoneFixture::class,
            PictureFixture::class,
        ];
    }
}