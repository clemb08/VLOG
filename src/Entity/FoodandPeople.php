<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\FoodandPeopleRepository")
 * @ORM\Table(name="foodandpeople")
 * @ORM\HasLifecycleCallbacks
 */
class FoodandPeople
{

    public function __construct()
    {
        //Par défaut, la date de l'annonce est la date d'aujourd'hui
        $this->createdAt = new \Datetime();
        $this->published = true;
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tagline;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity=Interview::class)
     * @JoinColumn(name="interview_id", referencedColumnName="id")
    */
    private $idInterview;

    /**
     * @ORM\OneToOne(targetEntity=Recipe::class)
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     */
    private $idRecipe;

    /**
     * @Vich\UploadableField(mapping="foodandpeople_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @var datetime $created
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime $updated
     * @ORM\Column(type="datetime", nullable = true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\PreUpdate
     */
    public function updatedTime()
    {
        $this->setUpdatedAt(new \DateTime());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTagline(): ?string
    {
        return $this->tagline;
    }

    public function setTagline(string $tagline): self
    {
        $this->tagline = $tagline;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        return $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getIdInterview(): ?object
    {
        return $this->idInterview;
    }

    public function setIdInterview(object $idInterview): self
    {
        $this->idInterview = $idInterview;

        return $this;
    }

    public function getIdRecipe(): ?object
    {
        return $this->idRecipe;
    }

    public function setIdRecipe(object $idRecipe): self
    {
        $this->idRecipe = $idRecipe;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
