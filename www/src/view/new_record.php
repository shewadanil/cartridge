<?php
include_once "html_header.php";

?>
    <a href="/">На Главную</a>
    <form action="/db?status=newrecord" method="post">
        <input type="text" name="model" id="model" placeholder="Модель"> <br>
        <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
        <input type="text" name="service" id="service" placeholder="Услуга"> <br>
        <input type="text" name="price" id="price" placeholder="Цена"> <br>
        <button type="submit">Отправить</button>
    </form>
<?php
include_once "html_footer.php"
?>