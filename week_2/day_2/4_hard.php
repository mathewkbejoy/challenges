<?php
    /**
     * This function cleans a string, then calls a function with
     * the string as a parameter.
     *
     * See that strange keyword in front of $callback?  This is called a "type hint".
     * It means that whatever is passed in as that parameter must be a function.
     *
     * Can you implement this function?
     */
    function clean_then_call($string, callable $callback) {
        // Use the string cleaning procedure we came up with in exercise 1 on $string
        $string = ucwords(strtolower(trim($string)));
        
        // return the result of the $callback function with $string passed in as a parameter
        return $callback($string);
         
    }
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <p>
        <?php
            // MD5 is a hashing algorithm that is commonly used to store passwords
            echo clean_then_call(' jAsOn hUnTeR', 'md5');
        ?>
    </p>
    <p>
        <?php
            // Write your own using clean_then_call and a closure to manipulate the string further
            echo clean_then_call(' bEjOy MatHeW ', function ($name){
                $length = strlen($name);
                return "$name - $length";
            });
        ?>
    </p>
  </body>
</html>