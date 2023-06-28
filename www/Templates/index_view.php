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
        <?php if (isset($results) === true):?>
        <?php foreach ($results as $result):?>
        <tr>
            <th ><?php echo $result->getBarcode()?></th>
            <th ><?php echo $result->getModel()?></th>
            <th ><?php echo $result->getDate()?></th>
            <th ><?php echo $result->getService()?></th>
            <th ><?php echo $result->getPrice()?></th>
            <th>
                <form action="edit_cartridge" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $result->getId()?>">
                    <button type="submit" >Редактировать</button>
                </form>
                <form action="delete_cartridge" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $result->getId()?>">
                    <button type="submit" >Удалить</button>
                </form>
            </th>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
        <?php if (isset($check) === true && isset($results[0]) === false):?>
        <div><p>Такого штрихкода несуществует</p></div>
        <?php endif;?>
        </thead>
    </table>
    <br>
</div>

<?php

include_once "html_footer.php"
?>