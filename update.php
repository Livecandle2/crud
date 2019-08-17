<?php
//Метод Update
if (isset($Get['id']))
    //если вызов из другой формы методом GET
{
    //принимаем id - предопределяем метод Update
    //читаем из базы и наполняем массив для заполнения формы
    $Connect2DB = new PDO("pqsql:host=localhost; dbname=postgres", "postgres", "Khcd5028", array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $readFromDB = $Connect2DB->prepare("SELECT * FROM Article WHERE id=:IDENTITY ");
    $readFromDB->bindParam(":IDENTITY", $_GET['id']);
    $readFromDB->execute();
    $item = $readFromDB->fetch();

    foreach ($Resalt as $item)
        $Title = $item['name'];
}

if(isset($_POST['id']))
    {
    //если вызов произошел из этой формы по методу Update
    if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at'])
        {
            //проверяем, чтобы все значения были заполнены

            //апдейтим
    $Connect2DB = new PDO ("pgsql:host=localhost; dbname = postgres", "postgres", 'Khcd5028', array(\ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $Update2DB = $Connect2DB ->prepare("UPDATE Article SET name = :name, description = :description, created_at = :created_at WHERE id = :id");
    $Update2DB -> bindParam(':name', $_POST['Name']);
    $Update2DB -> bindParam(':description', $_POST['Description']);
    $Update2DB -> bindParam(':created_at', $_POST['Create_at']);
    $Update2DB -> bindParam(':id', $_POST['id']);

$Resalt = $Update2DB->execute();



        }
        header ( "location: read.php");

    exit(); //возвращаем в таблицу индекс
}
?>

<html>
<!--Форма редактирования записи данных-->
<head>

</head>

<body>

<form action="update.php" method="post" name="Update" autocomplite="on" >
    <h1 style="font-size: x-large">Введите данные</h1>

    <p> <input type="text" name="Name" value="<?php echo ($item['name']) ?>" /> Имя </p>

    <p> <input type="text" name="Description" value="<?php echo($item['description'])?>" /> Описание </p>

    <p> <input type="date" name="Created_at" value="<?php echo($item['created_at']) ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}"/> Дата создания </p>

    <p>
        <input type="submit" value="Сохранить изменения">
        <input type="reset" value="Вернуть в исходное состояние">
        <button name="chancel" formaction="update.php"> Отменить </button>
        <input type="text" name="id" value="<?php echo $item['id']?>" hidden>
    </p>
</form>
</body>
</html>

