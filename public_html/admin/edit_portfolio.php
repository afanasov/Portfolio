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

        $_SESSION['urlpage'] = "<a href='index.php' >Главная</a> / <a href='portfolio.php' >Портфолио</a> / <a href='#' >Редактор</a>";    
        require "../db_connect.php";
        require "functions/functions.php";

        //Принимаем из GET
        $id = clear_string($_GET["id"]);
        
        //Измен. товара
        if ($_POST["submit_save"])
        {
            $error = array(); 
            if (!$_POST["title"]) $error[] = "Укажите название сайта!";
            if (!$_POST["link"]) $error[] = "Укажите адрес сайта!";
            if (!$_POST["platform"]) $error[] = "Укажите на каком двигателе построен сайт!";
            if (!$_POST["style"]) $error[] = "Укажите подход!";  
            if (!$_POST["mini_description"]) $error[] = "Укажите мини описание!";
            if (!$_POST["description"]) $error[] = "Укажите описание!";
        
                        
            if (empty($_POST["upload_image"]))
            {   
                require 'api/upload-image.php';
                unset($_POST["upload_image"]);           
            }       

            if (count($error))
            {           
                $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";            
            }else
            {           
                $querynew = "title='{$_POST["title"]}',link='{$_POST["link"]}',mini_description='{$_POST["mini_description"]}',description='{$_POST["description"]}',date=NOW(),time=NOW(),platform='{$_POST["platform"]}',style='{$_POST["style"]}'";                   
                $update = mysql_query("UPDATE portfolio SET $querynew WHERE id = '$id'",$link) or die(mysql_error($link));

                $_SESSION['message'] = "<p id='form-success'>Товар успешно изменен!</p>";   
            }    
        }
        //Принимаем из GET
        $action = clear_string($_GET["action"]);
        //Свич удаления
        if (isset($action))
        {
            switch ($action) 
            {
                case 'delete':
                    if (file_exists("../uploads_images/".$_GET["img"]))
                    {
                        unlink("../uploads_images/".$_GET["img"]);                            
                        mysql_query("UPDATE  `a7116429_portfol`.`portfolio` SET  `img` =  '' WHERE id = '$id'",$link) or die(mysql_error($link));
                    }
                break;	
            }
        }    
        $title = mysql_query("SELECT `title` FROM portfolio WHERE id = '$id'",$link)or die(mysql_error($link));
        If (mysql_num_rows($title) > 0)
        {
            $row_titile = mysql_fetch_array($title);
            $title_index = $row_titile['title'];
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
        <title>Панель управления - Редактор портфолио: <?php echo $title_index;?> </title>
    </head>
    <body>
        <div id="block-body">
            <?php
                require 'include/block-header.php';
                require 'include/block-menu.php';
            ?>
            <div id="block-content">
            <div id="block-parameters">
            <p id="title-page" >Редактирование портфолио: <?php echo $title_index;?></p>
            </div>
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

	$result = mysql_query("SELECT * FROM portfolio WHERE id='$id'",$link) or die(mysql_error($link));
    
        If (mysql_num_rows($result) > 0)
        {
            $row = mysql_fetch_array($result);
            do
            {    
                echo '
                    <form enctype="multipart/form-data" method="POST">
                        <ul id="edit-tovar">
                            <li>
                                <label>Название сайта</label>
                                <input type="text" name="title" value="'.$row["title"].'" />
                            </li>
                            <li>
                                <label>Адрес сайта</label>
                                <input type="text" name="link" value="'.$row["link"].'"  />
                            </li>
                            <li>
                                <label>Двигатель сайта</label>
                                <input type="text" name="platform" value="'.$row["platform"].'"  />
                            </li>
                            <li>
                                <label>Подход</label>
                                <input type="text" name="style" value="'.$row["style"].'" />
                            </li>
                            <li>
                                <label>Краткое описание</label>
                                <textarea name="mini_description">'.$row["mini_description"].'</textarea>
                            </li>
                            <li>
                                <label>Описание</label>
                                <textarea name="description">'.$row["description"].'</textarea>
                            </li>
                ';        
                
                echo '
                    </ul> 
                ';
                if  (strlen($row["img"]) > 0 && file_exists("../uploads_images/".$row["img"]))
                {
                    $img_path = '../uploads_images/'.$row["img"];
                    $max_width = 210; 
                    $max_height = 310; 
                    list($width, $height) = getimagesize($img_path); 
                    $ratioh = $max_height/$height; 
                    $ratiow = $max_width/$width; 
                    $ratio = min($ratioh, $ratiow); 
                    // New dimensions 
                    $width = intval($ratio*$width); 
                    $height = intval($ratio*$height); 
                    echo '
                        <label class="stylelabel" >Основная картинка</label>
                        <div id="baseimg">
                            <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
                            <a href="edit_portfolio.php?id='.$row["id"].'&img='.$row["img"].'&action=delete" ><img src="images/action_delete.png"/></a>
                        </div>
                    ';   
                }else
                {  
                    echo '
                        <label class="stylelabel" >Основная картинка</label>

                        <div id="baseimg-upload">
                            <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                            <input type="file" name="upload_image" />
                        </div>
                    ';
                }
                echo '
                    <p id="edit_news_date" align="right">Дата последнего изменения / '.$row["date"].'</p>
                    <p id="edit_news_date" align="right">Время последнего изменения / '.$row["time"].'</p>
                ';
                echo ' 
                    
                    </ul> 
                    <p align="right" ><input type="submit" id="submit_form" name="submit_save" value="Сохранить"/></p>     
                    </form>
                ';
            }while ($row = mysql_fetch_array($result));
        }
    ?> 
</div>
        </div>
    </body>
</html>
<?php
    }else
    {
        header("Location: login.php");
        mysql_close();
    }
?>

