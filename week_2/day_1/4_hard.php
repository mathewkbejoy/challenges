<!-- 
	Using everything you have learned and some googling

	- Find all numbers between 1 and 100 that are divisible evenly by 3
	- From that list of numbers, also find all the numbers that divisible evenly by 6
	- Display each set of numbers with a comma delimited list
	- Also display how many numbers are divisible by 3 and by 6 respectively

	Expected Results

	 3, 6, 9, 12, 15, 18, etc
	 6, 12, 18, 24, 30, etc

	 Divisible by 3 = ###
	 Divisible by 6 = ###


 -->

<!DOCTYPE html>
<html>
    <head></head>
	<body>
        <p>

            <?php


                // code goes here ...
                for($i = 1; $i <= 100; $i++){
                    if($i%3 === 0){
                        $three[] = $i;
                    }
                    if($i%6 === 0){
                        $six[] = $i;
                    }                    
                }
                
                echo implode(',',$three)."<br/>".implode(',',$six)."<br/>Divisible by 3 = ".count($three)."<br/>Divisible by 6 = ".count($six);
            

            ?>
        </p>
	</body>
</html>