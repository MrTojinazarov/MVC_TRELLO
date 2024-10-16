<?php

namespace App\Models;

use App\Database\Database;
use PDO;

class Model extends Database
{

    protected static $table;

    public static function getAll()
    {
        $sql = "SELECT * FROM " . static::$table;
        $query = self::connect()->query($sql);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function CheckUserExists($data)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE email = :email";
        $query = self::connect()->prepare($sql);
        $query->bindParam(':email', $data['email']);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public static function createUser($data)
    {
        if ($data['password']) {
            $data['password'] = md5($data['password']);
        }

        $keys = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO " . static::$table . " ({$keys}) VALUES ({$values})";
        $stmt = self::connect()->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        if ($stmt->execute()) {
            return self::CheckUserExists($data);
        }
    }

    public static function getUserByLogin($data)
    {

        if ($data['password']) {
            $data['password'] = md5($data['password']);
        }

        $sql = "SELECT * FROM " . static::$table . " WHERE email = :email AND password = :password";
        $query = self::connect()->prepare($sql);
        $query->bindParam(':email', $data['email']);
        $query->bindParam(':password', $data['password']);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public static function saveUpdatedUser($data)
    {
        $query = "UPDATE " . static::$table . " SET role = :role, status = :status WHERE id = :id";

        $stmt = self::connect()->prepare($query);

        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':status', $data['status'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function deleteById($id)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
        $stmt = self::connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function addTask($data)
    {
        $sql = "INSERT INTO " . static::$table . " (title, description, img, user_id, status, comment) 
                    VALUES (:title, :description, :img, :user_id, :status, :comment)";

        $stmt = self::connect()->prepare($sql);

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':img', $data['img']);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':comment', $data['comment']);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function getUserById($id) {
        
        $stmt = self::connect()->prepare("SELECT * FROM " . static::$table . " WHERE id = ?");
        $stmt->execute([$id]);
        
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
