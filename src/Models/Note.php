<?php

namespace App\Models;

use PDO;
use Config\DataBase;

class Note
{
    protected ?int $id;
    protected ?int $value;
    protected ?int $id_user;
    protected ?int $id_article;

    public function __construct(?int $id, ?int $value, ?int $id_user, ?int $id_article)
    {
        $this->id = $id;
        $this->value = $value;
        $this->id_user = $id_user;
        $this->id_article = $id_article;
    }

    public function addNoteToArticle()
    {
        $pdo = DataBase::getConnection();
        $sql = "INSERT INTO `note` (`value`,`id_user`,`id_article`) VALUE (?,?,?)";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->value, $this->id_user, $this->id_article]);
    }

    public function countNoteByArticleId()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT count(`value`) FROM `note` WHERE `id_article` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id_article]);
        return $resultFetch = $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function sumArticleNote()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT SUM(value)
                FROM `note`
                WHERE `id_article` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id_article]);
        return $resultFetch = $statement->fetch(PDO::FETCH_ASSOC);
    }


    public function getNoteByUserId()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT `value` FROM `note` WHERE `id_article` = ? AND `id_user` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id_article, $this->id_user]);
        return $resultFetch = $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteNote()
    {
        $pdo = DataBase::getConnection();
        $sql = "DELETE FROM `note` WHERE `id` = ?";
        $statement = $pdo->prepare($sql);
        return $statement->execute([$this->id]);
    }

    public function getId(): int
    {
        return $this->id;
    }

    // public function getNumberVote(): int {
    //     return $this->numberVote;
    // }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getIdUser(): int
    {
        return $this->id_user;
    }


    public function getIdArticle(): int
    {
        return $this->id_article;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    // public function setNumberVote(int $numberVote): static {
    //     $this->numberVote = $numberVote;
    //     return $this;
    // }

    public function setValue(int $value): static
    {
        $this->value = $value;
        return $this;
    }

    public function setIdUser(int $id_user): static
    {
        $this->id_user = $id_user;
        return $this;
    }

    public function setIdArticle(int $id_article): static
    {
        $this->id_article = $id_article;
        return $this;
    }
}
