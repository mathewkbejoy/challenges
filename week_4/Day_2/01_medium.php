<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <p>
        <?php
        /**
         * So we have our products, but what are we going to do with them.
         *
         * Let's create a cart that people can add products to. The cart should also be Describable.
         * Create a class called ShoppingCart that contains the following public methods.
         *
         * 1. provideDescription() - We are implmenting the Describably method after all.
         *     Come up with a good way to describe what is in your cart in this method.
         * 2. addProduct($product) - Add a product to the cart.
         *     Throw an exception if what we are adding to the cart is not of type Product
         * 3. removeOne($product) - Remove a single item that matches your product parameter.
         *     Throw an exception if your cart does not have any instances of that product in your cart
         * 4. removeAll($product) - Remove all instances of the product passed in.
         *     Throw an exception if your cart does not have any instances of that product in your cart.
         * 5. getTotalPrice() - Get the total price of all the contents in your cart.
         * 6. getAllProducts() - Get an array of all products that exist in your shopping cart.
         * 7. findProductByName($name) - Find the first instance of a product by the name passed in
         *     Throw an exception if a product is not found with that name.
         *
         * HINTS - You will be able to reuse some code in this challenge.  Think about it, removing all involves
         * removing one many times.  In your provideDescription method on your cart, you could (wink, wink) provide
         * each of your products to describe themselves.  It may also be useful to print how many items are in the cart or how much
         * the price of your total cart is.
         *
         * Perform the following tasks:
         *
         * 1. Create at least one Clothing Object and one Television Object.
         * 2. Create a shopping cart instance.
         * 3. Add the two products to the cart.
         * 4. Print out the description of the cart.
         * 5. Print out the total price of the cart.
         * 6. Remove the Clothing object from your cart.
         * 7. FInd the product in the cart with the name of your Television Object.
         * 8. Pass your ShoppingCart into the ItemDescriber outputDescription method from Exercise 4 and see
         * how it will also output the description of your cart, just like it did your individual products
         */
        ///////////////////////////
        // Put your code here!
        ///////////////////////////
        
        interface Describable{
          public function provideDescription();
        }
        
        abstract class Product implements Describable {
            protected $name;
            protected $brand;
            protected $price;
            
            function __construct($name,$brand,$price){
              $this->name = $name;
              $this->brand = $brand;
              $this->price = $price;
            }
            
            public function getName(){
              if(empty($this->name)){
                throw new Exception("Empty value found!");
              }else{
                return $this->name;
              }
            }
            
            public function getBrand(){
              if(empty($this->brand)){
                throw new Exception("Empty value found!");
              }else{
                return $this->brand;
              }
            }
            
            public function getPrice(){
              if(!empty($this->price)){
                if(is_numeric($this->price)) {
                  return $this->price;
                } else {
                  throw new Exception("Invalid price found!");
                }
              }else{
                
                throw new Exception("Empty value found!");
              }
            }
            
            abstract function provideDescriptionForProductType();
            
            public function provideDescription(){
              return  $this->provideDescriptionForProductType();
              
            }
        }
        
        class Clothing extends Product{
            protected $size;
            protected $color; 
            protected $gender;
            protected $type;
            
            function __construct($name, $brand, $price, $size, $color, $type, $gender){
              parent::__construct($name, $brand, $price);
              $this->size = $size;
              $this->color = $color;
              $this->gender = $gender;
              $this->type = $type;
            }
            
            public function getSize(){
              if(empty($this->size)){
                throw new Exception("Empty value found!");
              }else{
                return $this->size;
              }
            }
            
            public function getColor(){
              $allowedColors = array('Red', 'Blue', 'Green', 'Black', 'White', 'Yellow');
              if(!empty($this->color)){
                if(in_array($this->color, $allowedColors)){
                     return $this->color;
                }
                else{
                  throw new Exception("Invalid color");
                }
                
              }else{
                throw new Exception("Empty value found!");
              }
            }
            
            public function getGender(){
              if(empty($this->gender)){
                throw new Exception("Empty value found!");
              }else{
                return $this->gender;
              }
            }
            
            public function getType(){
              if(empty($this->type)){
                throw new Exception("Empty value found!");
              }else{
                return $this->type;
              }
            }
            
            public function provideDescriptionForProductType(){
              try{
                return "This is an article of clothing. It is a ".$this->getBrand(). $this->getColor(). $this->getGender().
                     $this->getType()." of size ".$this->getSize().". It costs ".$this->getPrice()."<br/>";
                
              }catch(Exception $e){
                echo $e->getMessage();
              }
            }
        }
        
        class Television extends Product{
          
            protected $displayType;
            protected $size;
            function __construct($name, $brand, $price, $displayType, $size){
              parent::__construct($name, $brand, $price);
              $this->displayType = $displayType;
              $this->size = $size;
            }
            
            public function getDisplayType(){
              if(empty($this->displayType)){
                throw new Exception("Empty value found!");
              }else{
                return $this->displayType;
              }
            }
            
            public function getSize(){
              if(empty($this->size)){
                throw new Exception("Empty value found!");
              }else{
                return $this->size;
              }
            }
            
            public function provideDescriptionForProductType(){
              try{
                return "This is a ".$this->getSize()." " .$this->getBrand()." ".$this->getDisplayType()." Television. For $ ".$this->getPrice();
              }catch(Exception $e){
                echo $e->getMessage();
              }
              
            }
        }
        
        class ItemDescriber{
          public function outputDescription($product){
            if($product instanceof Describable){
              return $product->provideDescription();
            }else{
              throw new Exception("Invalid type!");
            }
          }
        }
        
        class ShoppingCart implements Describable{
          protected $productsArray;
          protected $totalPrice;
          
          public function addProduct($product){
            if(($product instanceof Clothing) || ($product instanceof Television)){
              $this->productsArray[] = $product;
            }else{
              throw new Exception("Sorry, we don't carry that item.");
            }
          }
          
          public function removeOne($product){
            if(in_array($product, $this->productsArray)){
              unset($this->productsArray[array_search($product, $this->productsArray)]);
              $this->productsArray = array_values($this->productsArray);
            }else{
              throw new Exception("This item is not in your cart.");
            }
          }
          
          public function removeAll($product){
            foreach($this->productsArray as $item){
              if($product instanceof $item){
                try{
                  $this->removeOne($item);
                }catch(Exception $E){
                  echo $E->getMessage();
                }
              }else{
                throw new Exception("This product is not in your cart.");
              }
            }
          }
          //$price variable is used and unset here because if the same object
          //calls this function twice it won't double the actual price. 
          public function getTotalPrice(){
            foreach($this->productsArray as $product){
              $price += $product->getPrice();
            }
            $this->totalPrice = $price;
            unset($price);
            return $this->totalPrice;
          }
          
          public function getAllProducts(){
            return $this->productsArray;
          }
          
          public function findProductByName($name){
            foreach($this->productsArray as $key => $product){
              $names[] = $this->productsArray[$key]->getName();
            }
            if(in_array($name,$names)){
                return $this->productsArray[array_search($name, $names)];
              }else{
                throw new Exception("Can't find the product");
              }
              //used here to avoid duplicate copy
              unset($names);
          }
          
          public function provideDescription(){
            echo "Your cart contains the following items: <br/>";
            foreach($this->productsArray as $product){
              echo $product->getName()." for $ ".$product->getPrice()."<br/>";
            }
            echo "Item Count: ".count($this->productsArray)." Total price: $".$this->getTotalPrice()."<br/>";
          }
        }
        
        $cloth = new Clothing("Headband","Nike",9, "Medium" ,"Red", "Headgear","Neutral");
        $tv = new Television("Giant TV","Kramerica",3900.90,"LED","100 inches");
        $cart = new ShoppingCart();
        $prodDescriber = new ItemDescriber();
        $cart->addProduct($cloth);
        $cart->addProduct($tv);
        $cart->provideDescription();
        echo "Total Price: $".$cart->getTotalPrice()."<br/>";
        try{
          $cart->removeOne($cloth);
          var_dump($cart->findProductByName("Giant TV"));
          $prodDescriber->outputDescription($cart);
        }catch(Exception $E){
          echo $E->getMessage();
        }
        
      ?>
    </p>
  </body>
</html>