<?php 
    define('myeshop', true); 
    if (isset($_POST['download']))echo '111';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Портфолио Афанасов Артём - Резюме</title> 
		<meta name="description" content="" />
		<meta name="author" content="Austin" />
		<!--Grab the Stylesheets-->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/flexslider.css" rel="stylesheet" type="text/css">
                <link href="css/resume.css" rel="stylesheet" type="text/css">
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie-style.css" />
<![endif]-->		
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
	</head>
	<body>
		<div class="container">
		<?php require 'include/header.php'; ?>
	     	<div class="sixteen columns">
		    <div class="h-border">
		<div class="heading">
                    <h1>Резюме</h1>
		</div><!--Close "Heading" Div-->
                    </div><!--Close H-border Div-->
			</div>
			<section class="row contact">
                            <div class="sixteen columns">
                                <!-- Content Div-->
                                <div class="content" >  
                                    <p align="right">Скачать резюме в PDF  <a href="download/resume_junior_php_developer_Afanasov.PDF"><input type="button" name="download" value="Скачать"></a></p>                                    
                                    <p align="center" class="name"><strong>Профессиональные навыки:</strong><p>
                                    <div class="education">
                                        <p><strong>PHP5 - </strong>Основы синтаксиса PHP;<br /></p>
                                        <p><strong>Git - </strong>Система контроля версий Git; <a href="https://github.com/afanasov/">примеры на Git</a><br /></p>
                                        <p><strong>MySQL - </strong>Основы баз данных MySQL, взаимодействие PHP;<br /></p>
                                        <p><strong>.htaccess - </strong>Регулярные выражения, и основные дерективы .htaccess;<br /></p>
                                        <p><strong>Безопастность - </strong>Основы безопасности и оптимизации PHP;<br /></p>
                                        <p><strong>Работа с файлами - </strong>Работа с файлами ,включение файлов код, загрузка на сервер;<br /></p>
                                        <p><strong>ООП - </strong>Основы объектно-ориентированного подхода в PHP;<br /></p>
                                        <p><strong>MVC - </strong>Шаблоны проектирования MVC;<br /></p>
                                        <p><strong>Вертска - </strong>сновы Js, jQuery, HTML, CSS, AJAX;<br /></p>
                                        <p><strong>Двигатели и фреймверки </strong>Основы работы с Joomla, WP, Larovel<br /></p>                                       
                                    </div>                                  
                                    <p align="center" class="name"><strong>Образование:</strong></p>
                                    <div class="education">
                                        <p><strong>Название</strong>: Харьковский институт управления<br /></p>
                                        <p><strong>Период обучения</strong>: 2004-2009<br /></p>
                                        <p><strong>Факультет</strong>: Экономический факультет<br /></p>
                                        <p><strong>Специальность</strong>: Менеджмент организации<br /></p>
                                    </div>
                                    <p align="center" class="name"><strong>Дополнительное образование:</strong><p>
                                    <div class="education">
                                        <p><strong>Название</strong>: Ukrainian IT_School<br /></p>
                                        <p><strong>Период обучения</strong>: 01.2016-06.2016<br /></p>                                        
                                        <p><strong>Специальность</strong>: Основы Php программирования<br /></p>
                                    </div>
                                    <div class="education">
                                        <p><strong>Название</strong>: Телесенс Академия<br /></p>
                                        <p><strong>Период обучения</strong>: 09.2014-11.2014<br /></p>                                        
                                        <p><strong>Специальность</strong>: Основы тестирования ПО (QA)<br /></p>
                                    </div>                                    
                                    <p align="center" class="name"><strong>Опыт работы:</strong><p>
                                    <div class="education">
                                        <p><strong>Место работы</strong>: freelance<br /></p>
                                        <p><strong>Период работы</strong>: 2013-2016<br /></p>                                        
                                    </div>                                   
                                    <div class="education">
                                        <p><strong>Место работы</strong>: ООО «Торпал»<br /></p>
                                        <p><strong>Период работы</strong>: 2013<br /></p>                                        
                                        <p><strong>Специальность</strong>: Начальник отдела продаж<br /></p>
                                    </div>
                                    <div class="education">
                                        <p><strong>Место работы</strong>: ООО «ХПТС»<br /></p>
                                        <p><strong>Период работы</strong>: 2011-2013<br /></p>                                        
                                        <p><strong>Специальность</strong>: Начальник отдела продаж<br /></p>
                                    </div>
                                    <div class="education">
                                        <p><strong>Место работы</strong>: ООО «Компрессор интернешнл»<br /></p>
                                        <p><strong>Период работы</strong>: 2010-2011<br /></p>                                        
                                        <p><strong>Специальность</strong>: Региональный менеджер<br /></p>
                                    </div>
                                    <div class="education">
                                        <p><strong>Место работы</strong>: ООО «Триумф-В»<br /></p>
                                        <p><strong>Период работы</strong>: 2008-2010<br /></p>                                        
                                        <p><strong>Специальность</strong>: Менеджер по продажам<br /></p>
                                    </div>
                                    <div class="education">
                                        <p><strong>Место работы</strong>: ООО «ХПТС»<br /></p>
                                        <p><strong>Период работы</strong>: 2007-2008<br /></p>                                        
                                        <p><strong>Специальность</strong>: Менеджер по продажам<br /></p>
                                    </div>
                                </div>                                
                            </div>
                            <!--Close Content Div-->
			</section>	
			<div class="clear"></div>
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
