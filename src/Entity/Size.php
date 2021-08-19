<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SizeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SizeRepository::class)
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
class Size
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
    private string $widthPx;

    /**
     * @var string
     *
     * @ORM\Column(type="string",  length=50)
     *
     * @Assert\NotBlank(message="Champ 'Nom' obligatoire !")
     *
     */
    private string $heightPx;

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
     * @var Phone[]|Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Phone", mappedBy="size", orphanRemoval=true)
     */
    private Collection $sizes;

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
    public function getWidthPx(): string
    {
        return $this->widthPx;
    }

    /**
     * @param string $widthPx
     */
    public function setWidthPx(string $widthPx): void
    {
        $this->widthPx = $widthPx;
    }

    /**
     * @return string
     */
    public function getHeightPx(): string
    {
        return $this->heightPx;
    }

    /**
     * @param string $heightPx
     */
    public function setHeightPx(string $heightPx): void
    {
        $this->heightPx = $heightPx;
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
}