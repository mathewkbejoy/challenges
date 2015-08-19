<!-- 

    Using everything you have learned and some googling

    Sum the numbers between 1 and 20 and display the result

 -->
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <p>

        <?php

            // code goes here...
            $result = 0;
            for($i = 0; $i<= 20; $i++){
                $result = $result + $i;
            }
            echo $result;


        ?>
    </p>
  </body>
</html>