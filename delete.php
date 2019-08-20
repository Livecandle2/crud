<?php

if ($_GET ['id']) {
//    $pdo = new PDO("pgsql:host=localhost;dbname=postgres", 'postgres', 'Khcd5028');
//    $stmt = $pdo->prepare('DELETE FROM Article WHERE id = :id');
//    $stmt->bindValue(':id', $_GET['id']);
//    $stmt->execute();
    $Article = new Article();
    $Article->deleteFromArticle(':id', $_GET['id']);
    require('Article.php');
}

header('Location: read.php');