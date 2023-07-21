<?php
include_once "html_header.php";
?>
<footer class="footer, container-fluid" >
    <div class="container-">
        <?php if(empty($user)) :?>
            <a href="login"><button>Войти</button></a>
        <?php else:?>
            <p>Привет, <?php echo $user->getName()?></p>
            <a href="exit"><button type="submit">Выйти</button></a>
        <?php endif;?>
    </div>
</footer>
<div class="container-fluid">
    <div>
        <?php if(!empty($user) && $user->getRole() === 'admin') :?>
        <a href="new_record">Добавить операцию</a>
        <?php endif;?>
    </div>

<div>
    <form action="" method="post">
        <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
        <button type="submit">Отправить</button>
    </form>
</div>


    <div class="table-responsive-lg">
        <table class="table table-bordered " >
            <thead>
            <tr>
                <th scope="col">Штрихкод</th>
                <th scope="col">Модель</th>
                <th scope="col">Дата</th>
                <th scope="col">Услуга</th>
                <th scope="col">Цена</th>
            </tr>
            <?php if (isset($results) === true):?>
            <?php foreach ($results as $result):?>
            <tr>
                <th ><?php echo $result->getBarcode()?></th>
                <td ><?php echo $result->getModel()?></td>
                <td ><?php echo $result->getDate()?></td>
                <td ><?php echo $result->getService()?></td>
                <td ><?php echo $result->getPrice()?></td>
        <?php if(!empty($user) && $user->getRole() === 'admin') :?>
                <th>
                    <form action="edit_cartridge?id=<?php echo $result->getId()?>" method="post">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </form>
                </th>
                <th>
                    <form action="delete_cartridge?id=<?php echo $result->getId()?>" method="post">
                        <button type="submit" class="btn btn-danger" >Удалить</button>
                    </form>
                </th>

        <?php endif;?>
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
</div>

<?php
include_once "html_footer.php"
?>