<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PhoneRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhoneRepository::class)
 */
#[ApiResource(
    collectionOperations: [
        'get',
        //'post',
    ],
    itemOperations: [
        'get',
        //'delete',
        //'put',
        //'patch',
    ],
)]
class Phone
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
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    /**
     * @ORM\Column(type="date")
     */
    private \DateTimeInterface $year;

    /**
     * @var PhoneHasColor[]|Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\PhoneHasColor", mappedBy="phone", orphanRemoval=true)
     */
    private Collection $phoneHasColors;

    /**
     * @var PhoneHasPicture[]|Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\PhoneHasPicture", mappedBy="phone", orphanRemoval=true)
     */
    private Collection $phoneHasPictures;

    /**
     * @var ConfigurableProduct[]|Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ConfigurableProduct", mappedBy="phone", orphanRemoval=true)
     */
    private Collection $phoneConfigurableProducts;

    /**
     * @var Brand
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="brands")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id", nullable=false)
     */
    private Brand $brand;

    /**
     * @var Size
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Size", inversedBy="sizes")
     * @ORM\JoinColumn(name="size_id", referencedColumnName="id", nullable=false)
     */
    private Size $size;

    /**
     * @var OperatingSystem
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\OperatingSystem", inversedBy="operatingSystems")
     * @ORM\JoinColumn(name="operating_system_id", referencedColumnName="id", nullable=false)
     */
    private OperatingSystem $operatingSystem;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return PhoneHasColor[]|Collection
     */
    public function getPhoneHasColors(): Collection|array
    {
        return $this->phoneHasColors;
    }

    /**
     * @param PhoneHasColor[]|Collection $phoneHasColors
     */
    public function setPhoneHasColors(Collection|array $phoneHasColors): void
    {
        $this->phoneHasColors = $phoneHasColors;
    }

    /**
     * @return PhoneHasPicture[]|Collection
     */
    public function getPhoneHasPictures(): Collection|array
    {
        return $this->phoneHasPictures;
    }

    /**
     * @param PhoneHasPicture[]|Collection $phoneHasPictures
     */
    public function setPhoneHasPictures(Collection|array $phoneHasPictures): void
    {
        $this->phoneHasPictures = $phoneHasPictures;
    }

    /**
     * @return ConfigurableProduct[]|Collection
     */
    public function getPhoneConfigurableProducts(): Collection|array
    {
        return $this->phoneConfigurableProducts;
    }

    /**
     * @param ConfigurableProduct[]|Collection $phoneConfigurableProducts
     */
    public function setPhoneConfigurableProducts(Collection|array $phoneConfigurableProducts): void
    {
        $this->phoneConfigurableProducts = $phoneConfigurableProducts;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     */
    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return Size
     */
    public function getSize(): Size
    {
        return $this->size;
    }

    /**
     * @param Size $size
     */
    public function setSize(Size $size): void
    {
        $this->size = $size;
    }

    /**
     * @return OperatingSystem
     */
    public function getOperatingSystem(): OperatingSystem
    {
        return $this->operatingSystem;
    }

    /**
     * @param OperatingSystem $operatingSystem
     */
    public function setOperatingSystem(OperatingSystem $operatingSystem): void
    {
        $this->operatingSystem = $operatingSystem;
    }
}
