<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <p>

        <?php
        /* 
              Using your advanced knowledge of cards and arrays, Create a game of Blackjack
              Rules:
             	at any given time there will only be 2 players. the dealer and player one.
             	4 cards will be dealt out each round, 2 to the dealer and 2 to the player
             	if the amount in the players hand is less than or equal to the amount in the dealer hand
             		you must get a hit (draw a card)
             	if a player hits and the amount he has goes over 21, he has BUSTED and the dealer won that round
             	if the player ever reaches an amount greater than the dealers he should stay; then it will be 
             	    the dealers turn.
             	The dealer must draw until he reaches an amount greater than the player or until he has BUST
             	Subtract $100 from the players bank every time they lose
             	Add $200 to the players bank every time they win
             	Player starts with $1000 in the bank account
             	Aces can either be an 11 or 1
             	
             	the game will continue as long as there are enough cards in the deck OR the player runs out of money
             	Output:
		         	How many games were played?
		         	Who won the game?
		         	Which round did the player's bank reach half way?
		         	How many times did the player get blackjack ?
             	Extra Credit && Prize =]
             		Create a function called countCards and enable it for the player NOT the dealer
             		This function must analyze the deck and determine if the player should draw again
             		even if the amount in his hand is greater than the dealer.
             		This would be very useful lets say if the dealer has a sum of 9 on the table
             		You might have two 6's (amount of 12). Should you hit again? 
             		More than likely, because chance is the dealer can beat your 12
             	Winner will be determined by whoever has successfully implemented this AND has the best logic
            */
            
            
            function countCards($deck, $player_card_value){
                $player_win_by_value = 21 - $player_card_value;
                //checks the top card to see if it is worth it to take a hit
                foreach($deck[0] as $card){
                    foreach($card as $value){
                        return($value <= $player_win_by_value);
                    }
                }
            }
            
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
              /*this function takes a hand and add up all the values
                    also have the choice of making ace 1 or 11
              */
              function addcardValue($cards, $want_11 = false){
                  $amount;
                  foreach($cards as $card){
                      foreach($card as $value){
                          foreach($value as $face => $amt){
                              //amount only gets 11 if the card is an ace
                             if(($face == 'Ace') && $want_11){
                                  $amount += 11;
                                  $want_11 = false;
                              }else{
                                  $amount += $amt;
                                }
                            }
                        }
                    }
                    return $amount;
                }
                
            //LET THE GAME BEGIN!
              
            $deck = createDeck();
            $player_bank = 1000;
            $hit_Blackjack = 0;
            $game_round = 0;
            $win_lose_amt = 100;
            //won't being a new round if there isn't atleast 4 cards or if the player goes broke
            while((count($deck) >= 4) && ($player_bank > 0)){
                $dealers_hand = dealCards($deck, 2);
                $players_hand = dealCards($deck, 2);
                $dealers_hand_value = addcardValue($dealers_hand);
                $players_hand_value = addcardValue($players_hand);
                $game_round++;
                $who_won = "No one";
                //Round won't end unless either the dealer or the player reaches 21 or if there isn't enough cards.
                while(($dealers_hand_value < 21) && ($players_hand_value < 21) && (count($deck) >= 2)){
                    //player hits if dealer's hand is bigger or equal and if the player haven't hit blackjack
                    if((($dealers_hand_value > $players_hand_value) || ($dealers_hand_value == $players_hand_value)) && ($players_hand_value != 21)){
                        $players_hand = dealCards($deck,1);
                        //this lets player decide if he needs 11 or 1 for ace
                        if(($players_hand_value + 11) <= 21 ){
                            $players_hand_value += addcardValue($players_hand, true);
                        }else{
                            $players_hand_value += addcardValue($players_hand);
                        }
                    }else{
                       //if player's hand is bigger, dealer takes a card until his hand is bigger than the player's 
                        do{
                            if($dealers_hand_value != 21)
                            {
                                $dealers_hand = dealCards($deck,1);
                                if(($dealers_hand_value + 11) <= 21 ){
                                    $dealers_hand_value += addcardValue($dealers_hand, true);
                                }else{
                                    $dealers_hand_value += addcardValue($dealers_hand);
                                }
                            }
                        }while(($players_hand_value > $dealers_hand_value) && ($dealers_hand_value < 21) && (count($deck) >= 1));
                        
                    }
                }
                //round ends
                //checks if the player won the game
                if((($players_hand_value == 21) && ($dealers_hand_value != 21)) || ($dealers_hand_value > 21)){
                        $player_bank += $win_lose_amt; 
                        if($players_hand_value == 21){
                            $hit_Blackjack++;
                        }
                        unset($players_hand);
                        unset($dealers_hand);
                        $who_won = "Player";
                //checks if the dealer won the game
                }elseif((($dealers_hand_value == 21) && ($players_hand_value != 21))|| ($players_hand_value > 21)){
                        $player_bank = $player_bank - $win_lose_amt;
                        unset($players_hand);
                        unset($dealers_hand);
                        $who_won = "Dealer";
                    }
                //display game info. 
                echo "<h4>Game: $game_round</h4>";
                echo "Dealer's Hand: $dealers_hand_value<br/>";
                echo "Player's Hand: $players_hand_value<br/>";
                echo "$who_won wins the game!!<br/>";
                echo "Player hits $hit_Blackjack Blackjack<br/>";
                echo "Player's Bank: $".$player_bank."<br/>";
            }
            
            if($player_bank < 1000){
                echo "<br/>Player lost : $".(1000 - $player_bank)."<br/>";
            }else{
                echo "<br/>Player won : $".($player_bank - 1000)."<br/>";
            }
             
        ?>

    </p>

    </body>
</html>
