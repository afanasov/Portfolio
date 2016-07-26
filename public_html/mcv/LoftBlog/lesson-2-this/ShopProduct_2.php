<!DOCTYPE html>
<!--
вывод через функцию
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            class ShopProduct{
                public $title = "Како-то товар";
                public $lastName = "Фамилия";
                public $firstName = "Имя";
                public $price = 0;
                
                function getAllView(){
                    return "Автор: {$this->firstName} {$this->lastName}<br />
                    Название: {$this->title}<br />
                    Цена: {$this->price}<hr />";
                }
                
                
            }
        
            $tovar1 = new ShopProduct();
            $tovar1->title = "Мастер и маргорита";
            $tovar1->lastName = "Булгаков";
            $tovar1->firstName = "Михаил";
            $tovar1->price = 25;
            
            $tovar2 = new ShopProduct();
            $tovar2->title = "Лаберинты эхо";
            $tovar2->lastName = "Фрай";
            $tovar2->firstName = "Макс";
            $tovar2->price = 40;
            
            echo $tovar1->getAllView();
            echo $tovar2->getAllView();
        ?>

    </body>
</html>






