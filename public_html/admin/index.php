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

    $_SESSION['urlpage'] = "<a href='index.php' >Главная</a>";
  
    require '../db_connect.php';
?>

<!DOCTYPE html>
<!--   -->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/reset.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="images/admin.png" rel="shortcut icon"  type="image/x-icon">
        <title>Панель управления</title>
    </head>
    <body>
        <div id="block-body">
            <?php
                require 'include/block-header.php';
                require 'include/block-menu.php';
            ?>
            <div id="block-content">
                <div id="block-parameters">
                    <p id="title-page">Общая информация</p>
                </div>                                       
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
