<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Учет картриджей</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <div>
        <form action="form-php/login.php" method="post">
            <input type="text" name="login" id="login" placeholder="Логин"><br>
            <input type="text" name="password" id="password" placeholder="Пароль"><br>
            <button type="submit">Войти</button>
        </form>
    </div>

    <button type="submit"><a href="form-php/exit.php">Выйти</a></button>
    <div><a href="view/form.php">Добавить операцию</a></div>

<div>
    <form action="" method="post">
        <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
        <button type="submit">Отправить</button>

    </form>
</div>


<div >
    <table border="1" >
        <thead>
        <tr>

            <th width="200px">Штрихкод</th>
            <th width="200px">Модель</th>
        </tr>

    </table>
    <br>
    <table width="500" border="1" >
        <thead >
        <tr>
            <th>Дата</th>
            <th>Услуга</th>
            <th>Цена</th>
        </tr>
        </thead>

    </table>
</div>


</body>
</html>