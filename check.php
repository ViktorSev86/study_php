<?php
    Error_Reporting(E_ALL & ~E_NOTICE);
    header('Content-Type: text/html; charset=utf-8');
    mysql_set_charset('utf8');
    if($_POST["name"] == "") {
        echo "Введите имя <a href='/'>Исправить</a>";
    } else {
        header("Location:index.php");
    }
?>