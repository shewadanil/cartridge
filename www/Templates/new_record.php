<?php
include_once "html_header.php";
?>
    <a href="/">На Главную</a>
<?php if ($check === null):?>
    <form action="" method="post">
        <input type="text" name="model" id="model" placeholder="Модель"><br>
        <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"><br>
        <input type="text" name="service" id="service" placeholder="Услуга"><br>
        <input type="text" name="price" id="price" placeholder="Цена"><br>
        <input type="date" name="date" id="date" placeholder="Дата"><br>
        <button type="submit">Отправить</button>
        <input type="hidden" name="check" id="check" value="<?php echo $check = true?>"><br>
    </form>
<?php endif?>
<?php
include_once "html_footer.php"
?>