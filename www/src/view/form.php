<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание формы</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <a href="../../index.php">На Главную</a>
    <form action="../../form-php/check.php" method="post">
        <input type="text" name="model" id="model" placeholder="Модель"> <br>
        <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
        <input type="text" name="service" id="service" placeholder="Услуга"> <br>
        <input type="text" name="price" id="price" placeholder="Цена"> <br>
        <button type="submit">Отправить</button>

    </form>
</body>
</html>