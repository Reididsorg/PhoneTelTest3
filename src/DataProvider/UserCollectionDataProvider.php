<?php

namespace App\DataProvider;


use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\DataProvider\Extension\UserCollectionExtensionInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;

final class UserCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(
        protected UserCollectionExtensionInterface $paginationExtension,
        protected UserRepository $userRepo,
        protected Security $security
    )
    {
        $this->userRepo = $userRepo;
        $this->security = $security;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return User::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        // Retrieve the blog post collection from somewhere
//        yield new User(1);
//        yield new User(2);

        $shop = $this->security->getUser(); // Get current user. null or UserInterface, if logged in

        try {
            $collection = $this->userRepo->findByShop($shop);
        } catch (\Exception $e) {
            throw new \RuntimeException(sprintf('Impossible de récupérer le user: %s', $e->getMessage()));
        }

        if (!$this->paginationExtension->isEnabled($resourceClass, $operationName, $context)) {
            return $collection;
        }

        return $this->paginationExtension->getResult($collection, $resourceClass, $operationName, $context);
    }
}