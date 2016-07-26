<?php
    defined('myeshop') or header("Location: http://afanasov.net16.net/forbidden.php");

    $db_host		= 'mysql11.000webhost.com';
    $db_user		= 'a7116429_portfol';
    $db_pass		= '167-39xv';
    $db_database        = 'a7116429_portfol'; 

    $link = mysql_connect($db_host,$db_user,$db_pass);

    mysql_select_db($db_database,$link) or die("Нет соединения с БД ".mysql_error());
    mysql_query("SET names utf8");
?> 