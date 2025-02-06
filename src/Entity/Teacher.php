<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Name Should not be empty")]
    private ?string $Name = null;
    
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank (message:" Father Name Should not be empty")]
    private ?string $FatherName = null;
    
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Email Should not be empty")]
    private ?string $Email = null;
    
    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message:"Address Should not be empty")]
    private ?string $Address = null;
    
    #[ORM\Column]
    #[Assert\NotBlank(message:"Contact Number Should not be empty")]
    private ?int $ContactNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFatherName(): ?string
    {
        return $this->FatherName;
    }

    public function setFatherName(string $FatherName): static
    {
        $this->FatherName = $FatherName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): static
    {
        $this->Address = $Address;

        return $this;
    }

    public function getContactNumber(): ?int
    {
        return $this->ContactNumber;
    }

    public function setContactNumber(int $ContactNumber): static
    {
        $this->ContactNumber = $ContactNumber;

        return $this;
    }
}