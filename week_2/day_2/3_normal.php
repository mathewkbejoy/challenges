<?php
    /**
     * This function is SUPPOSED to take an "owner" string
     * and return an array of "rides" possessed by that "owner".
     *
     * Can you fix the code below so it works as expected?
     */
    function ride($owner) {
        $rides = array('car', 'boat', 'bike');
        $ownedRides = array();
        for($i = 0; $i < count($rides); $i++) {
            array_push($ownedRides, $owner . "'s " . $rides[$i]);
        }
        return $ownedRides;
    }
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
    <p>
        <pre>
        <?php
            print_r(ride('Jason'));
        ?>
        </pre>
    </p>
    <p>
        <pre>
        <?php
            print_r(ride('Eric'));
        ?>
        </pre>
    </p>
  </body>
</html>