<?php

namespace App\Entity;

use App\Repository\FlagRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlagRepository::class)]
class Flag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $countryName = null;

    #[ORM\Column(length: 255)]
    private ?string $flagUrl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(string $countryName): static
    {
        $this->countryName = $countryName;

        return $this;
    }

    public function getFlagUrl(): ?string
    {
        return $this->flagUrl;
    }

    public function setFlagUrl(string $flagUrl): static
    {
        $this->flagUrl = $flagUrl;

        return $this;
    }
}