<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 *
 * @UniqueEntity(
 *     fields={"username"},
 *     message="Ce nom d'utilisateur est déjà enregistré !"
 * )
 *
 * @ApiResource(
 *     itemOperations={
 *          "get" = { "security" = "is_granted('SHOP_READ_DELETE', object)", "security_message" = "Seuls les utilisateurs du magasin connecté peuvent être consultés" },
 *          "delete" = { "security" = "is_granted('SHOP_READ_DELETE', object)", "security_message" = "Seuls les utilisateurs du magasin connecté peuvent être supprimés" },
 *     },
 *     collectionOperations={"get", "post"},
 * )
 */
//#[ApiResource(
//    collectionOperations: [
//        'get',
//        'post',
//    ],
//    itemOperations: [
//        'get',
//        'delete',
//        //'put',
//        //'patch',
//    ],
//)]
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
     * @Assert\NotBlank(message="Champ obligatoire !")
     * @Assert\Length(min=4, minMessage="Le nom d'utilisateur est trop court. Il doit faire au moins 4 caractères")
     * @Assert\Length(max=50, maxMessage="Le nom d'utilisateur est trop long. Il ne doit pas faire plus de 50 caractères")
     */
    private string $username;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message="Champ obligatoire !")
     * @Assert\Length(min=4, minMessage="Le nom d'utilisateur est trop court. Il doit faire au moins 4 caractères")
     * @Assert\Length(max=50, maxMessage="Le nom d'utilisateur est trop long. Il ne doit pas faire plus de 50 caractères")
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Shop", inversedBy="users")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id", nullable=false)
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
