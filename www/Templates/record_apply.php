<?php
include_once "html_header.php";
?>
<div>
    <a href="/">На Главную</a>
    <?php if($check === "true"):?>
    <p>Операция проведена успешно</p>
    <?php else:?>
    <p>Что-то пошло не так</p>
    <?php endif;?>
</div>
<?php
include_once "html_footer.php"
?>
