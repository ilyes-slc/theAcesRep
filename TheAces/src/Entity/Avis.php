<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis", indexes={@ORM\Index(name="fkey11", columns={"idComment"}), @ORM\Index(name="fkey33", columns={"nomClient"}), @ORM\Index(name="fkey44", columns={"imgClient"}), @ORM\Index(name="fkey10", columns={"idCl"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 */
class Avis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \Commentaire
     *
     * @ORM\ManyToOne(targetEntity="Commentaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idComment", referencedColumnName="id")
     * })
     */
    private $idcomment;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgClient", referencedColumnName="image")
     * })
     */
    private $imgclient;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCl", referencedColumnName="idClient")
     * })
     */
    private $idcl;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nomClient", referencedColumnName="name")
     * })
     */
    private $nomclient;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdcomment(): ?Commentaire
    {
        return $this->idcomment;
    }

    public function setIdcomment(?Commentaire $idcomment): self
    {
        $this->idcomment = $idcomment;

        return $this;
    }

    public function getImgclient(): ?Client
    {
        return $this->imgclient;
    }

    public function setImgclient(?Client $imgclient): self
    {
        $this->imgclient = $imgclient;

        return $this;
    }

    public function getIdcl(): ?Client
    {
        return $this->idcl;
    }

    public function setIdcl(?Client $idcl): self
    {
        $this->idcl = $idcl;

        return $this;
    }

    public function getNomclient(): ?Client
    {
        return $this->nomclient;
    }

    public function setNomclient(?Client $nomclient): self
    {
        $this->nomclient = $nomclient;

        return $this;
    }


}
