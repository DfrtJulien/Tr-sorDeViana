<?php

namespace App\Models;

use PDO;
use Config\DataBase;

class Article
{
    protected ?int $id;
    protected ?string $title;
    protected ?string $description;
    protected ?float $priceExcludingTax;
    protected ?int $tva;
    protected ?string $category;
    protected ?int $quantity;
    protected ?string $material;

    public function __construct(?int $id,?string $title, ?string $description,  ?float $priceExcludingTax,  ?int $tva, ?string $category,  ?int $quantity, ?string $material)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->priceExcludingTax = $priceExcludingTax;
        $this->tva = $tva;
        $this->category = $category;
        $this->quantity = $quantity;
        $this->material = $material;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPriceExcludingTax(): ?float
    {
        return $this->priceExcludingTax;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function setPriceExcludingTaxe(float $priceExcludingTax): static
    {
        $this->priceExcludingTax = $priceExcludingTax;
        return $this;
    }

    public function setTva(int $tva): static
    {
        $this->tva = $tva;
        return $this;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;
        return $this;
    }

    public function setQuantityt(int $quantity): static
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setMaterial(string $material): static
    {
        $this->material = $material;
        return $this;
    }
}