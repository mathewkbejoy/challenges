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
                return $deck;
              }

            /*
                We will now create a function to deal these cards to each user
                modify this function so that it returns the number of cards specified to the user
                also, it must modify the deck so that those cards are no longer available to be ditributed
            */
            function dealCards(&$deck, $number_of_cards = 0) {

            }

            $player = dealCards($deck,10); // player should now have 10 random cards in his hand

        ?>

    </p>

    </body>
</html>
