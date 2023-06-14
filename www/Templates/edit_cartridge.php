<?php

/*    require "../autoloader.php";
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

    $r = $result->fetch_assoc();
    print_r($r);
    $cart = new Cartridge($r['id'], $r['model'], $r['barcode'], $r['service'], $r['price']);
    $cart->print();

    $mysql->close();


*/?>

<body>
<a href="/">На Главную</a>

<form action="" method="post">
    <input type="text" name="model" id="model" value="<?php echo $results->getModel()?>"><br>
    <input type="text" name="barcode" id="barcode" value="<?php echo $results->getBarcode()?>"> <br>
    <input type="text" name="service" id="service" value="<?php echo $results->getService()?>"> <br>
    <input type="text" name="price" id="price" value="<?php echo $results->getPrice()?>"> <br>
    <input type="text" name="id" id="id" value="<?php echo $results->getId()?>"> <br>
    <button type="submit">Отправить</button>
</form>
</body>

