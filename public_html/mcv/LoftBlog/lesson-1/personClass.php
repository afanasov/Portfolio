<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

            class Person{
                public $name = "Эрик";
                public $age = 25;
                public $job = "web-developer";

                public function greeting(){
                    return "Hello, ".$this->name;
                }    
            }

            $eric = new Person();

            echo $eric->greeting();
        ?>

    </body>
</html>






