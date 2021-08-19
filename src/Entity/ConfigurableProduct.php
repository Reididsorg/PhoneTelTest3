<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Memory;
use App\Repository\ConfigurableProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ConfigurableProduct::class)
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
class ConfigurableProduct
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
     * @var float
     *
     * @ORM\Column(type="float",  length=50)
     *
     * @Assert\NotBlank(message="Champ 'Nom' obligatoire !")
     */
    private float $price;

    /**
     * @var Phone
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Phone", inversedBy="phoneConfigurableProducts")
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id", nullable=false)
     */
    private Phone $phone;

    /**
     * @var Memory
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Memory", inversedBy="memories")
     * @ORM\JoinColumn(name="memory_id", referencedColumnName="id", nullable=false)
     */
    private Memory $memory;

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
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * @param Phone $phone
     */
    public function setPhone(Phone $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return Memory
     */
    public function getMemory(): Memory
    {
        return $this->memory;
    }

    /**
     * @param Memory $memory
     */
    public function setMemory(Memory $memory): void
    {
        $this->memory = $memory;
    }
}