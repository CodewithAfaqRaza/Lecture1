<?php

namespace App\Entity;

use App\Repository\PassportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassportRepository::class)]
class Passport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $passNum = null;
    // owning side 
    #[ORM\OneToOne(inversedBy: 'passport', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Citizen $citizen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassNum(): ?string
    {
        return $this->passNum;
    }

    public function setPassNum(string $passNum): static
    {
        $this->passNum = $passNum;

        return $this;
    }

    public function getCitizen(): ?Citizen
    {
        return $this->citizen;
    }

    public function setCitizen(Citizen $citizen): static
    {
        $this->citizen = $citizen;

        return $this;
    }
}
