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
    protected ?string $img_path;
    protected ?string $content;
    protected ?string $creation_date;
    protected string|null $modification_date;
    protected ?int $id_user;
    protected ?int $id_article;
    protected ?string $firstname;
    protected ?string $lastname;
    protected ?string $id_comment;

    public function __construct(?int $id, ?string $title, ?string $description,  ?float $priceExcludingTax,  ?int $tva, ?string $category,  ?int $quantity, ?string $material, ?string $img_path, ?string $content, ?string $creation_date, string|null $modification_date, ?int $id_user, ?int $id_article, ?string $firstname, ?string $lastname, ?string $id_comment)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->priceExcludingTax = $priceExcludingTax;
        $this->tva = $tva;
        $this->category = $category;
        $this->quantity = $quantity;
        $this->material = $material;
        $this->img_path = $img_path;
        $this->content = $content;
        $this->creation_date = $creation_date;
        $this->modification_date = $modification_date;
        $this->id_user = $id_user;
        $this->id_article = $id_article;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->id_comment = $id_comment;
    }

    public function addArticle()
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO article (id, title, description, priceExcludingTax, tva, category, quantity, material,img_path) VALUES (?,?,?,?,?,?,?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id, $this->title, $this->description, $this->priceExcludingTax, $this->tva, $this->category, $this->quantity,  $this->material, $this->img_path]);
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
                $article = new Article($row['id'], $row['title'], $row['description'], $row['priceExcludingTax'], $row['tva'], $row['category'], $row['quantity'], $row['material'], $row['img_path'], null, null, null, null, null, null, null, null);
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
            return new Article($row['id'], $row['title'], $row['description'], $row['priceExcludingTax'], $row['tva'], $row['category'], $row['quantity'], $row['material'], $row['img_path'], null, null, null, null, null, null, null, null);
        } else {
            return null;
        }
    }

    public function updateArticle()
    {
        $pdo = DataBase::getConnection();
        $sql = "UPDATE `article` 
        SET `title` = ?, `description` = ?, `priceExcludingTax` = ?, `tva` = ?, `category` = ?, `quantity` = ?, `material` = ?, `img_path` = ?
        WHERE `article`.`id` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->title, $this->description, $this->priceExcludingTax, $this->tva, $this->category, $this->quantity,  $this->material, $this->img_path, $this->id]);
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
                $article = new Article($row['id'], $row['title'], $row['description'], $row['priceExcludingTax'], $row['tva'], $row['category'], $row['quantity'], $row['material'], $row['img_path'], null, null, null, null, null, null, null, null);
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

    public function getComment()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT `comment`.`id` AS `id_comment`,`comment`.`content`, `comment`.`creation_date`,  `comment`.`modification_date`,`comment`.`id_user`,`comment`.`id_article`, `userinfo`.`firstname`, `userinfo`.`lastname`, `article`.`id`
                FROM `comment`
                RIGHT JOIN `userinfo` ON `comment`.`id_user` = `userinfo`.`id`
                LEFT JOIN `article` ON `comment`.`id_article` = `article`.`id`
                WHERE `comment`.`id_article` = ?;";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id]);
        $resultFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];
        if ($resultFetch) {
            foreach ($resultFetch as $row) {
                $comment = new Article(null, null, null, null, null, null, null, null, null, $row['content'], $row['creation_date'], $row['modification_date'], $row['id_user'], $row['id_article'], $row['firstname'], $row['lastname'], $row['id_comment']);
                $comments[] = $comment;
            }
            return $comments;
        }
    }

    public function getCommentById()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT * FROM `comment` WHERE id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id_comment]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Article(null, null, null, null, null, null, null, null, null, $row['content'], null, null, null, null, null, null, null);
        } else {
            return null;
        }
    }

    public function editComment()
    {
        $pdo = DataBase::getConnection();
        $sql = "UPDATE `comment` 
        SET `content` = ?, `modification_date` = ?
        WHERE `comment`.`id` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->content, $this->modification_date, $this->id_comment]);
    }

    public function deleteComment()
    {
        $pdo = DataBase::getConnection();
        $sql = "DELETE FROM `comment` WHERE `id` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id_comment]);
    }

    public function getNumberComment()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT COUNT(content) FROM `comment` WHERE id_article = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id]);
        return $resultFetch = $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addToCart()
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO `cart` (`id_user`,`id_article`) VALUE (?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id_user, $this->id_article]);
    }

    public function getCartArticleByIdUser()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT `article`.`id`,`article`.`title`,`article`.`priceExcludingTax`,`article`.`img_path`
                FROM `article` 
                INNER JOIN `cart` ON `article`.`id` = `cart`.`id_article`
                WHERE `cart`.`id_user` = ?;";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id_user]);
        $resultFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        $articles = [];
        if ($resultFetch) {
            foreach ($resultFetch as $row) {
                $article = new Article($row['id'], $row['title'], null, $row['priceExcludingTax'], null, null, null, null, $row['img_path'], null, null, null, null, null, null, null, null);
                $articles[] = $article;
            }
            return $articles;
        }
    }

    public function deleteArticleFromCart()
    {
        $pdo = DataBase::getConnection();
        $sql = "DELETE FROM `cart` WHERE `id_article` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id_article]);
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

    public function getImgArticle(): ?string
    {
        return $this->img_path;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function getCreationDate(): ?string
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function getIdComment(): ?string
    {
        return $this->id_comment;
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

    public function setFirstname($firstname): static
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname): static
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function setIdComment($id_comment): static
    {
        $this->id_comment = $id_comment;
        return $this;
    }
}
