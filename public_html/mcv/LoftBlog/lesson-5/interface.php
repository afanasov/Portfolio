<!DOCTYPE html>
<!--
Интерфейсы

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            class Car{
                public function startEngine() {
                    echo 'Запустить двигатель<br />';
                }

                final public function stopEngine(){
                    echo 'Двигатель заглох<br />';
                }
        }
     
            class MegaCar extends Car{
                public function stopEngine(){
                    echo 'мотор сломался';
                }
            
            }
            $car = new MegaCar();
            $car->startEngine();
            $car->stopEngine();
        ?>


    </body>
</html>






