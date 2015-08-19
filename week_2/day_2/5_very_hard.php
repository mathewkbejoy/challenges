<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <p>

        <?php

        /**
         * Copy exercise 5 into this file.
         *
         * Use a custom sort function and closure to sort the names
         * by their scores, with the highest scores first before
         * printing the names out on the screen.
         *
         * @see http://php.net/manual/en/function.usort.php
         */
         
          function score($name){
            $name = ucwords(strtolower(trim($name)));  
            $posA = stripos($name, 'a');
            $parts = explode(' ', $name);
            $lenLast = strlen(array_pop($parts));
            $numWords = str_word_count($name);
            $score = $posA * $lenLast / $numWords;
            return $score;
          }   
          
           function greater($a, $b){
            return ($a > $b);
            }


        $names = [
            'JASON hunter',
            ' eRic Schwartz',
            'mark zuckerburg '
        ];

        // Add a couple extra names to the $names array
        $names[] = 'Bob ArK';
        $names[] = 'Derek WaLL';
        

       
      for($i = 0; $i <= count($names); $i++){
          echo $names[$i];
          
          //$name_scores[] = score($names[$i]);
          //var_dump(greater(score($names[$i-1]),score($names[$i])));
          //usort($names,greater(score($names[$i-1]),score($names[$i])));
           
      }
      echo score($names[3]);
        //print_r($name_scores);
        //print_r($names)


        ?>

    </p>

    </body>
</html>