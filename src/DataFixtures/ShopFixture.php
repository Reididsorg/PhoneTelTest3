<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use App\Entity\Shop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;


class ShopFixture extends Fixture
{
    protected PasswordHasherFactoryInterface $passwordHash;

    public function __construct (
        PasswordHasherFactoryInterface $passwordHash
    )
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 6; $i++) {
            $shopUsername = 'Shop n°' . $i;
            $encoder = $this->passwordHash->getPasswordHasher(Shop::class);
            $shopPasswordCrypted = $encoder->hash('1234');
            $shop = new Shop();
            $shop->setUsername($shopUsername);
            $shop->setPassword($shopPasswordCrypted);
            $manager->persist($shop);
        }
        $manager->flush();
    }
}