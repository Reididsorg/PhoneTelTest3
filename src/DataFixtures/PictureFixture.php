<?php

namespace App\DataFixtures;

use App\Entity\Phone;
use App\Entity\Picture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PictureFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $phones = $manager->getRepository(Phone::class)->findAll();

        foreach ($phones as $phone) {
            for ($i = 1; $i < 4; $i++) {
                $picture = new Picture();
                $picture->setName('picture_' . $phone->getName() . '_' . $i);
                $picture->setPath('http://www.bilemodataserver.com/pictures/' . $phone->getName() . '_' . $i);

                $manager->persist($picture);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // TODO: Implement getDependencies() method.
        return [
            PhoneFixture::class,
        ];
    }
}