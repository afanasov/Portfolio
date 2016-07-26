<?php
    define('myeshop', true);
    require 'db_connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Портфолио Афанасов Артём - Главная</title>
		<meta name="description" content="" />
		<meta name="author" content="Austin" />
		<!--Grab the Stylesheets-->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/flexslider.css" rel="stylesheet" type="text/css">
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie-style.css" />
<![endif]-->		
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
	</head>
	<body>
		<div class="container">
                <?php require 'include/header.php'; ?>
	      	<section class="sixteen columns feature">
		        <div class="flexslider">
		          <ul class="slides">
		            	<li>
		  	    	    <img src="img/feature-1.png" alt="Featured">
		  	    		</li>
		  	    		<li>
		  	    	    <img src="img/feature-2.png" alt="Featured">
		  	    		</li>
		          </ul>
		        </div><!--Close Flexslider Div-->
	     	</section>
	     	<div class="sixteen columns">
		      	<div class="h-border">
					<div class="heading">
						<h1>Последние работы</h1>
					</div><!--Close "Heading" Div-->
				</div><!--Close H-border Div-->
			</div>
			<?php require 'include/random.php'; ?>
			<div class="sixteen columns row">
		      	<div class="h-border">
					<div class="heading">
						<h2>Кто я ?</h2>                                                
					</div><!--Close "Heading" Div-->
				</div><!--Close H-border Div-->
				<div class="focused-text">
					Я - Web, PHP разработчик.<br/>
                                        <p>Чем я занимаюсь ?</p>
				</div><!--Close Focused-text Div-->
			</div>
			<div class="row">
				<div class="eight columns center">
					<div class="h-border">
						<div class="heading">
							<h2>Верстка web страниц</h2>
						</div><!--Close "Heading" Div-->
					</div><!--Close H-border Div-->
					<img src="img/icon-1.png" alt="Icon 1">
					<p class="focused-text"></p>
				</div>
				<div class="eight columns center">
					<div class="h-border">
						<div class="heading">
							<h2>Software разработка</h2>
						</div><!--Close "Heading" Div-->
					</div><!--Close H-border Div-->
					<img src="img/icon-2.png" alt="Icon 2">
					<p class="focused-text"></p>
				</div>
			</div>
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
