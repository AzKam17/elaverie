<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lib;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=ArticlesCategorie::class, inversedBy="articles")
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity=ArticlesOption::class, mappedBy="articles")
     */
    private $articlesOptions;

    public function __construct()
    {
        $this->articlesOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLib(): ?string
    {
        return $this->lib;
    }

    public function setLib(string $lib): self
    {
        $this->lib = $lib;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCategorie(): ?ArticlesCategorie
    {
        return $this->categorie;
    }

    public function setCategorie(?ArticlesCategorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|ArticlesOption[]
     */
    public function getArticlesOptions(): Collection
    {
        return $this->articlesOptions;
    }

    public function addArticlesOption(ArticlesOption $articlesOption): self
    {
        if (!$this->articlesOptions->contains($articlesOption)) {
            $this->articlesOptions[] = $articlesOption;
            $articlesOption->addArticle($this);
        }

        return $this;
    }

    public function removeArticlesOption(ArticlesOption $articlesOption): self
    {
        if ($this->articlesOptions->removeElement($articlesOption)) {
            $articlesOption->removeArticle($this);
        }

        return $this;
    }
}
