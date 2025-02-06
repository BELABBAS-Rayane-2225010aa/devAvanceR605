<?php

namespace App\Entity;

use App\Enum;
use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;
use Suit;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $qustionstr = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Qcm $qcm = null;
    private Suit $type;
    public function getType(): ?Suit
    {
        return $this->type;
    }
    public function setType(?Suit $type): self
    {
        $this->type = $type;
        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQustionstr(): ?string
    {
        return $this->qustionstr;
    }

    public function setQustionstr(string $qustionstr): static
    {
        $this->qustionstr = $qustionstr;

        return $this;
    }

    public function getQcm(): ?Qcm
    {
        return $this->qcm;
    }

    public function setQcm(?Qcm $qcm): static
    {
        $this->qcm = $qcm;

        return $this;
    }
}
