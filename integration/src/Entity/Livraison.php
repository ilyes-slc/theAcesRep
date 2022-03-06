<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="fkey_livreur", columns={"cinLivreur"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\LivraisonRepository")
 * 
 */
class Livraison
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
     * @var string
     *
     * @ORM\Column(name="method", type="string", length=20, nullable=false)
     */
    private $method;

    /**
     * @var int
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * 
     */
    private $idclient;

    /**
     * @var int
     *
     * @ORM\Column(name="idProd", type="integer", nullable=false)
     */
    private $idprod;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseclient", type="string", length=20, nullable=false)
     */
    private $adresseclient;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     * 
     */
    private $etat;

    /**
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cinLivreur", referencedColumnName="cin")
     * })
     */
    private $cinlivreur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getIdclient(): ?int
    {
        return $this->idclient;
    }

    public function setIdclient(int $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdprod(): ?int
    {
        return $this->idprod;
    }

    public function setIdprod(int $idprod): self
    {
        $this->idprod = $idprod;

        return $this;
    }

    public function getAdresseclient(): ?string
    {
        return $this->adresseclient;
    }

    public function setAdresseclient(string $adresseclient): self
    {
        $this->adresseclient = $adresseclient;

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

    public function getCinlivreur(): ?Livreur
    {
        return $this->cinlivreur;
    }

    public function setCinlivreur(?Livreur $cinlivreur): self
    {
        $this->cinlivreur = $cinlivreur;

        return $this;
    }


}
