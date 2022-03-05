<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert; 

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="fkey2", columns={"idRep"}), @ORM\Index(name="fkey1", columns={"idClient"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ReclamationRepository")
 * @ApiResource(
 *      collectionOperations={"get"},
 *      itemOperations={"get"}
 * )
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRec", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("post:read")
     * @Groups("read:reclamations")
     */
    private $idrec;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     * @Groups("post:read")
     * @Groups("read:reclamations")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     * @Groups("post:read")
     * @Groups("read:reclamations")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=30, nullable=false)
     * @Groups("post:read")
     * @Groups("read:reclamations")
     */
    private $etat;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     * @Groups("post:read")
     * @Groups("read:reclamations")
     */
    private $idclient;

    /**
     * @var \Reparation
     *
     * @ORM\ManyToOne(targetEntity="Reparation", cascade={"remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRep", referencedColumnName="idRep", onDelete="CASCADE")
     * })
     * @Groups("post:read")
     * @Groups("read:reclamations")
     */
    private $idrep;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     * @Groups("read:reclamations")
     */
    private $method_remb;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     * @Groups("read:reclamations")
     */
    private $target;

    public function getIdrec(): ?int
    {
        return $this->idrec;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdrep(): ?Reparation
    {
        return $this->idrep;
    }

    public function setIdrep(?Reparation $idrep): self
    {
        $this->idrep = $idrep;

        return $this;
    }

    public function getMethodRemb(): ?string
    {
        return $this->method_remb;
    }

    public function setMethodRemb(string $method_remb): self
    {
        $this->method_remb = $method_remb;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    


}
