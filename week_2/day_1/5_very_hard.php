<!-- 
	Using everything you have learned and some googling

    Let's play paper rock scissors

    Simulate 2 people playing the best of 7 (gotta win 4)
        - show the results of each "game"

        i.e.

        Game 1:
        Mark - Paper
        Eric - Rock
        Mark Wins [Mark = 1, Eric = 0]

        Game 2:
        Mark - Rock
        Eric - Scissors
        Mark Wins [Mark = 2, Eric = 0]

        etc .....

 -->
 <?php
    $players = array(
                      array("name" =>"Mark","wins" => 0),
                      array("name" => "Eric","wins" => 0));
    
    function scenario($rps){
         switch ($rps) {
              case 1:
                  echo " - Rock <br />";
                  break;
              case 2:
                  echo " - Paper <br />";
                  break;
              case 3:
                  echo " - Scissors <br />";
                  break;      
          }
    }
    
    function isAWinner($roll_one, $roll_two){ //checks to see if $roll_one is a winner
        if(($roll_one == 1 && $roll_two == 3) 
            || ($roll_one == 2 && $roll_two == 1)
             || ($roll_one == 3 && $roll_two == 2)){
                 return true;
        } else{
            return false;
        }
        
    }
 
 ?>
<!DOCTYPE html>
<html>
<head></head>
<body>
<p>

    <?php
    // code goes here ...
    for($game = 1; $game <= 7; $game++){
       
       echo "<br />Game {$game}:<br />";
        
        $p1_roll = rand(1,3);
        $p2_roll = rand(1,3);
        
        echo $players[0]["name"];
        scenario($p1_roll);
       
        echo $players[1]["name"];
        scenario($p2_roll);
        
        if(isAWinner($p1_roll,$p2_roll)){
            $players[0]["wins"]++;
          echo $players[0]["name"] . " Wins ! [ ". $players[0]["name"] . " = ". $players[0]["wins"] . ",
             ".$players[1]["name"] . " = ". $players[1]["wins"]. " ] <br />";
            
        }elseif(isAWinner($p2_roll, $p1_roll)){
            $players[1]["wins"]++;
            echo $players[1]["name"] . " Wins ! [ ". $players[1]["name"] . " = ". $players[1]["wins"] . ",
                ".$players[0]["name"] . " = ". $players[0]["wins"]. " ] <br />";
            
        }else//if($p1_roll == $p2_roll)
        {
            echo "WOAH -- no wins! [ ". $players[0]["name"] . " = ". $players[0]["wins"] . ",
                ".$players[1]["name"] . " = ". $players[1]["wins"]. " ] <br />";
            //$game = 0;
            //$p1["wins"] = 0;
            //$p2["wins"] = 0;
            
        }
        
     
    }
    
    if($players[0]["wins"] > $players[1]["wins"]){
        echo "<br />".strtoupper($players[0]["name"]) . " WINS!!";
    }elseif($players[0]["wins"] == $players[1]["wins"]) {
        echo "<br /> EESH IT'S A TIE!!";
    }else {
        echo "<br />".strtoupper($players[1]["name"]) . " WINS!!";
    }
    ?>
</p>
</body>
</html>