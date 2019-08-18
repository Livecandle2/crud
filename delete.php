<?php

if ($_GET ['id']) {
    $pdo = new PDO("pgsql:host=localhost;dbname=postgres", 'postgres', 'Khcd5028');
    $stmt = $pdo->prepare('DELETE FROM Article WHERE id = :id');
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();

}

header('Location: read.php');