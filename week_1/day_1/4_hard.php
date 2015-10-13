<!-- 
	Using everything you have learned and some googling 

	render the months that I ask for below but make sure they are not in my $monthsExcludeArray

	Months you should try to render:
		- April
		- September
		- December
 -->

<!DOCTYPE html>
<html>
    <head></head>
	<body>
        <p>
          <?php
          
          	// months I dont want to render
          	$monthExcludeArray = [
          	 'January', 
          	 'February',
          	 'March',
          	 'May',
          	 'June',
          	 'July',
          	 'August',
          	 'September',
          	 'November'
          	];
          	
          	for($i =0; $i < 12; $i++){
          	    
          	    $monthArray[date('m',time()+($i*4.3*7*24*60*60))] = date('F',time()+($i*4.3*7*24*60*60));
          	}
          	ksort($monthArray);
          	
          	//$monthArray = ["April", "September", "December"];

          	// code goes here ...
          	foreach($monthArray as $month)
          	{
          	    if(!in_array($month, $monthExcludeArray)){
          	        echo $month.'<br/>';
          	    }
          	}
          	
         
          	
          ?>
        </p>
	</body>
</html>