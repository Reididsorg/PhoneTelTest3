<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MemoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=MemoryRepository::class)
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
class Memory
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
    private string $label;

    /**
     * @var string
     *
     * @ORM\Column(type="string",  length=50)
     *
     * @Assert\NotBlank(message="Champ 'Nom' obligatoire !")
     *
     */
    private string $value;

    /**
     * @var ConfigurableProduct[]|Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ConfigurableProduct", mappedBy="memory")
     */
    private Collection $memories;

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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return ConfigurableProduct[]|Collection
     */
    public function getMemories(): Collection|array
    {
        return $this->memories;
    }

    /**
     * @param ConfigurableProduct[]|Collection $memories
     */
    public function setMemories(Collection|array $memories): void
    {
        $this->memories = $memories;
    }
}