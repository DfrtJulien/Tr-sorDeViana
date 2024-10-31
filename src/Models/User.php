<?php

namespace App\Models;

use PDO;
use App\Models\Users;
use App\Models\Admin;
use Config\DataBase;

class User extends Users
{

    public function getUserPorfile()
    {
        $pdo = DataBase::getConnection();
        $sql = "SELECT `userinfo`.`city`, `userinfo`.`street`, `userinfo`.`postal`, `userinfo`.`phoneNumber`,`user`.`mail`
                FROM `userinfo`
                INNER JOIN `user` ON `userinfo`.`id` = `user`.`id`
                WHERE `userinfo`.`id` = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$this->id]);
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new User(null, $row['mail'], null, null, $row['city'], $row['postal'], $row['street'], null, null, $row['phoneNumber'], null, null);
        } else {
            return null;
        }
    }
}
