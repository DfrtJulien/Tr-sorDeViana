<?php

namespace App\Models;

use PDO;
use Config\DataBase;
use DateTime;

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
    protected ?string $content;
    protected ?string $creation_date;
    protected string|null $modification_date;
    protected ?int $id_user;
    protected ?int $id_article;

    public function __construct(?int $id, ?string $title, ?string $description,  ?float $priceExcludingTax,  ?int $tva, ?string $category,  ?int $quantity, ?string $material, ?string $content, ?string $creation_date, string|null $modification_date, ?int $id_user, ?int $id_article)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->priceExcludingTax = $priceExcludingTax;
        $this->tva = $tva;
        $this->category = $category;
        $this->quantity = $quantity;
        $this->material = $material;
        $this->content = $content;
        $this->creation_date = $creation_date;
        $this->modification_date = $modification_date;
        $this->id_user = $id_user;
        $this->id_article = $id_article;
    }

    public function addArticle()
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO article (id, title, description, priceExcludingTax, tva, category, quantity, material) VALUES (?,?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id, $this->title, $this->description, $this->priceExcludingTax, $this->tva, $this->category, $this->quantity,  $this->material]);
    }

    public function getAllArticle()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM article";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $resultFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        $articles = [];
        if ($resultFetch) {
            foreach ($resultFetch as $row) {
                $article = new Article($row['id'], $row['title'], $row['description'], $row['priceExcludingTax'], $row['tva'], $row['category'], $row['quantity'], $row['material'], null, null, null, null, null);
                $articles[] = $article;
            }
            return $articles;
        }
    }

    public function getArticleById()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM `article` WHERE id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Article($row['id'], $row['title'], $row['description'], $row['priceExcludingTax'], $row['tva'], $row['category'], $row['quantity'], $row['material'], null, null, null, null, null);
        } else {
            return null;
        }
    }

    public function updateArticle()
    {
        $pdo = DataBase::getConnection();
        $sql = "UPDATE `article` 
        SET `title` = ?, `description` = ?, `priceExcludingTax` = ?, `tva` = ?, `category` = ?, `quantity` = ?, `material` = ?
        WHERE `article`.`id` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->title, $this->description, $this->priceExcludingTax, $this->tva, $this->category, $this->quantity,  $this->material, $this->id]);
    }

    public function deleteArticle()
    {
        $pdo = DataBase::getConnection();
        $sql = 'DELETE FROM `article` WHERE `id` = ?';
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id]);
    }

    public function getArticleByCategory()
    {
        $pdo = DataBase::getConnection();
        $sql = 'SELECT * FROM `article` WHERE `category` = ?';
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->category]);
        $resultFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        $articles = [];
        if ($resultFetch) {
            foreach ($resultFetch as $row) {
                $article = new Article($row['id'], $row['title'], $row['description'], $row['priceExcludingTax'], $row['tva'], $row['category'], $row['quantity'], $row['material'], null, null, null, null, null);
                $articles[] = $article;
            }
            return $articles;
        }
    }

    public function addComment()
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO `comment` (`content`,`creation_date`,`modification_date`,`id_user`,`id_article`) VALUE (?,?,?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->content, $this->creation_date, $this->modification_date, $this->id_user, $this->id_article]);
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getCreationDate(): ?DateTime
    {
        return $this->creation_date;
    }

    public function getModificationDate()
    {
        return $this->modification_date;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function getIdArticle(): ?int
    {
        return $this->id_article;
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

    public function setContent($content): static
    {
        $this->content = $content;
        return $this;
    }

    public function setCreationDate($creation_date): static
    {
        $this->creation_date = $creation_date;
        return $this;
    }

    public function setModificationDate($modification_date): static
    {
        $this->modification_date = $modification_date;
        return $this;
    }

    public function setIdUser($id_user): static
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function setIdArticle($id_article): static
    {
        $this->id_article = $id_article;
        return $this;
    }
}
