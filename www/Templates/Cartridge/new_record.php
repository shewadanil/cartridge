<?php
include_once __DIR__ . "/../html_header.php";
?>
<div class="container">
    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">На Главную</a>
    <form action="" method="post">
        <table class="table table-bordered ">
            <tr>
                <th><input type="text" name="model" id="model" placeholder="Модель"><br></th>
                <th><input type="text" name="barcode" id="barcode" placeholder="Штрихкод"><br><br></th>
                <th> <input type="text" name="service" id="service" placeholder="Услуга"><br></th>
                <th> <input type="text" name="price" id="price" placeholder="Цена"><br></th>
                <th><input type="date" name="date" id="date" placeholder="Дата"><br></th>
            </tr>
        </table>
        <button class="btn btn-info rounded-pill px-3" type="submit">Отправить</button>
    </form>
</div>
<?php
include_once __DIR__ . "/../html_footer.php"
?>