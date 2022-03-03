<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis", indexes={@ORM\Index(name="fkey10", columns={"idCl"}), @ORM\Index(name="fkey11", columns={"idComment"}), @ORM\Index(name="fkey33", columns={"nomClient"}), @ORM\Index(name="fkey44", columns={"imgClient"})})
 * @ORM\Entity
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
     * @var string|null
     *
     * @ORM\Column(name="imgClient", type="string", length=30, nullable=true)
     */
    private $imgclient;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idCl", type="integer", nullable=true)
     */
    private $idcl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomClient", type="string", length=10, nullable=true)
     */
    private $nomclient;

    /**
     * @var \Commentaire
     *
     * @ORM\ManyToOne(targetEntity="Commentaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idComment", referencedColumnName="id")
     * })
     */
    private $idcomment;

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

    public function getImgclient(): ?string
    {
        return $this->imgclient;
    }

    public function setImgclient(?string $imgclient): self
    {
        $this->imgclient = $imgclient;

        return $this;
    }

    public function getIdcl(): ?int
    {
        return $this->idcl;
    }

    public function setIdcl(?int $idcl): self
    {
        $this->idcl = $idcl;

        return $this;
    }

    public function getNomclient(): ?string
    {
        return $this->nomclient;
    }

    public function setNomclient(?string $nomclient): self
    {
        $this->nomclient = $nomclient;

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


}
