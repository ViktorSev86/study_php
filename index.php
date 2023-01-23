<?php

    //Чтобы русский текст правильно отображался
    error_reporting(-1);
    header('Content-Type: text/html; charset=utf-8');
    mysql_set_charset('utf8');

    /*
    //Проверочная печать массива отправки данных на сервер по нажатию кнопки Отправить
    if (isset($_POST["send"])) {
        print_r($_POST);
    }
    */

    //Обработка формы при нажатии кнопки Отправить
    session_start();
    if (isset($_POST["send"])) {
        $from = htmlspecialchars($_POST["from"]); //htmlspecialchars нужна, чтобы символы html воспринимались как текст и ничему не повредили
        $to = htmlspecialchars($_POST["to"]);
        $subject = htmlspecialchars($_POST["subject"]);
        $message = htmlspecialchars($_POST["message"]);

        $_SESSION["from"] = $from; //Записываем данные в сессию
        $_SESSION["to"] = $to;
        $_SESSION["subject"] = $subject;
        $_SESSION["message"] = $message;

        $error_from = "";
        $error_to = "";
        $error_subject = "";
        $error_message = "";
        $error = false;

        if ($from == "" || !preg_match("/@/", $from)) {
            $error_from = "Введите корректный email";
            $error = true;
        }
        if ($to == "" || !preg_match("/@/", $to)) {
            $error_to = "Введите корректный email";
            $error = true;
        }
        if (strlen($subject) == 0) {
            $error_subject = "Введите тему сообщения";
            $error = true;
        }
        if (strlen($message) == 0) {
            $error_message = "Введите сообщение";
            $error = true;
        }

        if (!$error) {
            $subject = "=?utf-8?B?".base64_encode($subject)."?=";
            $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=utf-8\r\n"; //Заголовки
            mail($to, $subject, $message, $headers); //Отправка сообщения
            header("Location: success.php");
            exit;
        }

    }
            
?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>Обратная связь</title>
        
        
    </head>
    <body>
        <h2>Форма обратной связи</h2>
        <form name="feedback" action="" method="post">
            <label>От кого:</label> <br />
            <input type="text" name="from">
            <span style="color:red"><?=$error_from?></span> <br />
            <label>Кому:</label> <br />
            <input type="text" name="to">
            <span style="color:red"><?=$error_to?></span> <br />
            <label>Тема:</label> <br />
            <input type="text" name="subject"> 
            <span style="color:red"><?=$error_subject?></span> <br />
            <label>Сообщение:</label> <br />
            <textarea name="message" cols="30" rows="10"></textarea> 
            <span style="color:red"><?=$error_message?></span> <br />
            <input type="submit" name="send" value="Отправить">
        </form>

        
    </body>
</html>



<?php
    //header ("Location: http://google.com/"); //Переход на другой сайт
    //header ("Location: abc.html"); //Переход на другую страницу
    //exit; //Остановить выполнение текущей страницы после перехода на другую

    /*
    //Чтобы русский текст правильно отображался
    error_reporting(-1);
    header('Content-Type: text/html; charset=utf-8');
    mysql_set_charset('utf8');
    */
    
    /*
    //Куки (хранятся в браузере)
    Error_Reporting(E_ALL & ~E_NOTICE); //Снизить уровень проверки ошибок
    setcookie("n", 30, time() + 7); //Время жизни куки 7 секунд
    echo $_COOKIE["n"];
    */

    /*
    //Сессии (хранятся на сервере, надёжнее чем куки, но максимальное время жизни 15 минут)
    session_start();
    $num = (isset ($_SESSION["num"])) ? $_SESSION["num"] : 0;
    $num++;
    $_SESSION["num"] = $num;
    echo "Пользователь обновил страницу $num раз";
    //session_destroy(); //Удалить сессию
    */

    /*
    //Загрузка элементов страницы из других файлов
    $start = microtime(true);
    $title="Главная страница";
    require "header.php";
    echo "Тело документа";
    include_once "footer.php";
    include_once "forms.php";
    */
    

    /*
    //Отправка сообщения на email, отображается в папке C:\WebServers\tmp\!sendmail
    $message = "Это самое простое сообщение в мире!";
    $to = "butioxa_86@mail.ru";
    $from = "gosha@mail.ru";
    $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";
    $subject = "Тема сообщения";
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    mail($to, $subject, $message, $headers);
    */

    //phpinfo();//Выводит информацию о PHP

    /*
    file_put_contents("c.txt", "TEST test Test");
    echo file_get_contents("c.txt")."<br/>";
    echo file_exists("d.txt")."<br/>";
    echo file_exists("a.txt")."<br/>";
    echo filesize("a.txt")."<br/>";
    rename("c.txt", "b.txt");

    echo __FILE__."<br/>";
    echo fileperms(__FILE__)."<br/>"; //Права доступа в Linux/Unix
    chmod(__FILE__, 0777); //Изменение прав доступа не работает в Windows и Mac
    echo fileperms(__FILE__)."<br/>";
    */

    /*
    //$file = fopen("a.txt", "w+t"); //Creating file
    //fwrite($file, "Example\nText\nNext");
    //fclose($file);

    $file = fopen("a.txt", "r+t");
    while (!feof($file)) {
        echo fread($file, 2)."<br />";
    }

    fseek($file, 0); //kursor
    echo fread($file, 1);

    fclose($file);
    */


    /*echo microtime(true)."<br/>";
    echo time()."<br/>";
    echo "Время работы скрипта: ".(microtime(true) - $start)." сек.";
    echo date("Y-m-d H:i:s");
    echo date("Y-m-d H:i:s", 245345345451);

    $time = mktime(12, 35, 23, 12, 7, 2007);
    echo date("Y-m-d H:i:s", $time);

    $array = getdate($time);
    print_r ($array);
    */

        /*
    $x = 15;
    if (isset($x)) {
        echo "Переменная существует<br />";
    } else {
        echo "Переменная не существует";
    }
    unset($x);
    if (isset($x)) {
        echo "Переменная существует";
    } else {
        echo "Переменная не существует";
    }
    */
?>



