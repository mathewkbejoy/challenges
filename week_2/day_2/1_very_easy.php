<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <p>
        <?php

            /**
             * Write a function that takes a "name" and "number" (n)
             * print the name (n) times
             */
             function printNtimes($name, $num){
               for($i = 0; $i < $num; $i++){
                 echo $name."<br/>";
               }
             }
             
             printNtimes("Bejoy", 5);


        ?>
    </p>
  </body>
</html>