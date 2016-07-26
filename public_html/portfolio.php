<?php 
    define('myeshop', true); 
    require 'db_connect.php';    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Портфолио Афанасов Артём - Портфолио</title> 
		<meta name="description" content="" />
		<meta name="author" content="Austin" />
		<!--Grab the Stylesheets-->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/flexslider.css" rel="stylesheet" type="text/css">
                <link href="css/pstrnav.css" rel="stylesheet" type="text/css">
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie-style.css" />
<![endif]-->		
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
	</head>
	<body>
		<div class="container">
		<?php require 'include/header.php'; ?>
	     	<div class="sixteen columns">
		      	<div class="h-border">
					<div class="heading">
						<h1>Мои работы</h1>
					</div><!--Close "Heading" Div-->
				</div><!--Close H-border Div-->
			</div>
			<section class="latest-work row">                            
                            <?php
                                $num = 6;
                                $page = strip_tags($_GET['page']);              
                                $page = mysql_real_escape_string($page);

                                $count = mysql_query("SELECT COUNT(*) FROM portfolio",$link) or die(mysql_error($link));
                                $temp = mysql_fetch_array($count);
                                $post = $temp[0];
                                // Находим общее число страниц
                                $total = (($post - 1) / $num) + 1;
                                $total =  intval($total);
                                // Определяем начало сообщений для текущей страницы
                                $page = intval($page);
                                // Если значение $page меньше единицы или отрицательно
                                // переходим на первую страницу
                                // А если слишком большое, то переходим на последнюю
                                if(empty($page) or $page < 0) $page = 1;
                                if($page > $total) $page = $total;
                                // Вычисляем начиная с какого номера
                                // следует выводить сообщения
                                $start = $page * $num - $num;

                                if ($temp[0] > 0)   
                                { 
                                    $query = mysql_query("SELECT `id`,`title`,`mini_description`,`img`,`description`,`platform`,`style` FROM portfolio ORDER BY id DESC LIMIT $start, $num",$link) or die(mysql_error($link));

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
                                                $max_width = 300; 
                                                $max_height = 305; 
                                                list($width, $height) = getimagesize($img_path); 
                                                $ratioh = $max_height/$height; 
                                                $ratiow = $max_width/$width; 
                                                $ratio = min($ratioh, $ratiow); 
                                                $width = intval($ratio*$width); 
                                                $height = intval($ratio*$height);    
                                            }else
                                            { 
                                            $img_path = "/img/no-image.png";
                                            $width = 300;
                                            $height = 305;
                                            }
                                            echo '                                        
                                                <div class="one-third column thumbnail">
                                                    <a href="view-portfolio.php?id='.$row["id"].'">
                                                        <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"alt="Thumb" />

                                                        <div class="details">
                                                            <h2><strong>'.$row["title"].'</strong></h2>
                                                            <p>'.$row["mini_description"].'</p>
                                                            <p>Построен на : <strong>'.$row["platform"].'</strong></p>
                                                            <p>Подход : <strong>'.$row["style"].'</strong></p>
                                                        </div><!--Close Details Div-->
                                                    </a>				
                                                </div><!--Close Thumbnail Div-->
                                            ';        
                                        } while ($row = mysql_fetch_array($query));
                                    }
                                }
                                echo '<div>';
                                if ($page != 1) $pervpage = '<li><a class="pstr-prev" href="portfolio.php?page='. ($page - 1) .'" />&larr;</a></li>';
                                if ($page != $total) $nextpage = '<li><a class="pstr-next" href="portfolio.php?page='. ($page + 1) .'"/>&rarr;</a></li>';

                                // Находим две ближайшие станицы с обоих краев, если они есть
                                if($page - 5 > 0) $page5left = '<li><a href="portfolio.php?page='. ($page - 5) .'">'. ($page - 5) .'</a></li>';
                                if($page - 4 > 0) $page4left = '<li><a href="portfolio.php?page='. ($page - 4) .'">'. ($page - 4) .'</a></li>';
                                if($page - 3 > 0) $page3left = '<li><a href="portfolio.php?page='. ($page - 3) .'">'. ($page - 3) .'</a></li>';
                                if($page - 2 > 0) $page2left = '<li><a href="portfolio.php?page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';
                                if($page - 1 > 0) $page1left = '<li><a href="portfolio.php?page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';

                                if($page + 5 <= $total) $page5right = '<li><a href="portfolio.php?page='. ($page + 5) .'">'. ($page + 5) .'</a></li>';
                                if($page + 4 <= $total) $page4right = '<li><a href="portfolio.php?page='. ($page + 4) .'">'. ($page + 4) .'</a></li>';
                                if($page + 3 <= $total) $page3right = '<li><a href="portfolio.php?page='. ($page + 3) .'">'. ($page + 3) .'</a></li>';
                                if($page + 2 <= $total) $page2right = '<li><a href="portfolio.php?page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';
                                if($page + 1 <= $total) $page1right = '<li><a href="portfolio.php?page='. ($page + 1) .'">'. ($page + 1) .'</a></li>';

                                if ($page+5 < $total)
                                {
                                    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="portfolio.php?page='.$total.'">'.$total.'</a></li>';
                                }else
                                {
                                    $strtotal = ""; 
                                }

                                if ($total > 1)
                                {
                                    echo '
                                        <center>
                                            <div class="pstrnav">
                                                <ul>
                                        ';
                                        echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='portfolio.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$nextpage;
                                        echo '
                                                </ul>
                                            </div>
                                        </center>    
                                    ';
                                }
                            ?>                                      
			</section>			
                    <?php require 'include/footer.php'; ?>
		</div><!--Close Container Div-->
		
		<!--Grab JS Files-->
		<script type="text/javascript" src="js/jquery.js" ></script>
		<script type="text/javascript" src="js/jquery.flexslider.js" ></script>
		<script type="text/javascript">
			// Can also be used with $(document).ready()
			$(window).load(function() {
			  $('.flexslider').flexslider({
			    animation: "slide"
			  });
			});
		</script>
	</body>
</html>
<?php mysql_close();?>
