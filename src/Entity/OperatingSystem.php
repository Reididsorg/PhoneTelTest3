<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OperatingSystemRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OperatingSystemRepository::class)
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
class OperatingSystem
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string",  length=50)
     *
     * @Assert\NotBlank(message="Champ 'Nom' obligatoire !")
     *
     */
    private string $name;

    /**
     * @var Phone[]|Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Phone", mappedBy="operatingSystem", orphanRemoval=true)
     */
    private Collection $operatingSystems;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Phone[]|Collection
     */
    public function getOperatingSystems(): array|Collection
    {
        return $this->operatingSystems;
    }

    /**
     * @param Phone[]|Collection $operatingSystems
     */
    public function setOperatingSystems(array|Collection $operatingSystems): void
    {
        $this->operatingSystems = $operatingSystems;
    }
}