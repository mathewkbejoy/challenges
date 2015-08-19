<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <p>

        <?php
            /*
             *
              Lets bring in the deck code from the past example. (normal)
              create a function that will create a deck of cards, randomize it and then return the deck
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
              
              

            /*
                We will now create a function to deal these cards to each user
                modify this function so that it returns the number of cards specified to the user
                also, it must modify the deck so that those cards are no longer available to be ditributed
            */
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
            
            $full_Deck = createDeck();

             $player = dealCards($full_Deck,10); // player should now have 10 random cards in his hand
             var_dump($player);
             var_dump($full_Deck);

        ?>

    </p>

    </body>
</html>
