<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <p>
        <?php
        /**
         * OVERVIEW:
         * We've decided we want to add "wishlist" functionality to our site.  If you think about it,
         * a Wishlist is just a container that holds items just like a ShoppingCart. One major difference,
         * however, is that you can only add a product to a wishlist once.  Make sure that you account for this
         * functionality in your wishlist by using exceptions.  Remember that you can override behavior in inheritance and
         * how abstract classes work.  We are going to change the structure of your ShoppingCart Class from
         * the first Challenge so that we can re-use the code in a Wishlist.
         *
         * INSTRUCTIONS:
         * 1. Create an abstract class called ProductContainer.  This class should contain all of the behavior that
         * was included in your shopping cart from Challenge 1 that will be shared between your WishList and ShoppingCart.
         * Any behavior that should be different between the WishList and ShoppingCart should be written as an abstract
         * method.
         * 2. Create a ShoppingCart class that extends the Product Container class.  Implement the abstract methods that you
         * specified in step1 in your ShoppingCart method.
         * 3. Create a WishList class that extends the Product Container class.  Implement the abstract methods that you
         * specified in step1 in your WishList method.
         * 4. Override the provideDescription method in each child class to add "Container Type: " and whether it is a
         * ShoppingCart or WishList.  Remember how to reference the parent class to utilize its behavior.
         * 5. Create a static method on the ProductContainer class called createCartFromContainer($productContainer).  This
         * Method should take in any ProductContainer as a parameter.  It should then copy the contents of the container
         * that is passed in to a new instance of a ShoppingCart and return the ShoppingCart.  If the parameter $productContainer
         * that is passed into the static method is not a ProductContainer, throw an exception.
         * 6. Create at least one Clothing object and one Television Object from Exercise 2.
         * 7. Create a Wishlist Object
         * 8. Add each of the Products to your Wishlist.
         * 9. Now create a ShoppingCart that Mirrors your wishlist by calling the createCartFromContainer method.
         * 10. Print out the description (provideDescription) of both your wishlist and your shopping cart to make sure that
         * they have the same products in them.
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
        
        abstract class ProductContainer implements Describable{
          protected $productsArray = array();
          protected $totalPrice;
          
          abstract public function addProduct($product);
          
          public function provideDescription(){
            foreach($this->productsArray as $product){
              echo $product->getName()." for $ ".$product->getPrice()."<br/>";
            }
            echo "Item Count: ".count($this->productsArray)." Total price: $".$this->getTotalPrice()."<br/>";
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
          
          static function createCartFromContainer($productContainer){
            if($productContainer instanceof ProductContainer){
              $cart = new ShoppingCart();
              foreach($productContainer->getAllProducts() as $product){
                $cart->addProduct($product);
              }
              return $cart;
            }else{
              throw new Exception("Not a ProductContainer");
            }
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
        
        class ShoppingCart extends ProductContainer{
          
          public function addProduct($product){
            if(($product instanceof Clothing) || ($product instanceof Television)){
              $this->productsArray[] = $product;
            }else{
              throw new Exception("Sorry, we don't carry that item.");
            }
          }
          
          public function provideDescription(){
            echo "Shopping Cart: <br/>";
            parent::provideDescription();
            
          }
        }
        
        class WishList extends ProductContainer{
          public function addProduct($product){
            if(($product instanceof Clothing) || ($product instanceof Television)){
              if(!(in_array($product, $this->productsArray))){
                $this->productsArray[] = $product;
              }else{
                throw new Exception("This item is in your wishlist");
              }
            }else{
              throw new Exception("Sorry, we don't carry that item.");
            }
          }
          
          public function provideDescription(){
            echo "Wish List: <br/>";
            parent::provideDescription();
          }
        }
        try{
          $cloth = new Clothing("Button Down Shirt", "J Peterman", 29.88, "Medium","Red", "Shirt", "Male" );
          $tv = new Television("Giant TV", "Kramerica",3900.90, "LED","100 inches" );
          $wishList = new WishList();
          $wishList->addProduct($cloth);
          $wishList->addProduct($tv);
          $shoppingCart = ProductContainer::createCartFromContainer($wishList);
          $wishList->provideDescription();
          echo "<br/>";
          $shoppingCart->provideDescription();
          
        }catch(Exception $E){
          echo $E->getMessage();
        }
        
        ?>
    </p>
  </body>
</html>