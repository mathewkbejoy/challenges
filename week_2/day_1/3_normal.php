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
 	
  ?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<p>
	<?php
	     // code goes here ...
		//echo date(F, 12
	for($i = 0; $i< 12; $i++){
		$m = date('F',time()+($i*4.3*7*24*60*60));
		if(substr($m,0,1) == "J"){
			echo date('m',time()+($i*4.3*7*24*60*60)) . " - " .$m." - ".strlen($m) . "<br />";
		}
		
	}
	


	?>
</p>
</body>
</html>