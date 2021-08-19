<?php

namespace App\DataFixtures;

use App\Entity\ConfigurableProduct;
use App\Entity\Memory;
use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ConfigurableProductFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $phones = $manager->getRepository(Phone::class)->findAll();
        //$memories = $manager->getRepository(Memory::class)->findAll();
        $faker = Factory::create('fr-FR');

        foreach ($phones as $phone) {
            for ($i = 1; $i <= 4; $i++) {
                $configurableProduct = new ConfigurableProduct();
                $configurableProduct->setPhone($phone);
                $configurableProduct->setMemory($manager->getRepository(Memory::class)->find($i));
                $configurableProduct->setPrice(($i * 300) + ($faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 150)));
                $manager->persist($configurableProduct);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [
            PhoneFixture::class,
            MemoryFixture::class,
        ];
    }
}