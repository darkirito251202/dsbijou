<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\MetaData\ApiResource;

#[ApiResource()]

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'idcategorie', targetEntity: Bijou::class, orphanRemoval: true)]
    private Collection $idcategorie;

    public function __construct()
    {
        $this->idcategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Bijou>
     */
    public function getIdcategorie(): Collection
    {
        return $this->idcategorie;
    }

    public function addIdcategorie(Bijou $idcategorie): static
    {
        if (!$this->idcategorie->contains($idcategorie)) {
            $this->idcategorie->add($idcategorie);
            $idcategorie->setIdcategorie($this);
        }

        return $this;
    }

    public function removeIdcategorie(Bijou $idcategorie): static
    {
        if ($this->idcategorie->removeElement($idcategorie)) {
            // set the owning side to null (unless already changed)
            if ($idcategorie->getIdcategorie() === $this) {
                $idcategorie->setIdcategorie(null);
            }
        }

        return $this;
    }
}
