<!DOCTYPE html>
<!--
Инкапсуляция
public - свойство или метод oткрыт для доступа
private - свойство или метод закрыто для доступа(доступ только внутри исп. класса)
protected - свойство или метод закрыто для доступа(!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!)
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            class ShopProduct{
                private $title = "Како-то товар";
                private $price = 0;
                
                function __construct($title, $price) {
                    $this->title = $title;
                    $this->price = $price;
                                        
                }
                public function getPrice(){
                    return $this->price;
                }
            }
        
            class Saller{
                function sale(ShopProduct $product, $sale){
                    return $product->getPrice()-($product->getPrice()*$sale);
                }
            }
            $prouct = new ShopProduct("часы",100);
            $saller = new Saller();
            
            echo $saller->sale($prouct, 0.2);
            echo "<br />".$saller->sale($prouct, 0);
        ?>


    </body>
</html>






