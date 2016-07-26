<!DOCTYPE html>
<!--
Наследование

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            class ShopProduct{
                private $title;
                private $price;
                
                function __construct($title, $price) {
                    $this->title = $title;
                    $this->price = $price;                                        
                }
                
                public function getPrice(){
                    return $this->price;
                }
                public function getView(){
                    $result = $this->title."<br />".$this->price;
                    return $result;
                }
            }
            
            
            class DigitalProduct extends ShopProduct{
                public $type;
                public $size;
                
                public function __construct($title, $price, $type, $size) {
                    parent::__construct($title, $price);
                    $this->size = $size;
                    $this->type = $type;
                }
                public function getView() {
                    $result = parent::getView();
                    $result .="<br />".$this->type."<br />".$this->size;
                    return $result;
                }
            }
            
            $cd = new DigitalProduct("Metallica", 350, "cd",670);
            echo $cd->getView();
            
        ?>


    </body>
</html>






