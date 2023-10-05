<?php

// src/Entity/User.php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
#[ORM\Entity(repositoryClass: "App\Repository\UserRepository")]
#[ORM\Table(name: "users")]
class User
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 180, unique: true)]
    private string $email;

    #[ORM\Column(type: "string", length: 255)]
    private string $full_name;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $bio = null;

    #[ORM\OneToOne(targetEntity: Inventory::class, mappedBy: "user", cascade: ["persist", "remove"])]
    private Inventory $inventory;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): self
    {
        $this->full_name = $full_name;
        return $this;
    }


    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;
        return $this;
    }

    public function getInventory(): Inventory
    {
        return $this->inventory;
    }
    
    public function setInventory(Inventory $inventory): self
    {
        $this->inventory = $inventory;
    
        // set the owning side of the relation if necessary
        if ($inventory->getUser() !== $this) {
            $inventory->setUser($this);
        }
    
        return $this;
    }
    public function __toString(): string
    {
        // You can change this to return any property of the user, e.g., email, full_name, etc.
        return $this->full_name;

    }
}
