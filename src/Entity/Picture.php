<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PictureRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
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
class Picture
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
     * @var string
     *
     * @ORM\Column(type="string",  length=100)
     *
     * @Assert\NotBlank(message="Champ 'Chemin' obligatoire !")
     *
     */
    private string $path;

    /**
     * @var PhoneHasPicture[]|Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\PhoneHasPicture", mappedBy="picture", orphanRemoval=true)
     */
    private Collection $pictures;

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
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return PhoneHasPicture[]|Collection
     */
    public function getPictures(): Collection|array
    {
        return $this->pictures;
    }

    /**
     * @param PhoneHasPicture[]|Collection $pictures
     */
    public function setPictures(Collection|array $pictures): void
    {
        $this->pictures = $pictures;
    }
}