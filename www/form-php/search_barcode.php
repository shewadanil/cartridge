
<?php
if($_POST){
    $i = 0;

    require 'includ_db.php';
    $barcode = $_POST['barcode'];
    $mysql = new mysqli('database','Danil','1209vzQla','docker');
    $result = $mysql->query("SELECT * FROM `cartridge` WHERE `barcode` = '$barcode'");

    if($result->num_rows == 0){
        echo "Не найден штрихкод";
        exit();
    }

    while ($r = $result->fetch_assoc()){
        $cartridg["$i"] = new Cartridg($r["id"], $r["model"], $r['barcode'], $r['service'], $r['price'], r['date']);
        $i++;
    }

    /*$r = $result->fetch_assoc();
    print_r($r);
    $cart = new Cartridge($r['id'], $r['model'], $r['barcode'], $r['service'], $r['price']);
    $cart->print();*/

    $mysql->close();

    header('Location: /index.php');


}

?>
