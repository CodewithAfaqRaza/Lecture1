<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]


class Category{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
  private ?int $id = null;
    #[ORM\Column]
  private ?string $name = null;

  


  /**
   * Get the value of name
   *
   * @return ?string
   */
  public function getName(): ?string
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @param ?string $name
   *
   * @return self
   */
  public function setName(?string $name): self
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of id
   *
   * @return ?int
   */
  public function getId(): ?int
  {
    return $this->id;
  }
}