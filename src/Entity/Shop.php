<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ShopRepository::class)
 *
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *              "openapi_context"={
 *                  "summary"="hidden"
 *              }
 *          }
 *     },
 *     collectionOperations={},
 * )
 */
//#[ApiResource(
//    collectionOperations: [
//        //'get',
//        //'post',
//    ],
//    itemOperations: [
//        'get',
//        //'delete',
//        //'put',
//        //'patch',
//    ],
//)]
class Shop implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="shop", orphanRemoval=true)
     */
    private Collection $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function setUsers($users): void
    {
        $this->users = $users;
    }

    public function __construct()
    {
        $this->roles[] = 'ROLE_USER';
        $this->users = new ArrayCollection();
    }

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    protected array $roles;

    public function getRoles()
    {
        return $this->roles;
    }

    public function getSalt()
    {
        return;
    }

    public function eraseCredentials()
    {
        return;
    }

//    public function getUserIdentifier()
//    {
//        return;
//    }
}
