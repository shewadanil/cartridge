<?php
    require "../autoloader.php";
    $cartridg = NULL;
    require 'includ_db.php';
    $id = $req->getKey('id');
    $result = $mysql->query("SELECT * FROM `cartridge` WHERE `id` = '$id'");

    if($result->num_rows == 0){
        echo "Не найдена запись";
        exit();
    }

    while ($r = $result->fetch_assoc()){
        $cartridg = new Cartridge\Cartridg($r["id"], $r["model"], $r['barcode'], $r['service'], $r['price'], $r['date']);

    }

    /*$r = $result->fetch_assoc();
    print_r($r);
    $cart = new Cartridge($r['id'], $r['model'], $r['barcode'], $r['service'], $r['price']);
    $cart->print();*/

    $mysql->close();


?>
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
<a href="../index.php">На Главную</a>
<form action="edit_check.php" method="post">
    <input type="text" name="model" id="model" value="<?php echo $cartridg->model?>"><br>
    <input type="text" name="barcode" id="barcode" value="<?php echo $cartridg->barcode?>"> <br>
    <input type="text" name="service" id="service" value="<?php echo $cartridg->service?>"> <br>
    <input type="text" name="price" id="price" value="<?php echo $cartridg->price?>"> <br>
    <input type="text" name="id" id="id" value="<?php echo $id?>"> <br>
    <button type="submit">Отправить</button>

</form>
</body>
</html>
