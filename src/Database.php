<?php

namespace App;

use App\Models\Post;
use PDO;
use PDOException;

class Database
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('sqlite:' . __DIR__ . '/../db.sqlite');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'sqlite:' . __DIR__;
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function all($table, $class)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function find($table, $class, $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    public function insert($table, $fields)
    {

        $fieldNames = array_keys($fields);
        $fieldNamesText = implode(', ', $fieldNames);
        $fieldValuesText = implode("', '", $fields);

        $sql = "INSERT INTO $table ($fieldNamesText)
        VALUES ('$fieldValuesText')";
        // use exec() because no results are returned
        $this->conn->exec($sql);
    }
    public function update($table, $fields, $id)
    {
        $updateFieldsText = '';
        foreach($fields as $key=>$value){
            $updateFieldsText .= "$key='$value', ";
        }
        $updateFieldsText = substr($updateFieldsText,0,-2);
        $sql = "UPDATE $table SET $updateFieldsText WHERE id=$id";
        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }
    public function delete($table, $id){
        $sql = "DELETE FROM $table WHERE id=$id";

        // use exec() because no results are returned
        $this->conn->exec($sql);
    }
}