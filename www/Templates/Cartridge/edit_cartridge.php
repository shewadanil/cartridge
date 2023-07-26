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
<?php
include_once __DIR__ . "/../html_header.php";
?>
<div class="container mb-3">
<a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">На Главную</a>
<form action="" method="post">
    <table class="table table-bordered ">
        <tr class="active">
            <th >Штрихкод</th>
            <th >Модель</th>
            <th >Дата</th>
            <th >Услуга</th>
            <th >Цена</th>
        </tr>
        <tr>
            <th> <input type="text" name="model" id="model" value="<?php echo $results->getModel()?>"></th>
            <th> <input type="text" name="barcode" id="barcode" value="<?php echo $results->getBarcode()?>"></th>
            <th> <input type="text" name="service" id="service" value="<?php echo $results->getService()?>"></th>
            <th> <input type="text" name="price" id="price" value="<?php echo $results->getPrice()?>"></th>
            <th> <input type="date" name="date" id="date" value="<?php echo $results->getDate()?>"></th>

        </tr>
    </table>
    <button class="btn btn-info rounded-pill px-3" type="submit">Отправить</button>
</form>
</div>
<?php
include_once __DIR__ . "/../html_footer.php"
?>
