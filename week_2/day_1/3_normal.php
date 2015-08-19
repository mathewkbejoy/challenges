<!-- 
	Using everything you have learned and some googling 

	without using an array with the month names, find all the months that begin with "J"

	- Display the Month Number, Month Name, and how many characters are in that Month Name

	Results should be:
		1 - January - 7
		6 - June - 4
		7 - July - 4



 -->
 <?php
 	function whatMonth($month){
 		return time()+$month*30*24*60*60;
 	}
  ?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<p>
	<?php
	     // code goes here ...
		//echo date(F, 12
	//i wrote this in august thats why $i is -7 and the condition goes to 4	
	for($i = -7; $i<= 4; $i++){
		$m = date(F, whatMonth($i));
		if(substr($m,0,1) == "J"){
			echo $i+8 . " - " .$m." - ".strlen($m) . "<br />";
		}
		
	}

	?>
</p>
</body>
</html>