<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\MetaData\ApiResource;

#[ApiResource()]

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresserue = null;

    #[ORM\Column(length: 10)]
    private ?string $codepostal = null;


    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $courriel = null;

    #[ORM\Column(length: 255)]
    private ?string $telfixe = null;

    #[ORM\Column(length: 255)]
    private ?string $telportable = null;

    #[ORM\OneToMany(mappedBy: 'idclient', targetEntity: Location::class)]
    private Collection $idclient;

    public function __construct()
    {
        $this->idclient = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresserue(): ?string
    {
        return $this->adresserue;
    }

    public function setAdresserue(string $adresserue): static
    {
        $this->adresserue = $adresserue;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): static
    {
        $this->codepostal = $codepostal;

        return $this;
    }


    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCourriel(): ?string
    {
        return $this->courriel;
    }

    public function setCourriel(string $courriel): static
    {
        $this->courriel = $courriel;

        return $this;
    }

    public function getTelfixe(): ?string
    {
        return $this->telfixe;
    }

    public function setTelfixe(string $telfixe): static
    {
        $this->telfixe = $telfixe;

        return $this;
    }

    public function getTelportable(): ?string
    {
        return $this->telportable;
    }

    public function setTelportable(string $telportable): static
    {
        $this->telportable = $telportable;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getIdclient(): Collection
    {
        return $this->idclient;
    }

    public function addIdclient(Location $idclient): static
    {
        if (!$this->idclient->contains($idclient)) {
            $this->idclient->add($idclient);
            $idclient->setIdclient($this);
        }

        return $this;
    }

    public function removeIdclient(Location $idclient): static
    {
        if ($this->idclient->removeElement($idclient)) {
            // set the owning side to null (unless already changed)
            if ($idclient->getIdclient() === $this) {
                $idclient->setIdclient(null);
            }
        }

        return $this;
    }
}
