<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PromotionRepository")
 */
class Promotion
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("Element")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     * @Groups("Element")
     * @Assert\GreaterThan("today")
     */
    private $dateFin;

    /**
     * @var float
     * @ORM\Column(name="pourcentage", type="float", precision=10, scale=0, nullable=false)
     * @Groups("Element")
     * @Assert\Range(
     *     min = 5,
     *     max = 75,
     *     notInRangeMessage = "You must be between 5 % and 75 % tall to enter",
     *     )
     */
    private $pourcentage;

    /**
     * @var \DateTime
     * @ORM\Column(name="Date_debut", type="date", nullable=false)
     * @Groups("Element")
     */
    private $dateDebut;
    /**
     * @ORM\ManyToOne(targetEntity=Element::class, inversedBy="promotions")
     * @JoinColumn(onDelete="CASCADE")
     * @Groups("Element")
     */


    private $idprod;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }


    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }


    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }


    public function setPourcentage(float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }


    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }


    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }


    public function getIdprod(): ?Element
    {
        return $this->idprod;
    }

    
    public function setIdprod(?Element $idprod): self
    {
        $this->idprod = $idprod;

        return $this;
    }
}
