<?php

if ($_GET ['id']) {
//    $pdo = new PDO("pgsql:host=localhost;dbname=postgres", 'postgres', 'Khcd5028');
//    $stmt = $pdo->prepare('DELETE FROM Article WHERE id = :id');
//    $stmt->bindValue(':id', $_GET['id']);
//    $stmt->execute();
    $Article = new Article();
    $Article->deleteFromArticle($_POST['Name'], $_POST['Description'], $_POST['Created_at']);
    require('Article.php');
}

header('Location: read.php');