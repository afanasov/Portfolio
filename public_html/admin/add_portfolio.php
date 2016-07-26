<?php
session_start();
    //ini_set('display_errors',1);
    //error_reporting(E_ALL);
    if ($_SESSION['auth_admin'] == "yes_auth")
    {   
	define('myeshop', true);       
       if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }
    $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> / <a href='portfolio.php' >Портфолио</a> / <a>Добовить</a>";    
    require "../db_connect.php";
    require "functions/functions.php";
    
    if ($_POST["submit_add"])
    {   
        $error = array();    
        // Проверка полей      
        if (!$_POST["title"]) $error[] = "Укажите название сайта!";              
        if (!$_POST["link"]) $error[] = "Укажите адрес сайта!";    
        if (!$_POST["platform"]) $error[] = "Укажите двигатель сайта!";           
        if (!$_POST["style"]) $error[] = "Укажите подход!";         
        if (!$_POST["mini_description"]) $error[] = "Укажите краткое описание сайта!";                 
        if (!$_POST["description"]) $error[] = "Укажите описание сайта!";                    

        $title = clear_string($_POST["title"]);
        $link_p = clear_string($_POST["link"]);
        $mini_description = clear_string($_POST["mini_description"]);
        $description = clear_string($_POST["description"]);
        $platform = clear_string($_POST["platform"]);
        $style = clear_string($_POST["style"]);
                        
        if (count($error))
        {           
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";            
        }else
        {                           
            mysql_query("INSERT INTO `a7116429_portfol`.`portfolio` (`id`, `title`, `link`, `mini_description`, `img`, `description`, `date`, `time`, `platform`, `style`) VALUES (NULL, '$title', '$link_p', '$mini_description', '', '$description', NOW(), NOW(), '$platform', '$style');",$link) or die(mysql_error($link)); 
                  
            $_SESSION['message'] = "<p id='form-success'>Товар успешно добавлен!</p>";
                
            $id = mysql_insert_id();                 
            if (empty($_POST["upload_image"]))
            {   
                require 'api/upload-image.php';
                unset($_POST["upload_image"]);           
            }                       
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
        <title>Панель управления - Добавить товар</title>
    </head>
    <body>
        <div id="block-body">
            <?php
                require 'include/block-header.php';
                require 'include/block-menu.php';
            ?>
            <div id="block-content">
                <div id="block-parameters">                
                    <p id="title-page">Добавление сайта</p>                
                </div>
                    <!-- конец блока параметр   -->
                    <?php
                        if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

                        if(isset($_SESSION['message']))
                        {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
        
                        if(isset($_SESSION['answer']))
                        {
                            echo $_SESSION['answer'];
                            unset($_SESSION['answer']);
                        }    
                    ?>
               <form enctype="multipart/form-data" method="POST">
                    <ul id="edit-tovar">
                        <li>
                            <label>Название сайта</label>
                            <input type="text" name="title" />
                        </li>
                        <li>
                            <label>Адрес сайта</label>
                            <input type="text" name="link"  />
                        </li>
                        <li>
                            <label>Двигатель сайта</label>
                            <input type="text" name="platform"  />
                        </li>
                        <li>
                            <label>Подход</label>
                            <input type="text" name="style"  />
                        </li>
                        <li>
                            <label>Краткое описание</label>
                            <textarea name="mini_description"></textarea>
                        </li>
                        <li>
                            <label>Описание</label>
                            <textarea name="description"></textarea>
                        </li>
                    </ul>    
                    <label class="stylelabel" >Основная картинка</label>
                    <div id="baseimg-upload">
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                        <input type="file" name="upload_image" />
                    </div>
                    
                    
                    <p align="right" ><input type="submit" id="submit_form" name="submit_add" value="Добавить"/></p>                        
                </form> 
            </div>
            <!-- конец блока контент   -->
        </div>
    </body>
</html>
<?php 
}  
else 
{
    header("Location: login.php");
    mysql_close();
}    
?>




