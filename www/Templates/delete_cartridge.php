<?php
include_once "html_header.php";
?>
<a href="/">На Главную</a>
<div>
    <?php if($result != null):?>
    <table border="2" >
        <thead>
        <tr>
            <th width="200px">Штрихкод</th>
            <th width="200px">Модель</th>
            <th>Дата</th>
            <th>Услуга</th>
            <th>Цена</th>
        </tr>
        <tr>
            <th width="200px"><?php echo $result->getBarcode()?></th>
            <th width="200px"><?php echo $result->getModel()?></th>
            <th width="200px"><?php echo $result->getDate()?></th>
            <th width="200px"><?php echo $result->getService()?></th>
            <th width="200px"><?php echo $result->getPrice()?></th>
            <input type="hidden" name="id" id="id" value="<?php echo $result->getId()?>">
        </tr>
        </thead>
    </table>
        <div>
            <p>Вы точно хотите удалить запись?</p>
            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $result->getId()?>"><br>
                <input type="hidden" name="check" id="check" value="<?php echo $check = true?>"><br>
                <button type="submit">Да</button>
            </form>
            <form action="/">
                <button type="submit">Нет</button>
            </form>

        </div>
    <?php else:?>
    <p>Такой записи нет</p>
    <?php endif;?>
</div>


<?php
include_once "html_footer.php"
?>
