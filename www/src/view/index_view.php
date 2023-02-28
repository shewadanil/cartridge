<?php
include_once "html_header.php";

?>




    <div>
        <a href="login"><button>Войти</button></a>

    </div>
    <button type="submit"><a href="form-php/exit.php">Выйти</a></button>
    <div><a href="view/form.php">Добавить операцию</a></div>

<div>
    <form action="" method="post">
        <input type="text" name="barcode" id="barcode" placeholder="Штрихкод"> <br>
        <button type="submit">Отправить</button>

    </form>
</div>


<div >
    <table border="1" >
        <thead>
        <tr>

            <th width="200px">Штрихкод</th>
            <th width="200px">Модель</th>
        </tr>

    </table>
    <br>
    <table width="500" border="1" >
        <thead >
        <tr>
            <th>Дата</th>
            <th>Услуга</th>
            <th>Цена</th>
        </tr>
        </thead>

    </table>
</div>

<?php
include_once "html_footer.php"
?>