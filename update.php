<?php
$timestamp = date('Y-m-d H:i:s', time());
$pdo = new PDO("pgsql:host=localhost;dbname=postgres", 'postgres', 'Khcd5028');
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {
    $stmt = $pdo->prepare('UPDATE article SET name = :name, description = :description, created_at = :created_at WHERE id = :id');
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':description', $_POST['description']);
    $stmt->bindValue(':created_at', $_POST['created_at']);
    $stmt->execute();


}
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM article WHERE id = :id');
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $article = $stmt->fetch();
} else {
    header("Location: read.php");
}


?>
<html>
<head>

</head>
<body>

<table>

    <tr>
        <td colspan="2"><h2>Введите новые данные </h2></td>
    </tr>
    <tr>

<form method="post" name="Update" autocomplite="on">
         <td width="50px;" style="font-weight: bold"> Имя </td>

        <td><input type="text" required name="name" placeholder="name" value="<?php echo $article['name'] ?>" </td>
    </tr>
    <tr>
        <td style="font-weight: bold"> Описание </td>
        <td><input type="text" required name="description" placeholder="description" value="<?php echo $article['description'] ?>"></td>
    </tr>
    <tr>
        <td style="font-weight: bold"> Дата </td>
        <td><input type="text" required name="created_at" placeholder="created_at" value="<?php echo $article['created_at'] ?>"></td>
    </tr>
</table>
    <p> <input type="submit" value="Сохранить изменения">
    <input type="reset" value="Вернуть в исходное состояние"></p>
</form>


</body>
</html>