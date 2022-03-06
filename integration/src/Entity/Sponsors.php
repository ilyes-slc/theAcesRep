<?php

namespace App\Entity;

use App\Repository\SponsorsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=SponsorsRepository::class)
 */
class Sponsors
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity=Tournoi::class, inversedBy="sponsors")
     */
    private $tournoi;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getTournoi(): ?Tournoi
    {
        return $this->tournoi;
    }

    public function setTournoi(?Tournoi $tournoi): self
    {
        $this->tournoi = $tournoi;

        return $this;
    }


    public function __toString(){
        return $this->name;
    }
}
