<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @Groups("post:read")


     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("post:read")
     */
    private $titre;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     * @Assert\NotBlank(message="You forgot to write your article ")
     * @Groups("post:read")
     */
    private $contenu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagearticle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $datecreation;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="article")
     */
    private $Commentaire;

    /**
     * @ORM\ManyToMany(targetEntity=Keywords::class, inversedBy="articles")
     */
    private $Keywords;

    public function __construct()
    {
        $this->Commentaire = new ArrayCollection();
        $this->Keywords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getImagearticle(): ?string
    {
        return $this->imagearticle;
    }

    public function setImagearticle(?string $imagearticle): self
    {
        $this->imagearticle = $imagearticle;

        return $this;
    }

    public function getDatecreation(): ?string
    {
        return $this->datecreation;
    }

    public function setDatecreation(?string $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->Commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->Commentaire->contains($commentaire)) {
            $this->Commentaire[] = $commentaire;
            $commentaire->setArticle($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getArticle() === $this) {
                $commentaire->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Keywords[]
     */
    public function getKeywords(): Collection
    {
        return $this->Keywords;
    }

    public function addKeyword(Keywords $keyword): self
    {
        if (!$this->Keywords->contains($keyword)) {
            $this->Keywords[] = $keyword;
        }

        return $this;
    }

    public function removeKeyword(Keywords $keyword): self
    {
        $this->Keywords->removeElement($keyword);

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }


}
