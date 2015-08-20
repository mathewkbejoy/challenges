<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>

    <?php

    /**
     * Red Ventures has partnered with the cable provider "Camcost" and will market and sell
     * bundles of their TV and internet packages.
     *
     * Camcost offers three TV packages:
     * "Budget" for $19.99, "Regular" for $39.99 and "Couch Potato" for $79.99.
     *
     * The "Couch Potato" package is only available in Utah and Oregon.
     *
     * Camcost offers two internet packages: "SlowNet" and "FastNet". However, the price varies depending on
     * the customer's location.
     * For customers living in North or South Carolina, "SlowNet" is $29.99 and "FastNet" is $59.99.
     * For customers anywhere else in the US, "SlowNet" is $24.99 and "FastNet" is $54.99.
     *
     * A "bundle" is considered to be the combination of one internet package and one TV package.
     * For example, "Budget + SlowNet" is a bundle combining the "Budget" TV package and the "SlowNet" internet package.
     * "Couch Potato + FastNet" is a bundle combining the "Couch Potato" TV package and the "FastNet" internet package.
     *
     * Create a class named "CamcostPricing" with a the public function: "getBundlesByZip".
     *
     * "getBundlesByZip" should take a customer's zip code and return all the possible bundles that the customer
     * is eligible for, along with the cost of each bundle.
     *
     * For example, for a customer with the zip "28277" the function should return an array that looks like:
     *
     * array(
     *     "Budget + SlowNet" => 49.98,
     *     "Budget + FastNet" => 79.98,
     *     "Regular + SlowNet" => 69.98,
     *     "Regular + FastNet" => 99.98
     * )
     *
     * This site will help you to know which zip codes belong to which states:
     * @see https://smartystreets.com/articles/zip-codes-101
     */
    ///////////////////////////
    // Put your code here!
    ///////////////////////////
    
    class CamcostPricing{
        //creates an array of all the possible price
        private $tv_packages = array(
                        "Rest_of_US"=>array("Budget" => 19.99, "Regular" => 39.99),
                        "OR_UT"=>array("Budget" => 19.99, "Regular" => 39.99, "Couch Potato" => 79.99));
        private $net_packages = array(
                        "Rest_of_US" => array("SlowNet" => 24.99,"FastNet" => 54.99),
                        "NC_SC" => array("SlowNet" => 29.99,"FastNet" => 59.99));
        
        function getBundlesByZip($zip_code){
            $possible_bundles;
            //gets the state by looking at the first 2 number
            $state = intval(substr(strval($zip_code),0,2));
            $state_special_tv = "Rest_of_US";
            $state_special_net = "Rest_of_US";
            
            //checks to see if we need to get into the special prices
            if(($state == 97) || ($state == 84)){
                $state_special_tv = "OR_UT";
            }
            if(($state >= 27) && ($state <= 29)){
                $state_special_net = "NC_SC";
            }
            
            foreach($this->tv_packages[$state_special_tv] as $tv_package => $tv_price){
                foreach($this->net_packages[$state_special_net] as $net_package => $net_price){
                    $possible_bundles["$tv_package & $net_package"] = $tv_price + $net_price; 
                }
            }
            return $possible_bundles;
        }
    }
    

     $pricing = new CamcostPricing;
    
    $zip = '28277';
    $bundles = $pricing->getBundlesByZip($zip);
    echo "<h3>Camcost Bundles for customers in $zip</h3>";
    showBundles($bundles);

    $zip = '84101';
    $bundles = $pricing->getBundlesByZip($zip);
    echo "<h3>Camcost Bundles for customers in $zip</h3>";
    showBundles($bundles);

    function showBundles($bundles) {
        foreach ($bundles as $bundleName=>$bundleCost) {
            echo "<p>$bundleName: \$$bundleCost</p>";
        }
    }

    ?>

</p>

</body>
</html>