<?php
include_once "html_header.php";
?>
<div class="d-flex align-items-center py-4">
<div class="container form-signin  m-auto">
    <?php if(!empty($error)):?>
        <div> <?=$error?></div>
    <?php endif?>
    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="/">На Главную</a>
    <form action="" method="post">
        <div class="form-floating">
            <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
            <label for="floatingInput">Логин</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
            <label for="floatingPassword">Пароль</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Войти</button>
    </form>
</div>
</div>
<?php
include_once "html_footer.php"
?>
