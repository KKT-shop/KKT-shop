<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $namecate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamecate(): ?string
    {
        return $this->namecate;
    }

    public function setNamecate(string $namecate): self
    {
        $this->namecate = $namecate;

        return $this;
    }
}
