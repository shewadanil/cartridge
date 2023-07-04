<?php
include_once __DIR__ . "/../html_header.php";
?>
<div class="container">
    <a href="/">На Главную</a>
    <?php if($check === "true"):?>
    <p>Операция проведена успешно</p>
    <?php else:?>
    <p>Что-то пошло не так</p>
    <?php endif;?>
    <div >
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>Штрихкод</th>
                <th>Модель</th>
                <th>Дата</th>
                <th>Услуга</th>
                <th>Цена</th>
            </tr>
            <?php if (isset($cartridge) === true):?>
                    <tr>
                        <th ><?php echo $cartridge->getBarcode()?></th>
                        <th ><?php echo $cartridge->getModel()?></th>
                        <th ><?php echo $cartridge->getDate()?></th>
                        <th ><?php echo $cartridge->getService()?></th>
                        <th ><?php echo $cartridge->getPrice()?></th>
                    </tr>
            <?php endif;?>
            <?php if (isset($check) === true && isset($cartridge) === false):?>
                <div><p>Такой записи нет</p></div>
            <?php endif;?>
            </thead>
        </table>
        <br>
    </div>
</div>
<?php
include_once __DIR__ . "/../html_footer.php"
?>
