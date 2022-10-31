<?php

namespace App\Entity;

class Agenda {


  private int $id;
  private ?string $title;
  private ?string $details;
  private ?string $date;
  private ?bool $important;


  public function getId(): ?int {
    return $this->id;
  }
 
  public function getTitle(): ?string {
    return $this->title;
  }
  public function setTitle(?string $title): void {
    $this->title = $title;
  }
 
  public function getDetails(): ?string {
    return $this->details;
  }
  public function setDetails(?string $details): void {
    $this->details = $details;
  }
 
  public function getDatetime(): ?string {
    return $this->date;
  }
  public function setDatetime(?string $date): void {
    $this->date = $date;
  }

  public function getImportant(): ?bool {
    return $this->important;

  }
  public function setImportant(?bool $important): void {
    $this->important = $important;
  }
}
?>