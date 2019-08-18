<?php
//Метод Read
//Формируем запрос к базе данных и результат передаем в массив

$Connect2DB = new PDO("pgsql:host = localhost; dbname = postgres", "postgres", 'Khcd5028', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAME utf8'));
$readFromDB = $Connect2DB -> prepare ("SELECT * FROM Article");
$readFromDB->execute( );
$Resalt = $readFromDB->fetchAll();

?>

<!--Форма отображения данных ввиде грида-->
<head>
    <title> Таблица </title>
</head>

<body>


<form action="" name="Modif" method="post">

    <Table border="1" >

        <!--Заголовок таблицы-->
        <caption style="font-size:xx-large">Article</caption>

        <!--Шапка таблицы-->
        <tr style="font-weight: bold" >
            <td>Имя</td><td>Описание</td><td>Дата создания</td><td>Действие</td>

        </tr>
        <!--Наполнение таблицы данными-->
        <?php
        foreach ($Resalt as $item) { ?>

        <tr>
            <td> <?php echo $item['name']; ?> </td>
            <td> <?php echo $item['description']; ?> </td>
            <td> <?php echo $item['created_at']; ?> </td>

            <td>
                <a href="update.php?id=<?php echo $item['id'];?>"> Изменить </a>
                <a href="delete.php?id=<?php echo $item['id'];?>"> Удалить </a>

            </td>

        </tr>

        <?php } ?>
    </Table>

    <br>
    <button name="create" formaction="create.php" formmethod="post"> Добавить </button>

</form>
</body>
</html>
