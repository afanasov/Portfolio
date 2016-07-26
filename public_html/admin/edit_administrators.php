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

    $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> / <a>Редактор профиля </a>";
    
    require '../db_connect.php';
    require "functions/functions.php";
    $id = clear_string($_GET["id"]);
    
   
    
    if ($_POST["submit_edit"])
    {
        $error = array();    
        if (!$_POST["admin_login"]) $error[] = "Укажите логин!";
        if ($_POST["admin_pass"])
        {
            $pass   = md5(clear_string($_POST["admin_pass"]));
            $pass   = strrev($pass);
            $pass   = "pass='".strtolower($pass)."',";      
        }
        if (!$_POST["admin_name"]) $error[] = "Укажите Имя!";
        if (!$_POST["admin_role"]) $error[] = "Укажите должность!";
        if (count($error))
        {
           $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
        }else
        {    
            $querynew = "login='{$_POST["admin_login"]}',$pass name='{$_POST["admin_name"]}',role='{$_POST["admin_role"]}'"; 
            $update = mysql_query("UPDATE reg_admin SET $querynew WHERE id = '$id'",$link) or die(mysql_error($link)); 
            $_SESSION['message'] = "<p id='form-success'>Данные успешно изменены!</p>";
        }   
    }
    $title = mysql_query("SELECT `name` FROM reg_admin WHERE id = '$id'",$link)or die(mysql_error($link));
    If (mysql_num_rows($title) > 0)
    {
        $row_titile = mysql_fetch_array($title);
        
        $title_index = $row_titile['name'];
    }
?>

<!DOCTYPE html>
<!-- 18-0000000018  -->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="images/admin.png" rel="shortcut icon"  type="image/x-icon">
        <title>Панель управления - Редактор профиля администратора <?php echo $title_index;?></title>
    </head>
    <body>
        <div id="block-body">
            <?php
                require 'include/block-header.php';
                require 'include/block-menu.php';                
            ?>
            <div id="block-content">
                <div id="block-parameters">
                    <p id="title-page">Редактор профиля администратора: <?php echo $title_index;?></p>
                </div>
                <?php
                if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
                if(isset($_SESSION['message']))
                {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }  
                
                $result = mysql_query("SELECT * FROM reg_admin WHERE id='$id'",$link) or die(mysql_error($link)); 
                If (mysql_num_rows($result) > 0)
                {
                    $row = mysql_fetch_array($result);
                    do
                    {                       
                        echo '
                            <!-- Конец формы добавления  -->               
                            <form method="POST" id="form-info" >
                                <ul id="info-admin">
                                    <li><label>Логин</label><input type="text" name="admin_login" value="'.$row["login"].'" /></li>
                                    <li><label>Пароль</label><input type="password" name="admin_pass" /></li>
                                    <li><label>Имя</label><input type="text" name="admin_name" value="'.$row["name"].'" /></li>
                                    <li><label>Должность</label><input type="text" name="admin_role" value="'.$row["role"].'" /></li>                                    
                               </ul>                                                         
                               <p align="right"><input type="submit" id="submit_form" name="submit_edit" value="Сохранить"/></p>
                           </form>
                        ';

                    }
                    while($row = mysql_fetch_array($result));
                }    
                ?>
                
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



