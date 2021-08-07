<?php

namespace App\DataProvider\Extension;

use App\Entity\User;

interface UserCollectionExtensionInterface
{
    /**
     * Returns the final result object.
     *
     * @param array<int, User>  $collection
     * @param array<string, mixed> $context
     *
     * @return iterable<User>
     */
    public function getResult(array $collection, string $resourceClass, string $operationName = null, array $context = []): iterable;

    /**
     * Tells if the extension is enabled or not.
     *
     * @param array<string, mixed> $context
     */
    public function isEnabled(string $resourceClass = null, string $operationName = null, array $context = []): bool;
}