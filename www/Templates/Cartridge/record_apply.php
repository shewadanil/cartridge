<?php
include_once __DIR__ . "/../html_header.php";
?>
<div class="container">
    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">На Главную</a>
    <?php if($check === "true"):?>
    <p class="">Операция проведена успешно</p>
    <?php else:?>
    <p>Что-то пошло не так</p>
    <?php endif;?>
    <?php if($cartridge != null):?>
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

            <?php endif;?>
            <?php if(!empty($user) && $user->getRole() === 'admin') :?>
                <th>
                    <form action="/edit_cartridge?id=<?php echo $cartridge->getId()?>" method="post">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </form>
                </th>
                <th>
                    <form action="/delete_cartridge?id=<?php echo $cartridge->getId()?>" method="post">
                        <button type="submit" class="btn btn-danger" >Удалить</button>
                    </form>
                </th>
            <?php endif;?>
                    </tr>
            <?php if (isset($check) === true && isset($cartridge) === false):?>
                <div><p>Такой записи нет</p></div>
            <?php endif;?>
            </thead>
        </table>
        <br>
    </div>
    <?php endif;?>
</div>
<?php
include_once __DIR__ . "/../html_footer.php"
?>
