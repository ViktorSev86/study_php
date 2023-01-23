<?php 
    //Чтобы русский текст правильно отображался
    error_reporting(-1);
    header('Content-Type: text/html; charset=utf-8');
    mysql_set_charset('utf8');

    session_start();
    echo "Вы успешно отправили сообщение на email ".$_SESSION["to"];
   
?>