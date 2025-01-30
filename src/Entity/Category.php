<?php

namespace App\Entity;


class Category{
  private ?int $id = null;

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