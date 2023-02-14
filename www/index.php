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
<?php
    spl_autoload_register(function ($class_name){
        require __DIR__ . '/src/class/' . $class_name . '.php';
    });
?>
    <?php
    $res = isset($_COOKIE["user"]);
    if($res == false):
    ?>
    <div>
        <form action="form-php/login.php" method="post">
            <input type="text" name="login" id="login" placeholder="Логин"><br>
            <input type="text" name="password" id="password" placeholder="Пароль"><br>
            <button type="submit">Войти</button>
        </form>
    </div>
    <?php endif;?>
        <?php
            $res = isset($_COOKIE["user"]);
            if($res != false):
        ?>
        <div><a href="form-php/form.php">Добавить операцию</a></div>
        <?php endif;?>
        <div>
            <form action="" method="post">
                <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
                <button type="submit">Отправить</button>

            </form>
        </div>

<?php
      $i = 0;
        if($_POST){
        require 'form-php/includ_db.php';
        $barcode = $_POST['barcode'];
        $result = $mysql->query("SELECT * FROM `cartridge` WHERE `barcode` = '$barcode'");

        if($result->num_rows == 0){
            echo "Не найден штрихкод";
            exit();
        }

        while ($r = $result->fetch_assoc()){
            $cartridg["$i"] = new Cartridg($r["id"], $r["model"], $r['barcode'], $r['service'], $r['price'], $r['date']);
            $i++;
        }

        /*$r = $result->fetch_assoc();
        print_r($r);
        $cart = new Cartridge($r['id'], $r['model'], $r['barcode'], $r['service'], $r['price']);
        $cart->print();*/

        $mysql->close();
    }

    ?>

    <div >
        <table border="1" >
            <thead>
            <tr>

                <th width="200px">Штрихкод</th>
                <th width="200px">Модель</th>
            </tr>
            <?php
            if ($_POST):
            ?>
            <th width="200"><?php  echo $cartridg[0]->barcode;?></th>
            <th width="200"><?php  echo $cartridg[0]->model;?></th>
            <?php endif;?>

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

            <?php
            for($j=0; $j<$i; $j++):
            ?>
                <tbody>
                    <td><?php echo $cartridg[$j]->date?></td>
                    <td><?php echo $cartridg[$j]->service?></td>
                    <td><?php echo $cartridg[$j]->price?></td>
                    <?php
                    echo '<td width="100"><a href="form-php/edit_form.php?id='.$cartridg[$j]->id.'"><button>Редактировать</button></a></td>';
                    echo '<td width="100"><a href="form-php/delete_form.php?id='.$cartridg[$j]->id.'"><button>Удалить</button></a></td>' ?>
                </tbody>

            <?php endfor;?>



        </table>
    </div>


</body>
</html>