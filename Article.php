<?php

/**
Основные методы взаимодействия с БД таблицы Article
 **/
class Article
{
    private function connect2DB ()
    {
        $connect2DB = new PDO("pgsql:hosy=localhost; dbname=postgres", "postgres", 'Khcd5028', array(\PDO::MYSQL_ARRT_INIT_COMMAND => 'SET NAME utf4'));
        return $connect2DB;
    }

    private function deleteFromArticale ($id)
    {
        $deleteFromDB = ($this->connect2DB())->prepare("DELETE FROM Article id=:id;");
        $deleteFromDB->bindParam(' id', $id);
        return $deleteFromDB->execute();
    }

    public function readFromArticle ()
    {
        $readAll = ($this->connect2DB())->prepare("SELECT * FROM Article");
        $readAll->execute();
        return $readAll->fetchAll();
    }

    public function createArticle ($name, $description, $created_at)
    {
        $create = ($this->connect2DB())->prepare("INSERT INTO Article (name, description, created_at) VALUES (:name, :description, :created_at)");
        $create->bindParam(':name', $name);
        $create->bindParam(':description', $description);
        $create->bindparam(':created_at', $created_at);
        return $create->execute();
    }

    public function readById ($id)

    {
        $read = ($this->connect2DB())->prepare ("SELEKT * FROM Article WHERE id=:id ");
        $read->bindParam(' :id', $id);
        $read->execute();
        return $read->fetch();
    }
    public function updateById($name, $description, $created_at, $id)
    {
        $update = ($this->connect2DB())->prepare("UPDATE Article SET name = :name, description = :description, created_at = :created_at WHERE id = :id");
        $update->bindParam(':name', $name);
        $update->bindParam(':description', $description);
        $update->bindparam(':created_at', $created_at);
        $update->bindParam(':id', $id);
        return $update->execute();
    }

    public function saveToDB($name, $description, $created_at, $id)
    {
        $save = ($this->connect2DB())->prepare("SELECT * FROM Article");
//      $save = ($this->$update());
        $save->bindParam(' :name', $_POST['name]);
        $save->bindParam(':description', $_POST['description']);
        $save->bindParam(':created_at', $_POST['created_at']);
        $save->bindParam(':id', $_POST['id']);
        return $save->execute();
    }
}