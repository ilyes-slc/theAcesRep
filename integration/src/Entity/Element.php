<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Endroid\QrCode\Builder\BuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Element
 *
 * @ORM\Table(name="element")
 * @ORM\Entity
 */
class Element
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("Element")
     *
     */
    private $id;

    /**
     * @var string
     * @Assert\NotNull
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     * @Assert\NotBlank(message="type is required")
     * @Groups("Element")
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(name="ref", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="ref is required")
     * @Groups("Element")
     */
    private $ref;

    /**
     * @var string
     * @Assert\NotNull
     * @ORM\Column(name="nom", type="string", length=10, nullable=false)
     * @Assert\NotBlank(message="nom is required")
     * @Groups("Element")
     */
    private $nom;

    /**
     * @var float
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotBlank(message="prix is required")
     * @Groups("Element")
     */
    private $prix;

    /**
     * @var string
     *@Assert\Positive
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="description is required")
     * @Groups("Element")
     */
    private $description;

    /**
     * @var string|null
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     * @Groups("Element")
     */
    private $image;

    /**
     * @var string
     * @ORM\Column(name="etat", type="string", length=10, nullable=false)
     * @Assert\NotBlank(message="etat is required")
     * @Groups("Element")
     */
    private $etat;

    /**
     * @var int
     * @Assert\NotNull
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     * @Assert\NotBlank(message="quantite is required")
     * @Groups("Element")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Promotion::class, inversedBy="elements",cascade={"persist"})
     */
    private $promotion;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
    public function __toString() {
        return $this->getNom();
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }


}