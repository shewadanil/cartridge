<?php
include_once "html_header.php";
?>
    <div>
        <a href="login"><button>Войти</button></a>
    </div>
    <div>
        <a href="exit"><button type="submit">Выйти</button></a>
    </div>

    <div>
        <a href="new_record">Добавить операцию</a>
    </div>

<div>
    <form action="" method="post">
        <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
        <button type="submit">Отправить</button>

    </form>
</div>


<div >
    <table border="2" >
        <thead>
        <tr>
            <th width="200px">Штрихкод</th>
            <th width="200px">Модель</th>
            <th>Дата</th>
            <th>Услуга</th>
            <th>Цена</th>
        </tr>
        <?php foreach ($results as $result):?>
        <tr>
            <th width="200px"><?php echo $result->getBarcode()?></th>
            <th width="200px"><?php echo $result->getModel()?></th>
            <th width="200px"><?php echo $result->getDate()?></th>
            <th width="200px"><?php echo $result->getService()?></th>
            <th width="200px"><?php echo $result->getPrice()?></th>
            <th>
                <form action="edit_cartridge" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $result->getId()?>">
                    <button type="submit" >Редактировать</button>
                </form>
            </th>
        </tr>
        <?php endforeach;?>


        </thead>
    </table>
    <br>
</div>

<?php

include_once "html_footer.php"
?>