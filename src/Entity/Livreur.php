<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Livreur
 *
 * @ORM\Table(name="livreur", uniqueConstraints={@ORM\UniqueConstraint(name="cin", columns={"cin"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\LivreurRepository")
 * 
 */
class Livreur
{
    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer", nullable=false)
     * @ORM\Id
     * @Groups("livreur:read")
     * @Assert\NotBlank
     
     * 
     * 
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     * @Groups("livreur:read")
     * @Assert\NotBlank
     * 
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     * @Assert\Length(
     *      min = 3,
     *      max = 8,
     *      minMessage = "Your last name must be at least {{ limit }} characters long",
     *      maxMessage = "Your last name cannot be longer than {{ limit }} characters"
     * )
     * @Groups("livreur:read")
     * @Assert\NotBlank
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
     * @Assert\Range(
     *      min = 0,
     *      max = 5,
     *      notInRangeMessage = "You must be between {{ min }} and {{ max }} to enter",
     * )
     * @Groups("livreur:read")
     */
    private $rating;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     *  @Assert\LessThan("-18 years")
     * @Groups("livreur:read")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=30, nullable=false)
     * @Groups("livreur:read")
     */
    private $image;

     /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=255, nullable=false)
     * @Groups("livreur:read")
     * @Assert\NotBlank
     * 
     */
    private $zone;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=12, nullable=false)
     */
    private $tel;


    public function getCin(): ?int
    {
        return $this->cin;
    }
    public function setCin(int $cin): self
    {
        $this->cin = $cin;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

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

    public function getzone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function  __toString()
    {
        return $this->cin;
        }
}
