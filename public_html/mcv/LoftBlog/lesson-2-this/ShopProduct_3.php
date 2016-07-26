<!DOCTYPE html>
<!--
Метод конструктора 
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
                
                function __construct($title, $lastName, $firstName, $price) {
                    $this->title = $title;
                    $this->lastName = $lastName;
                    $this->firstName = $firstName;
                    $this->price = $price;
                    
                    echo $this->getAllView();
                }
                        
                
                function getAllView(){
                    return "Автор: {$this->firstName} {$this->lastName}<br />
                    Название: {$this->title}<br />
                    Цена: {$this->price}<hr />";
                }
                
                
            }
        
            $tovar1 = new ShopProduct("Мастер и Маргорита","Булгаков","Михаил",20);
            $tovar2 = new ShopProduct("Лаберинты Ехо","Фрай","Макс",45);

        ?>

    </body>
</html>






