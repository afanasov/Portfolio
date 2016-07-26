<?php
    session_start();
    if ($_SESSION['auth_admin'] == "yes_auth")
    {
	define('myeshop', true);       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

    $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> / <a href='add_administrators.php' >Добавление администратора</a>";
    
    require '../db_connect.php';
    require "functions/functions.php";

    if ($_POST["submit_add"])
    {
        $error = array();    
        if ($_POST["admin_login"])
        {
            $login = clear_string($_POST["admin_login"]);
            $query = mysql_query("SELECT login FROM reg_admin WHERE login='$login'",$link);
 
            If (mysql_num_rows($query) > 0)
            {
                $error[] = "Логин занят!";
            }                
        }else
        {
            $error[] = "Укажите логин!";
        }
         
        if (!$_POST["admin_pass"]) $error[] = "Укажите пароль!";
        if (!$_POST["admin_name"]) $error[] = "Укажите ФИО!";
        if (!$_POST["admin_role"]) $error[] = "Укажите должность!";        

        if (count($error))
        {
           $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
        }else
        {
            $pass   = md5(clear_string($_POST["admin_pass"]));
            $pass   = strrev($pass);
            $pass   = strtolower($pass);
        
            $login = clear_string($_POST["admin_login"]);
            $name = clear_string($_POST["admin_name"]);
            $role = clear_string($_POST["admin_role"]);

    
            mysql_query("INSERT INTO `a7116429_portfol`.`reg_admin` (`id`, `login`, `pass`, `name`, `role`) "
                                                         . "VALUES (NULL, '$login', '$pass', '$name', '$role')",$link);                  
          $_SESSION['message'] = "<p id='form-success'>Пользователь успешно добавлен!</p>";
        }       
    }  
?>

<!DOCTYPE html>
<!--   -->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="images/admin.png" rel="shortcut icon"  type="image/x-icon">              
        <title>Панель управления - Добавления администратора</title>
    </head>
    <body>
        <div id="block-body">
            <?php
                require 'include/block-header.php';
                require 'include/block-menu.php';                
            ?>
            <div id="block-content">
                <div id="block-parameters">
                    <p id="title-page">Добавления администратора</p>
                </div>
                <?php
                if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
                if(isset($_SESSION['message']))
                {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }                
                ?>
                 <!-- Конец формы добавления  -->               
                <form method="POST" id="form-info" >
                    <ul id="info-admin">
                        <li><label>Логин</label><input type="text" name="admin_login" /></li>
                        <li><label>Пароль</label><input type="password" name="admin_pass" /></li>
                        <li><label>Имя</label><input type="text" name="admin_name" /></li>
                        <li><label>Должность</label><input type="text" name="admin_role" /></li>                        
                    </ul>                    
                    <p align="right"><input type="submit" id="submit_form" name="submit_add" value="Добавить"/></p>
                </form>
                
                <!-- Конец формы добавления  -->
                
            </div>
        </div>
    </body>
</html>
<?php 
}  else {
    header("Location: login.php");
    mysql_close();
}    
?>


