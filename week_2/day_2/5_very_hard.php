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
         
          function score(&$name){
            $name = ucwords(strtolower(trim($name)));  
            $posA = stripos($name, 'a');
            $parts = explode(' ', $name);
            $lenLast = strlen(array_pop($parts));
            $numWords = str_word_count($name);
            $score = $posA * $lenLast / $numWords;
            return $score;
          }   
          
           


        $names = [
            'JASON hunter',
            ' eRic Schwartz',
            'mark zuckerburg '
        ];

        // Add a couple extra names to the $names array
        $names[] = 'Bob ArK';
        $names[] = 'Derek WaLL';
        
       usort($names,function (&$a,&$b){
                $score_a = score($a);
                $score_b = score($b);
                return($score_b - $score_a);
            });
       
       
       var_dump($names);
        
        

        ?>

    </p>

    </body>
</html>