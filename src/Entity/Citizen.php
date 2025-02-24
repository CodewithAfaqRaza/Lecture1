<?php

namespace App\Entity;

use App\Repository\CitizenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CitizenRepository::class)]
class Citizen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $fathername = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\OneToOne(mappedBy: 'citizen', cascade: ['persist', 'remove'])]
    private ?Passport $passport = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFathername(): ?string
    {
        return $this->fathername;
    }

    public function setFathername(string $fathername): static
    {
        $this->fathername = $fathername;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassport(): ?Passport
    {
        return $this->passport;
    }

    public function setPassport(Passport $passport): static
    {
        // set the owning side of the relation if necessary
        if ($passport->getCitizen() !== $this) {
            $passport->setCitizen($this);
        }

        $this->passport = $passport;

        return $this;
    }
}
