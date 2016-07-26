<?php 
    define('myeshop', true);  
    if ($_POST["submit"])
    {
        require 'api/mail.php';
    }        
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Портфолио Афанасов Артём - Контакты</title>
		<meta name="description" content="" />
		<meta name="author" content="Austin" />
		<!--Grab the Stylesheets-->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/flexslider.css" rel="stylesheet" type="text/css">
                <link href="css/contact.css" rel="stylesheet" type="text/css">
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
                            <h1>Свяжитесь со мной</h1>
			</div><!--Close "Heading" Div-->
                    </div><!--Close H-border Div-->
                </div>
                    <section class="row contact">                            
                        <div class="sixteen columns">
                            <?php
                                if(isset($_SESSION['message']))
                                {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }                                
                            ?>
                            <div class="contacts">
                                <img src="img/feedback.jpg"/>
                                <p><strong>Мобильный телефон </strong> +38-066-352-88-76<br /></p>
                                <p><strong>Skype </strong> afanasov.artem<br /></p> 
                                <p><strong>Email </strong> afanasov.artem@gmail.com<br /></p>
                                <p><strong>Портфолио </strong> <a href="http://afanasov.net16.net/"> http://afanasov.net16.net/</a><br /></p>
                                <p><strong>Я на GITHUB </strong> <a href="https://github.com/afanasov/"> https://github.com/afanasov/</a><br /></p>
                             </div>
                            <form class="clearfix" method="POST">
                                <input type="text" class="small-text" placeholder="Имя" name="name">
                                <input type="text" class="small-text" placeholder="Email" name="email">
                                <input type="text" class="small-text" placeholder="Тема" name="subject">
                                <textarea class="message" name="text" placeholder="Текст"></textarea>
                                <input type="submit" class="btn green" name="submit">
                            </form>				
                        </div>
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
