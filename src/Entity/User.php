<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
#[ApiResource()]
class User
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
     * @ORM\Column(type="string", length=50)
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Shop", inversedBy="users")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id")
     */
    private Shop $shop;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getShop()
    {
        return $this->shop;
    }

    public function setShop($shop): void
    {
        $this->shop = $shop;
    }
}
