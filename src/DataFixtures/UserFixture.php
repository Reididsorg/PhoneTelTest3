<?php

namespace App\DataFixtures;


use App\Entity\User;
use App\Entity\Shop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $shops = $manager->getRepository(Shop::class)->findAll();
        $faker = Factory::create('fr-FR');

        for ($i = 1; $i < 11; $i++) {
            $user = new User();
            $user->setUsername($faker->name());
            $user->setEmail($faker->email());
            $user->setShop($faker->randomElement($shops));
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [
            ShopFixture::class,
        ];
    }
}