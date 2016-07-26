<!DOCTYPE html>
<!--
Абстрактные и финальные классы
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            abstract class Car{
                public $true;
                public function startEngine(){
                    echo 'Двигатель завелся<br />';
                }
                abstract function stopEngine();
            }
            
            
            class MegaCar extends Car{
                public function stopEngine(){
                    echo 'Двигатель заглох<br />';
                }
            }
            $car = new MegaCar();
            $car->startEngine();
            $car->stopEngine();
        ?>


    </body>
</html>






