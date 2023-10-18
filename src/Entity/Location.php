<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\MetaData\ApiResource;

#[ApiResource()]

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datedebutlocation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datefinlocation = null;

    #[ORM\ManyToOne(inversedBy: 'idclient')]
    private ?client $idclient = null;

    #[ORM\ManyToOne(inversedBy: 'idbijou')]
    #[ORM\JoinColumn(nullable: false)]
    private ?bijou $idbijou = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedebutlocation(): ?\DateTimeInterface
    {
        return $this->datedebutlocation;
    }

    public function setDatedebutlocation(\DateTimeInterface $datedebutlocation): static
    {
        $this->datedebutlocation = $datedebutlocation;

        return $this;
    }

    public function getDatefinlocation(): ?\DateTimeInterface
    {
        return $this->datefinlocation;
    }

    public function setDatefinlocation(\DateTimeInterface $datefinlocation): static
    {
        $this->datefinlocation = $datefinlocation;

        return $this;
    }

    public function getIdclient(): ?client
    {
        return $this->idclient;
    }

    public function setIdclient(?client $idclient): static
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdbijou(): ?bijou
    {
        return $this->idbijou;
    }

    public function setIdbijou(?bijou $idbijou): static
    {
        $this->idbijou = $idbijou;

        return $this;
    }
}
