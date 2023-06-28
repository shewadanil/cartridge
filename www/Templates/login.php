<?php
    /*require "../autoloader.php";
    $login = $req->post('login');
    $password = $req->post('password');
    include 'includ_db.php';
    $password = md5($password."adafaghha");

    $result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");

    if ($result->num_rows == 0){
        echo 'Пользователь не найден <br>';
        echo '<a href="../../index.php">На главную</a>';
        exit();

    }
    $user = $result->fetch_assoc();
    if($result->num_rows) {
        setcookie("user", $user['login'], time() + 3600, "/");
    }
    $mysql->close();
    header('Location: /');*/
?>
<?php
include_once "html_header.php";
?>
<div>
    <a href="/">На Главную</a>
    <form action="" method="post">
        <input type="text" name="login" id="login" placeholder="Логин"><br>
        <input type="text" name="password" id="password" placeholder="Пароль"><br>
        <button type="submit">Войти</button>
        <input type="hidden" name="check" id="check" value="<?php echo $check = true?>"><br>
    </form>
</div>
<?php
include_once "html_footer.php"
?>
