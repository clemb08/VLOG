<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Table(name="audit")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="App\Repository\AuditRepository")
 * @Vich\Uploadable
 */
class Audit
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="audit_images", fileNameProperty="name")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $website;

    /**
     * @ORM\Column(type="datetime")
     */
    private $foundationDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mission;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $accreditedBy;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberEmployees;

    /**
     * @ORM\Column(type="integer")
     */
    private $numbervolunteersbyyear;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fee;

    /**
     * @ORM\Column(type="array")
     */
    private $servicesIncluded = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direction;

    /**
     * @ORM\Column(type="datetime")
     */
    private $directionArrivalYear;

    /**
     * @ORM\Column(type="text")
     */
    private $directionProfile;

    /**
     * @ORM\Column(type="array")
     */
    private $securitySelectionProcess;

    /**
     * @ORM\Column(type="text")
     */
    private $securitySelectionProcessComment;

    /**
     * @ORM\Column(type="array")
     */
    private $qualitySelectionProcess;

    /**
     * @ORM\Column(type="text")
     */
    private $qualitySelectionProcessComment;

    /**
     * @ORM\Column(type="array")
     */
    private $transparencyOwner;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $identityOwner;

    /**
     * @ORM\Column(type="text")
     */
    private $identityOwnerProfile;

    /**
     * @ORM\Column(type="array")
     */
    private $transparencyAccounts;

    /**
     * @ORM\Column(type="text")
     */
    private $transparencyAccountsComment;

    /**
     * @ORM\Column(type="array")
     */
    private $longTermeResults;

    /**
     * @ORM\Column(type="text")
     */
    private $longTermeResultsComment;

    /**
     * @ORM\Column(type="text")
     */
    private $futurprojects;

    /**
     * @ORM\Column(type="array")
     */
    private $relationshipLocalCommunity;

    /**
     * @ORM\Column(type="text")
     */
    private $relationshipLocalCommunityComment;

    /**
     * @ORM\Column(type="array")
     */
    private $localFinancialImpact;

    /**
     * @ORM\Column(type="text")
     */
    private $localFinancialImpactComment;

    /**
     * @ORM\Column(type="array")
     */
    private $localEcologicalImpact;

    /**
     * @ORM\Column(type="text")
     */
    private $localEcologicalImpactComment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published;

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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function getFoundationDate(): ?\DateTimeInterface
    {
        return $this->foundationDate;
    }

    public function setFoundationDate(\DateTimeInterface $foundationDate): self
    {
        $this->foundationDate = $foundationDate;

        return $this;
    }

    public function getMission(): ?string
    {
        return $this->mission;
    }

    public function setMission(string $mission): self
    {
        $this->mission = $mission;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getAccreditedBy(): ?string
    {
        return $this->accreditedBy;
    }

    public function setAccreditedBy(string $accreditedBy): self
    {
        $this->accreditedBy = $accreditedBy;

        return $this;
    }

    public function getNumberEmployees(): ?int
    {
        return $this->numberEmployees;
    }

    public function setNumberEmployees(int $numberEmployees): self
    {
        $this->numberEmployees = $numberEmployees;

        return $this;
    }

    public function getNumbervolunteersbyyear(): ?int
    {
        return $this->numbervolunteersbyyear;
    }

    public function setNumbervolunteersbyyear(int $numbervolunteersbyyear): self
    {
        $this->numbervolunteersbyyear = $numbervolunteersbyyear;

        return $this;
    }

    public function getFee(): ?int
    {
        return $this->fee;
    }

    public function setFee(int $fee): self
    {
        $this->fee = $fee;

        return $this;
    }

    public function getServicesIncluded(): ?array
    {
        return $this->servicesIncluded;
    }

    public function setServicesIncluded(array $servicesIncluded): self
    {
        $this->servicesIncluded = $servicesIncluded;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    public function getDirectionArrivalYear(): ?\DateTimeInterface
    {
        return $this->directionArrivalYear;
    }

    public function setDirectionArrivalYear(\DateTimeInterface $directionArrivalYear): self
    {
        $this->directionArrivalYear = $directionArrivalYear;

        return $this;
    }

    public function getDirectionProfile(): ?string
    {
        return $this->directionProfile;
    }

    public function setDirectionProfile(string $directionProfile): self
    {
        $this->directionProfile = $directionProfile;

        return $this;
    }

    public function getSecuritySelectionProcess(): ?array
    {
        return $this->securitySelectionProcess;
    }

    public function setSecuritySelectionProcess(array $securitySelectionProcess): self
    {
        $this->securitySelectionProcess = $securitySelectionProcess;

        return $this;
    }

    public function getSecuritySelectionProcessComment(): ?string
    {
        return $this->securitySelectionProcessComment;
    }

    public function setSecuritySelectionProcessComment(string $securitySelectionProcessComment): self
    {
        $this->securitySelectionProcessComment = $securitySelectionProcessComment;

        return $this;
    }

    public function getQualitySelectionProcess(): ?array
    {
        return $this->qualitySelectionProcess;
    }

    public function setQualitySelectionProcess(array $qualitySelectionProcess): self
    {
        $this->qualitySelectionProcess = $qualitySelectionProcess;

        return $this;
    }

    public function getQualitySelectionProcessComment(): ?string
    {
        return $this->qualitySelectionProcessComment;
    }

    public function setQualitySelectionProcessComment(string $qualitySelectionProcessComment): self
    {
        $this->qualitySelectionProcessComment = $qualitySelectionProcessComment;

        return $this;
    }

    public function getTransparencyOwner(): ?array
    {
        return $this->transparencyOwner;
    }

    public function setTransparencyOwner(array $transparencyOwner): self
    {
        $this->transparencyOwner = $transparencyOwner;

        return $this;
    }

    public function getIdentityOwner(): ?string
    {
        return $this->identityOwner;
    }

    public function setIdentityOwner(string $identityOwner): self
    {
        $this->identityOwner = $identityOwner;

        return $this;
    }

    public function getIdentityOwnerProfile(): ?string
    {
        return $this->identityOwnerProfile;
    }

    public function setIdentityOwnerProfile(string $identityOwnerProfile): self
    {
        $this->identityOwnerProfile = $identityOwnerProfile;

        return $this;
    }

    public function getTransparencyAccounts(): ?array
    {
        return $this->transparencyAccounts;
    }

    public function setTransparencyAccounts(array $transparencyAccounts): self
    {
        $this->transparencyAccounts = $transparencyAccounts;

        return $this;
    }

    public function getTransparencyAccountsComment(): ?string
    {
        return $this->transparencyAccountsComment;
    }

    public function setTransparencyAccountsComment(string $transparencyAccountsComment): self
    {
        $this->transparencyAccountsComment = $transparencyAccountsComment;

        return $this;
    }

    public function getLongTermeResults(): ?array
    {
        return $this->longTermeResults;
    }

    public function setLongTermeResults(array $longTermeResults): self
    {
        $this->longTermeResults = $longTermeResults;

        return $this;
    }

    public function getLongTermeResultsComment(): ?string
    {
        return $this->longTermeResultsComment;
    }

    public function setLongTermeResultsComment(string $longTermeResultsComment): self
    {
        $this->longTermeResultsComment = $longTermeResultsComment;

        return $this;
    }

    public function getFuturprojects(): ?string
    {
        return $this->futurprojects;
    }

    public function setFuturprojects(string $futurprojects): self
    {
        $this->futurprojects = $futurprojects;

        return $this;
    }

    public function getRelationshipLocalCommunity(): ?array
    {
        return $this->relationshipLocalCommunity;
    }

    public function setRelationshipLocalCommunity(array $relationshipLocalCommunity): self
    {
        $this->relationshipLocalCommunity = $relationshipLocalCommunity;

        return $this;
    }

    public function getRelationshipLocalCommunityComment(): ?string
    {
        return $this->relationshipLocalCommunityComment;
    }

    public function setRelationshipLocalCommunityComment(string $relationshipLocalCommunityComment): self
    {
        $this->relationshipLocalCommunityComment = $relationshipLocalCommunityComment;

        return $this;
    }

    public function getLocalFinancialImpact(): ?array
    {
        return $this->localFinancialImpact;
    }

    public function setLocalFinancialImpact(array $localFinancialImpact): self
    {
        $this->localFinancialImpact = $localFinancialImpact;

        return $this;
    }

    public function getLocalFinancialImpactComment(): ?string
    {
        return $this->localFinancialImpactComment;
    }

    public function setLocalFinancialImpactComment(string $localFinancialImpactComment): self
    {
        $this->localFinancialImpactComment = $localFinancialImpactComment;

        return $this;
    }

    public function getLocalEcologicalImpact(): ?array
    {
        return $this->localEcologicalImpact;
    }

    public function setLocalEcologicalImpact(array $localEcologicalImpact): self
    {
        $this->localEcologicalImpact = $localEcologicalImpact;

        return $this;
    }

    public function getLocalEcologicalImpactComment(): ?string
    {
        return $this->localEcologicalImpactComment;
    }

    public function setLocalEcologicalImpactComment(string $localEcologicalImpactComment): self
    {
        $this->localEcologicalImpactComment = $localEcologicalImpactComment;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
