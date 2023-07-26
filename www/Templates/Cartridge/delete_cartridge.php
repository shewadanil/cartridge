<?php
include_once __DIR__ . "/../html_header.php";
?>

<div class="container mb-3">
    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">На Главную</a>
    <?php if($result != null):?>
        <table class="table table-bordered ">
            <tr class="active">
                <th >Штрихкод</th>
                <th >Модель</th>
                <th >Дата</th>
                <th >Услуга</th>
                <th >Цена</th>
            </tr>
            <tr>
                <th> <input type="text" name="model" id="model" value="<?php echo $result->getModel()?>"></th>
                <th> <input type="text" name="barcode" id="barcode" value="<?php echo $result->getBarcode()?>"></th>
                <th> <input type="text" name="service" id="service" value="<?php echo $result->getService()?>"></th>
                <th> <input type="text" name="price" id="price" value="<?php echo $result->getPrice()?>"></th>
                <th> <input type="date" name="date" id="date" value="<?php echo $result->getDate()?>"></th>

            </tr>
        </table>
    <div>
            <p>Вы точно хотите удалить запись?</p>
            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $result->getId()?>"><br>
                <button class="btn btn-info rounded-pill px-3" type="submit">Да</button>
            </form>
            <form action="/">
                <button class="btn btn-info rounded-pill px-3" type="submit">Нет</button>
            </form>

    </div>
    <?php else:?>
    <p>Такой записи нет</p>
    <?php endif;?>
</div>


<?php
include_once __DIR__ . "/../html_footer.php"
?>
