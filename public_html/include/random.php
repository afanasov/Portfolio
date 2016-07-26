<?php 
    defined('myeshop') or header("Location: http://afanasov.net16.net/forbidden.php");                           
	
    $query_random = mysql_query("SELECT DISTINCT `id`,`title`,`mini_description`,`img`,`description`,`title`,`mini_description`,`img`,`description`,`platform`,`style` FROM portfolio ORDER by RAND() LIMIT 3",$link) or die(mysql_error($link));  
    If (mysql_num_rows($query_random) > 0)
    {
        $row = mysql_fetch_array($query_random);
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
         } while ($row = mysql_fetch_array($query_random));
    }
?>