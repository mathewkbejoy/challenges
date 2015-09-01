<!-- Challenge 1 - Easy -  The Checkers Challenge  -->

<!-- 

	1. setup your html document
	2. utilizing a table with styles, create a 8x8 black and white checkers board
		- and example checkers.jpg is located in your images folder

	Bonus challenge - The same challenge, but create it using divs

	-->
	<!DOCTYPE html>
	<html>
		<head>
			
		</head>
		<body>
			<table width="300" height="300">
				<?php
					for($i=0; $i<8; $i++){
						$color = ($i%2 === 0) ? "white" : "black";
						echo "<tr>";
						for($x=0; $x<8; $x++){
							echo "<td style=\"background-color:{$color}\"></td>";
							$color = ($color=="white") ? "black" : "white";
						}
						echo "</tr>";
					}
				?>
				
			</table>
		</body>
	</html>