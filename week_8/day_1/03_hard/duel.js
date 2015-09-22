/**
 * Andrew Jackson once killed attorney Charles Dickinson in a duel,
 * and we're going to use that to our advantage here to create 
 * a much less gruesome version of the duel on this webpage. 
 *
 * I mean if you want to make it gruesome maybe do that on your own time.
 *
 * Anyway, I have given you a basic HTML structure for a 
 * DUEL OF FORM BUTTONS between these two dead guys, and you
 * should make the page do what it needs to do, using your knowledge
 * of JS, HTML, CSS, and... gun dueling.
 *
 * Here's what this 'game' should do:
 * 
 * 1. Clicking a "FIRE" button should fire a shot at the other dueler.
 *   - shots have a random chance of succeeding or failing
 *   - number of shots fired should increase every click on the "FIRE" button
 *   - number of hits obviously only increases when the shot is successful
 *   - both duelers are invincible (for now!)
 * 
 * 2. Clicking the "RESET" button resets all the shot and hit counters and
 * adds 1 to the num resets
 *
 * 3. Any time you click any of the buttons on the page, change the background
 * color of the page to a completely random color. (Google will be your friend for
 * figuring out how to do that. The random color bit, that is.)
 *
 * OPTIONAL STUFF:
 * - add photos of the two duelers below their name (google search that stuff)
 * - play a sound when someone clicks the "FIRE" button. I added a "shot.wav" 
 *   so you can do this; you'll need to read about the <audio> element
 *   and how to use it in JS
 * - ???
 * - Profit!
 */
 
 jQuery(function($){
     var resetCounter = 0, aJackShots = 0, aJackHits = 0, cDickShots = 0, cDickHits = 0;
     function randomBGColor(){
         var letters = ['A','B','C','D','E','F'];
         var color ="#";
         for(var i = 0; i < 3; i++){
             color+=letters[Math.floor(Math.random()*letters.length)];
         }
         $("body").css({"background-color":color});
      
     }
     function isLucky(){
      return ((Math.floor(Math.random()*10)+1) <= 7);
     }
     
     $("#reset").on('click',function(){
         resetCounter++;
         aJackShots = 0;
         aJackHits = 0;
         cDickShots = 0;
         cDickHits = 0;
         $("#num-resets").text(resetCounter);
         $("#andrew-numshots").text(aJackShots);
         $("#charles-numhits").text(cDickHits);
         $("#charles-numshots").text(aJackShots);
         $("#andrew-numhits").text(cDickHits);
         randomBGColor();
         
     });
     
     $("#andrew-shoot").on('click',function(){
        document.getElementById('audio').play();
        aJackShots++;
        if(isLucky()){
         cDickHits++;
        }
        $("#andrew-numshots").text(aJackShots);
        $("#charles-numhits").text(cDickHits);
        randomBGColor();
     });
     
     $("#charles-shoot").on('click',function(){
      document.getElementById('audio').play();
      cDickShots++;   
      if(isLucky()){
         aJackHits++;
        }
        $("#charles-numshots").text(cDickShots);
        $("#andrew-numhits").text(aJackHits);
        randomBGColor();
     });
     
     
 });