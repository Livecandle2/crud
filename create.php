<?php
//Метод Create

if (isset($_POST['Description']) && isset($_POST['Name']) && isset($_POST['Created_at'])){
    //Условие, когда форма примера сама себя
    if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']) {
        //Проверены, чтобы все значения были заполнены

        $Connect2DB = new PDO ("pgsql:host = localhost; dbname = postgres", "postgres", 'Khcd5028', array(\ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $Create2DB = $Connect2DB -> prepare (" INSERT INTO Article (name, description, created_at) VALUES (:name, :description, :created_at )");
        $Create2DB -> bindParam(':name', $_POST['Name']);
        $Create2DB -> bindParam(':description', $_POST['Description']);
        $Create2DB -> bindParam(':created_at', $_POST['Created_at']);
        $Result = $Create2DB -> execute();

    }

    header ("Location: create.php");
    exit (); //Возвращаем в таблицу Index
}
?>

<html>
<! - форма добавления данных>
<head>
    <title> Create to Article </title>
</head>

<body>

<form action="create.php" method="post" name="create" autocomplete="on">

    <h1 style="font-size: x-large"> Введите данные </h1>

    <p> <input type="text" name="Name"> Имя </p>
    <p> <input type="text" name="Description"> Описание </p>
    <p> <input type="date" name="Created_at" value="<?php echo date('Y-m-d H:i:s', Time());?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания </p>

    <p>
        <input type="submit" value="Сохранить">

        <input type="reset" value="Очистить">

        <button name="chancel" formaction="create.php"> Отменить </button>

    </p>

</form>
</body>
</html>
