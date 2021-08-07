<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\User;
use App\Repository\ShopRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

final class UserDataPersister implements ContextAwareDataPersisterInterface
{
    protected EntityManagerInterface $entityManager;
    protected Security $security;
    protected ShopRepository $shopRepo;

    public function __construct(
        EntityManagerInterface $entityManager,
        Security $security,
        ShopRepository $shopRepo
    )
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
        $this->shopRepo = $shopRepo;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof User;
    }

    public function persist($data, array $context = [])
    {
        // Get current shop who makes api request
        $shop = $this->security->getUser();

        // Set this shop to user associated shop
        $data->setShop($shop);

        // Persist
        $this->entityManager->persist($data);
        $this->entityManager->flush();
        return $data;
    }

    public function remove($data, array $context = [])
    {
        // call your persistence layer to delete $data
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
}