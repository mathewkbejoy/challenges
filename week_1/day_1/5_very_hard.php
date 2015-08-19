<!-- 
	Using everything you have learned and some googling

  The multi-demensional array below contains packages with prices but
  they are all out of order and I want to present them to my customer
  in the correct order with the lowest price first
 -->

<?php
  $packagesArray = array(
    array('name' => 'Package 1', 'price' => 5.99),
    array('name' => 'Package 2', 'price' => 3.01),
    array('name' => 'Package 3', 'price' => 100.01),
    array('name' => 'Package 4', 'price' => 11.00),
    array('name' => 'Package 5', 'price' => 25.95),
    array('name' => 'Package 6', 'price' => 10.99),
    array('name' => 'Package 7', 'price' => 11.00),
  );
  
  $priceArray = array();
  foreach($packagesArray as $k => $p){
    $priceArray[] = $packagesArray[$k]["price"];
  }
  
  sort($priceArray);
  $notInOrder = true;
  
  while($notInOrder){
    $count = 0;
    
    //checks if the 1st element is greater than the 2nd. if so they switch places.
    for($i = 0; $i< count($packagesArray)-1; $i++){
      if($packagesArray[$i]["price"] > $packagesArray[$i+1]["price"]){ 
        $temp = $packagesArray[$i]; 
        $packagesArray[$i] = $packagesArray[$i+1];
        $packagesArray[$i+1] = $temp; 
      }
    }
    
    //cross check with $priceArray to see if its in order
    foreach($packagesArray as $key => $items){
      if($packagesArray[$key]["price"] == $priceArray[$key]){
        $count++;
      }
    }
    
    //if it is we exit the loop.
    if($count == count($packagesArray)){
      $notInOrder = false;
    }
  }
  
?>
<!DOCTYPE html>
<html>
  <head></head>
	<body>
      <h1>Packages</h1>
      <p>Here are all the packages we offer and there price:</p>
      <table>
        <th><td>Name</td><td>Price</td></th>
        <!-- 
          this for each loop will iterate over each item above and
          set $package as the inner array so we can have access to it directly
          this is appose to accessing them like so $packagesArray[0]['name'];
         -->
        <?php foreach ($packagesArray as $packageArray): ?>
          <tr><td><?=$packageArray['name']?></td><td><?=$packageArray['price']?></td></tr>
        <?php endforeach ?>
      </ul>
	</body>
</html>