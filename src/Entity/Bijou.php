<?php

namespace App\Entity;

use App\Repository\BijouRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\MetaData\ApiResource;

#[ApiResource()]

#[ORM\Entity(repositoryClass: BijouRepository::class)]
class Bijou
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $prixvente = null;

    #[ORM\Column]
    private ?int $prixlocation = null;

    #[ORM\ManyToOne(inversedBy: 'idcategorie')]
    #[ORM\JoinColumn(nullable: false)]
    private ?categorie $idcategorie = null;

    #[ORM\OneToMany(mappedBy: 'idbijou', targetEntity: Location::class, orphanRemoval: true)]
    private Collection $idbijou;

    public function __construct()
    {
        $this->idbijou = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixvente(): ?int
    {
        return $this->prixvente;
    }

    public function setPrixvente(int $prixvente): static
    {
        $this->prixvente = $prixvente;

        return $this;
    }

    public function getPrixlocation(): ?int
    {
        return $this->prixlocation;
    }

    public function setPrixlocation(int $prixlocation): static
    {
        $this->prixlocation = $prixlocation;

        return $this;
    }

    public function getIdcategorie(): ?categorie
    {
        return $this->idcategorie;
    }

    public function setIdcategorie(?categorie $idcategorie): static
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getIdbijou(): Collection
    {
        return $this->idbijou;
    }

    public function addIdbijou(Location $idbijou): static
    {
        if (!$this->idbijou->contains($idbijou)) {
            $this->idbijou->add($idbijou);
            $idbijou->setIdbijou($this);
        }

        return $this;
    }

    public function removeIdbijou(Location $idbijou): static
    {
        if ($this->idbijou->removeElement($idbijou)) {
            // set the owning side to null (unless already changed)
            if ($idbijou->getIdbijou() === $this) {
                $idbijou->setIdbijou(null);
            }
        }

        return $this;
    }
}
