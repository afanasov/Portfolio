<?php 
    define('myeshop', true);    
    require 'db_connect.php';
    require 'functions/functions.php';
    
    $id = clear_string($_GET["id"]);
    $title = mysql_query("SELECT `title` FROM portfolio WHERE id = '$id'",$link)or die(mysql_error($link));
    If (mysql_num_rows($title) > 0)
    {
        $row_titile = mysql_fetch_array($title);
        $title_index = $row_titile['title'];
    }            
?>
<!DOCTYPE html>
<html lang="en">
	<head>
            <meta charset="utf-8" />
            <title>Портфолио Афанасов Артём - обзор <?php echo $title_index; ?></title>  
            <meta name="description" content="" />
            <meta name="author" content="Austin" />
            <!--Grab the Stylesheets-->
            <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
            <link href="css/style.css" rel="stylesheet" type="text/css">
            <link href="css/view.css" rel="stylesheet" type="text/css">
            <link href="css/flexslider.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width; initial-scale=1.0" />
            <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
	</head>
	<body>
		<div class="container">
                    <?php 
                        require 'include/header.php'; 
                        $query = mysql_query("SELECT * FROM portfolio WHERE id='$id' ORDER BY id DESC",$link)or die(mysql_error($link));

                            If (mysql_num_rows($query) > 0)
                            {
                                $row = mysql_fetch_array($query);
                                do
                                {
                                    // обрезка изображениия                   
                                    //проверякем пусто ли в $row["img"] и файл существует               
                                    if  ($row["img"] != "" && file_exists("uploads_images/".$row["img"]))
                                    {
                                        $img_path = 'uploads_images/'.$row["img"];
                                        $max_width = 350; 
                                        $max_height = 355; 
                                        list($width, $height) = getimagesize($img_path); 
                                        $ratioh = $max_height/$height; 
                                        $ratiow = $max_width/$width; 
                                        $ratio = min($ratioh, $ratiow); 
                                        $width = intval($ratio*$width); 
                                        $height = intval($ratio*$height);    
                                    }else
                                    { 
                                    $img_path = "/img/no-image.png";
                                    $width = 350;
                                    $height = 355;
                                    }
                                    $link = $row["link"];
                                    echo '
                                        <div class="sixteen columns post">
                                            <center><h1><strong>'.$row["title"].'</strong></h1></center>
                                            <p>Построен на : <strong>'.$row["platform"].'</strong></p>
                                            <p>Подход : <strong>'.$row["style"].'</strong></p>
                                            <p>Адрес сайта : <a href="'.$link.'">'.$link.'</a></p>
                                            <center><p><strong>'.$row["mini_description"].'</strong></p></center>
                                            <div id="img" style="float:left">
                                                <a href="'.$link.'">
                                                    <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'alt="Preview" />
                                                </a>                                            
                                            </div>
                                            <div id="content">
                                                <p>'.$row["description"].'</p>
                                            </div>   
                                            <div>
                                            <p align="right">Дата последнего изменения: <strong>'.$row["date"].'</strong></p>
                                            <p align="right">Время последнего изменения: <strong>'.$row["time"].'</strong></p>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    ';
                                } while ($row = mysql_fetch_array($query));
                            }                    
                    require 'include/footer.php'; ?>
		</div><!--Close Container Div-->
		<!--Grab JS Files-->
		<script type="text/javascript" src="js/jquery.js" ></script>
	</body>
</html>
<?php mysql_close();?>
