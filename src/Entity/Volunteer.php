<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\VolunteerRepository")
 * @ORM\Table(name="volunteer")
 * @ORM\HasLifecycleCallbacks
 */
class Volunteer
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
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

        /**
     * @ORM\Column(type="boolean")
     */
    private $published;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

        /**
     * @Vich\UploadableField(mapping="volunteer_images", fileNameProperty="image")
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
     * @ORM\OneToOne(targetEntity=Audit::class)
     * @ORM\JoinColumn(name="audit", referencedColumnName="id")
     */
    private $audit;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getAudit(): ?string
    {
        return $this->audit;
    }

    public function setAudit(?string $audit): self
    {
        $this->audit = $audit;

        return $this;
    }
}
