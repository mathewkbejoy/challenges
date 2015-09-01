<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <p>

        <?php
            /*
             * Bring in your createDeck and dealCards function
               For the specified number of players below, assign each one an even set of cards.
               We will do this by counting out how many players there are, counting how many cards
               are in the deck. then dividing them so we know how many cards each player should get
             */
             
             function createDeck() {
                $deck = array();
                $suits = array ("clubs", "diamonds", "hearts", "spades");
                $faces = array (
                    "Ace" => 1, "2" => 2,"3" => 3, "4" => 4, "5" => 5, "6" => 6, "7" => 7,
                    "8" => 8, "9" => 9, "10" => 10, "Jack" => 11, "Queen" => 12, "King" => 13
                    );
                    
                foreach($suits as $suit){
                    foreach($faces as $face => $value){
                        $deck[] = array($suit => array($face => $value));
                    }
                }
                shuffle($deck);
                return $deck;
              }
              
             function dealCards(&$deck, $number_of_cards = 0) {
                $setOfCards;
                $i = 0;
                $count = 0;
                while($count != $number_of_cards){
                    $setOfCards[] = $deck[$i];
                    array_shift($deck);
                    $count++;
                }
                return $setOfCards;
            }
            
             function divCards($deck_count, $player_count){
                 
                 if($deck_count % $player_count !== 0){
                     $new_deck_count = $deck_count - ($deck_count % $player_count);
                     return ($new_deck_count / $player_count);
                 } else {
                     return ($deck_count / $player_count);
                 }
             }
            
               $deck = createDeck();
               $num_players = 4;
               $num_cards_in_deck = count($deck);//find a function to count the # of elements in an array
               $num_cards_to_give_each_player = divCards($num_cards_in_deck, $num_players);

                /*
                  use a for loop to add the "dealt hands" to the $players array
                */
                  $players = array(); 
                   for($i = 0; $i < $num_players; $i++) {
                       $players[] = dealCards($deck, $num_cards_to_give_each_player);
                       
                   }
                   
                  //var_dump($players);
                  
               
               /*
               lets create a simple game
               each player will play a card and whoever has the highest value wins. if there are 2 cards played
               that have the same value everybody loses and that round is now a draw.

               store the results of each game in round_winners and also who won that round as the value.
               if the round is a draw store the value as DRAW

                use a loop to play each game until all oponents are out of cards

                Print out the array of all the rounds. if there was a draw the round should say DRAW
                if a player has one it should display "Player X" where X is the index of the player
                
               */
               
              $game_info;
              //this loop plays the game and add it to play array
              for($i = 0; $i < $num_cards_to_give_each_player; $i++){
                  for($player = 0; $player < $num_players; $player++){
                      foreach($players[$player][$i] as $suits => $faces){
                          foreach($faces as $face => $value){
                              $play[] = $value;
                          }
                      }
                    } //this loop checks who won the game
                  for($p = 0; $p < $num_players - 1; $p++){
                      if($play[$p] > $play[$p+1]){ //checks to see who got higher value
                          if(is_null($round_winners)){//checks to see if $round_winner is empty
                              $round_winners = array($p => $play[$p]); // if so it gets added the value and key from $play[$p] were $p is the player X
                          }else{//if not, this loop checks to see if the value in $round_winners for this round is already higher or not
                              foreach($round_winners as $win_Val){ 
                                  if(is_int($win_Val)){//checks to see $round_winners have a "draw" string
                                      if($play[$p] > $win_Val){
                                            $round_winners = array($p => $play[$p]);
                                      }
                                    }
                                }
                            }
                        }elseif($play[$p] < $play[$p+1]){ //same deal here
                            if(is_null($round_winners)){
                                $round_winners = array($p+1 => $play[$p+1]);
                            }else{
                                foreach($round_winners as $win_Val){
                                  if(is_int($win_Val)){
                                      if($play[$p+1] > $win_Val){
                                            $round_winners = array($p+1 => $play[$p+1]);
                                      }
                                    }
                                }
                            }
                        }
                    }
                    sort($play); //sort to make it easier to check for draw
                    for($p = 0; $p < $num_players - 1; $p++){
                        if($play[$p] == $play[$p+1]){
                            $round_winners = "DRAW!!";
                        }
                    }
                    $game_info[] = $round_winners;//that round winner gets added here.
                    unset($play); //this is so that play array wont go above the player limit (4 in this case).
                    unset($round_winners);//this so that the script won't crash from previous round_winner info. 
              }
                
                var_dump($game_info);
        ?>

    </p>

    </body>
</html>
