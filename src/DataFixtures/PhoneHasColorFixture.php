<?php

namespace App\DataFixtures;

use App\Entity\Color;
use App\Entity\Phone;
use App\Entity\PhoneHasColor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PhoneHasColorFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $phones = $manager->getRepository(Phone::class)->findAll();
        $colors = $manager->getRepository(Color::class)->findAll();
        $faker = Factory::create('fr-FR');

        foreach ($phones as $phone) {
            $mainPhoneHasColor = new PhoneHasColor();
            $mainPhoneHasColor->setPhone($phone);
            $mainPhoneHasColor->setMain(true);
            $mainPhoneHasColor->setColor($faker->randomElement($colors));

            $phoneHasColor1 = new PhoneHasColor();
            $phoneHasColor1->setPhone($phone);
            $phoneHasColor1->setMain(false);
            $phoneHasColor1->setColor($faker->randomElement($colors));

            $phoneHasColor2 = new PhoneHasColor();
            $phoneHasColor2->setPhone($phone);
            $phoneHasColor2->setMain(false);
            $phoneHasColor2->setColor($faker->randomElement($colors));

            $manager->persist($mainPhoneHasColor);
            $manager->persist($phoneHasColor1);
            $manager->persist($phoneHasColor2);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [
            PhoneFixture::class,
            ColorFixture::class,
        ];
    }
}