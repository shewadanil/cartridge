<?php
include_once "html_header.php";
?>
<div class="py-3">
    <div class="container d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <?php if(!empty($user)) :?>
            <span class="fs-4">Привет <?php echo $user->getName()?></span>
        <?php else:?>
            <span class="fs-4">Привет гость</span>
        <?php endif;?>
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <?php if(!empty($user) && $user->getRole() === 'admin') :?>
                <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="new_record">Добавить операцию</a>
            <?php endif;?>
            <?php if(!empty($user)) :?>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="exit">Выйти</a>
            <?php endif;?>
            <?php if(empty($user)) :?>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="login">Войти</a>
            <?php endif;?>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="#"></a>
            <a class="py-2 link-body-emphasis text-decoration-none" href="#"></a>
        </nav>
    </div>
    <div class="container">
        <div class="">
            <form action="" method="post" class="d-flex flex-column align-items-center mb-4">
                <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
                <button class="btn btn-info rounded-pill px-3" type="submit">Отправить</button>
            </form>
        </div>
            <div class="container table-responsive">
            <table class="table table-bordered " >
                <?php if (!empty($results)):?>

                <thead>
                <tr class="active">
                    <th >Штрихкод</th>
                    <th >Модель</th>
                    <th >Дата</th>
                    <th >Услуга</th>
                    <th >Цена</th>
                </tr>
                <?php foreach ($results as $result):?>
                <tr>
                    <td ><?php echo $result->getBarcode()?></td>
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
</div>
<?php
include_once "html_footer.php"
?>