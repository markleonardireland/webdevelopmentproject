<html>
   <head>
      <title>Prowess World Series</title>
      <meta name="viewport" content=width=device-width, initial-scale=1>
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="shortcut icon" href="favicon.ico"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script>
         $(document).ready(function(){
             $("#show").click(function(){
                 $("#userForm").show();
             }); //when a user clicks the "Sign Up" button, the form appears
             
             $("#show").click(function(){
                 $("#hide").show();
             }); //when a user clicks the "Sign Up" button, the "Hide Form" button appears
             
             $("#show").click(function(){
                 $("#show").hide();
             }); //when a user clicks the "Sign Up" button, the "Sign Up" button disappears
             
             $("#hide").click(function(){
                 $("#userForm").hide();
             }); //when a user clicks the "Hide Form" button, the form disappears
             
             $("#hide").click(function(){
                 $("#hide").hide();
             }); //when a user clicks the "Hide Form" button, the "Hide Form" button disappears
             
             $("#hide").click(function(){
                 $("#show").show();
             }); //when a user clicks the "Hide Form" button, the "Sign Up" button appears
         });
      </script>
      <script>
         function validateForm() {
             
             var x = document.forms["form"]["name"].value;
         	
         	var y = document.forms["form"]["dob"].value;
             var atdob = y.indexOf("/");
         	
         	var z = document.forms["form"]["emailaddress"].value;
             var atpos = z.indexOf("@");
             var dotpos = z.lastIndexOf(".");
         	
             if (x==null || x=="") {
         	alert("Name field is mandatory");
                 return false;
         		
         	}
         	
         	else if (atdob< 1) {
             alert("Not a valid date of birth, must be written in DD/MM/YYYY format");
             return false;	
             }
         	
             else if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=z.length) {
                 alert("Not a valid e-mail address");
                 return false;	
             }
         	
         	else {
             alert("Sign Up Complete!");
             return false;
         	}
         
         
         }
      </script>
      <script type="text/javascript" src="teamnames.js"></script>
      <script>
         $(document).ready(function(){
             $("button1").click(function(){
                 $("	<div class=contentAreaStyle").show();
             });
         });
      </script>
   </head>
   <body onload="process()" id="home">
      <?php
         if(isset($_POST['ok'])){
             $xml = new DOMDocument("1.0","UTF-8");
             $xml->load("Players.xml");
             
             $name = $_POST['name'];
             $game = $_POST['game'];
             $region = $_POST['region'];
             $mem1 = $_POST['mem1'];
             $mem2 = $_POST['mem2'];
             $mem3 = $_POST['mem3'];
             $mem4 = $_POST['mem4'];
             $mem5 = $_POST['mem5'];
             //assigns inputs from the Team Form and assigns them to variables
         
             $rootTag = $xml->getElementsByTagName("site")->item(0);
             
             // http://php.net/manual/en/simplexmlelement.addattribute.php
         
             
             $entryTag = $xml->createElement("entry");
             //creates the "entry" tag under site
               $nameTag = $xml->createElement("name", $name);
               $gameTag = $xml->createElement("game", $game);
               $regionTag = $xml->createElement("region", $region);
               $mem1Tag = $xml->createElement("mem", $mem1);
               $membersTag = $xml->createElement("members");
               //creates "members" tag under entry
                  $mem1Tag = $xml->createElement("mem", $mem1);
                  $mem2Tag = $xml->createElement("mem", $mem2);
                  $mem3Tag = $xml->createElement("mem", $mem3);
                  $mem4Tag = $xml->createElement("mem", $mem4);
                  $mem5Tag = $xml->createElement("mem", $mem5);
                  //adds each individual members
                  $mem1Tag->setAttribute('type', 'captain');
                  $mem2Tag->setAttribute('type', 'player');
                  $mem3Tag->setAttribute('type', 'player');
                  $mem4Tag->setAttribute('type', 'player');
                  $mem5Tag->setAttribute('type', 'player');
                  //adds attributes to each member. Member 1 is always the team captain.
             
                $entryTag->appendChild($nameTag);
                $entryTag->appendChild($gameTag);
                $entryTag->appendChild($membersTag);
                //appends name, game and members tags under "entry"
                
                $membersTag->appendChild($mem1Tag);
                $membersTag->appendChild($mem2Tag);
                $membersTag->appendChild($mem3Tag);
                $membersTag->appendChild($mem4Tag);
                $membersTag->appendChild($mem5Tag);
                $entryTag->appendChild($regionTag);
                //appends mem tags under "members", then appends region.
                //the reason region is done here seemlingly out of order is because it's how our XML file was formatted and it would be too much work to change everything, so we left it like this for the sake of consistancy
            
                $rootTag->appendChild($entryTag);
                //appends entry tag under the root tag
                $xml->save("Players.xml");
         
         }
         ?>
      <div class="navbar-static-top navbar-inverse navbar-static-top" id="home">
         <div class="container">
            7
            <div class="navbar-brand">
               Prowess World Series
            </div>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            Menu
            </button>
            <div class="collapse navbar-collapse navHeaderCollapse">
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="">Home</a></li>
                  <li><a href="#search">Search</a></li>
                  <li><a href="#tournaments">Tournaments</a></li>
                  <li><a href="#addplayers">Add Players</a></li>
                  <li><a href="#gamedetails">Game Details</a></li>
                  <li><a href="#twitter">Twitter</a></li>
                  <li><a href="#mailinglist">Mailing List</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="jumbotron">
         <div class="container" id="search">
            <p>
            <h2><br/>WELCOME TO THE PROWESS WORLD SERIES!</h2>
            </p>
            <!--target="_blank"-->
            <div ="container">
            <div class="col-sm-12 col-sm-push-0 contentAreaStyle4" id="search">
               <title> Rssfeed</title>
               <h3>Search for a team by Name</h3>
               Enter a teams name to see if they're competing:
               <input type="text" id="userInput">
               <div id="displayResults"></div>
            </div>
         </div>
      </div>
      </div>
      <div class="alt1" id="tournaments">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <h2 class="text-center">CS:GO Tournament</h2>
                  <p class="text-justify">Sign Up to our Counter Strike : Global Offensive tournaments.<br /><br />Play in 5 v 5 online games<br /><br /></p>
                  <a href="#one" class="btn btn-default">Learn about CS:GO</a>
               </div>
               <div class="col-md-4">
                  <h2 class="text-center">Dota 2</h2>
                  <p class="text-justify"></p>
                  Sign Up to our Dota 2 tournaments.<br/><br />Play in 5 v 5 online games<br /><br /></p>
                  <a href="#two" class="btn btn-default">Learn about Dota 2</a>
               </div>
               <div class="col-md-4">
                  <h2 class="text-center">League of Legends</h2>
                  <p class="text-justify">Sign Up to our League of Legends tournaments.<br /><br />Play in 5 v 5 online games<br /><br /></p>
                  <a href="#three" class="btn btn-default">Learn about League of Legends</a>
               </div>
            </div>
         </div>
      </div>
      <div class="container center" align="center">
         <br>
         <h3 class="alt3" align="center" id="addplayers"> Players </h3>
         <?php
            $get = file_get_contents('Players.xml');
            $arr = simplexml_load_string($get);
            $data = $arr->entry;
            ?>
         <table id="playerTable">
            <tr>
               <th>Name</th>
               <th>Game</th>
               <th>Captain</th>
               <th>Region</th>
            </tr>
            <?php
               foreach($data as $row){
               ?>
            <tr>
               <td><?php echo $row->name ?></td>
               <td><?php echo $row->game ?></td>
               <td><?php echo $row->members->mem[0] ?></td>
               <td><?php echo $row->region ?></td>
            </tr>
            <?php
               }
               ?>
         </table>
         <!--End of Table--> <br/>
      </div>
      <div  class="container" align="center">
         <button id="show" align="center">Sign Up</button>
         <form id="userForm" action="index.php" method="post">
            <select class="selectForm" name="game">
               <option value="" disabled selected>Select a Game</option>
               <option value="CS:GO">Counter Strike: Global Offensive</option>
               <option value="League of Legends">League of Legends</option>
               <option value="Dota 2">Dota 2</option>
            </select>
            <br/>
            <select class="selectForm" name="region">
               <option value="" disabled selected>Select a Region</option>
               <option value="Europe">Europe</option>
               <option value="America">America</option>
               <option value="Asia">Asia</option>
            </select>
            <br/>
            <input class="selectForm" placeholder="Team Name" type="text" name="name"/> <br/>
            <input class="selectForm" placeholder="Team Captain" type="text" name="mem1"/> <br/>
            <input class="selectForm" placeholder="Team Member" type="text" name="mem2"/> <br/>
            <input class="selectForm" placeholder="Team Member" type="text" name="mem3"/> <br/>
            <input class="selectForm" placeholder="Team Member" type="text" name="mem4"/> <br/>
            <input class="selectForm" placeholder="Team Member" type="text" name="mem5"/> <br/>
            <input type="submit" name="ok"/>
         </form>
          <button id="hide">Hide Form</button> 
      </div>
      <br/>
      <div class="games" id="gamedetails">
      <div class="container">
         <div class="row padding" id="one">
            <div class="col-md-6">
               <img src="csgo.png" class="img-circle img-responsive" alt="Circular holding image" id="gameimage"/>
            </div>
            <div class="col-md-6">
               <h2 class="text-center">Counter Strike : Global Offensive</h2>
               <p class="text-justify">Counter-Strike: Global Offensive (CS:GO) is an online first-person shooter developed by Hidden Path Entertainment and Valve Corporation. It is the fourth game in the main Counter-Strike franchise. Counter-Strike: Global Offensive was released on August 21, 2012, and made available for Microsoft Windows and OS X on Steam, Xbox 360, and a United States-only version on PlayStation 3. The Linux version was released in September 2014.</p>
               <p>It features classic content, such as revamped versions of classic maps, as well as brand new maps, characters and game modes. Cross-platform multiplayer was planned between Windows, OS X, Linux, and PlayStation 3 players, but was ultimately limited to Windows, OS X, and Linux because of the differences in update-frequency between systems. </p>
            </div>
         </div>
         <hr />
         <div class="row padding" id="two">
            <div class="col-md-6">
               <h2 class="text-center">Dota 2</h2>
               <p class="text-justify">Dota 2 is a free-to-play multiplayer online battle arena (MOBA) video game developed and published by Valve Corporation. Released for Microsoft Windows, OS X, and Linux in July 2013, following a Windows-only public beta testing phase that began in 2011, the game is the stand-alone sequel to Defense of the Ancients (DotA), a mod for Warcraft III: Reign of Chaos and its expansion pack, The Frozen Throne. Dota 2 is one of the most actively played games on Steam, with it having a peak of over a million concurrent players in February and March 2015.</p>
            </div>
            <div class="col-md-6">
               <img src="dota2.png" class="img-circle img-responsive" alt="Circular holding image" align="right"/>
            </div>
         </div>
         <hr />
         <div class="row padding" id="three">
            <div class="col-md-6">
               <img src="LOL.png" class="img-circle img-responsive" alt="Circular holding image"/>
            </div>
            <div class="col-md-6">
               <h2 class="text-center">League of Legends</h2>
               </h2>
               <p class="text-justify">League of Legends (LoL) is a multiplayer online battle arena, real-time strategy video game developed and published by Riot Games, for Microsoft Windows and Mac OS X. It is a free-to-play game supported by microtransactions and inspired by the mod Defense of the Ancients for the video game Warcraft III: The Frozen Throne. </p>
               <p>In League of Legends, players assume the role of an unseen "summoner" that controls a "champion" with unique abilities and battle against a team of other players or computer-controlled champions. The goal is usually to destroy the opposing team's "nexus", a structure which lies at the heart of a base protected by defensive structures. Each League of Legends match is discrete, with all champions starting off fairly weak but increasing in strength by accumulating items and experience over the course of the game.</p>
            </div>
         </div>
         <hr />
      </div>
      
      <div align="center" id="twitter">
         <a class="twitter-timeline" href="https://twitter.com/ProwessWS" data-widget-id="674686357718089728">Tweets by @ProwessWS</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
      
      <br /><br /><br />
      
      <div>
         <p align="center" id="mailinglist"> Sign up for our Mailing List!</p>
         <form id="signup" name="form" align="center" action="demo_form.asp" onsubmit="return foo()" method="post">
            <label>
            <span>Name: </span><br />
            <input id="name" type="text" placeholder="Forename Surename" name="name" />
            </label>
            <br />
            <br />
            <label>
            <span>Address: </span><br />
            <input id="address" type="text" placeholder="No., Street, Town, County" name="address" />
            </label>
            <br />
            <br />
            <label>
            <span>Date Of Birth: </span><br />
            <input id="dob" type="text" placeholder="DD/MM/YYYY" name="dob" />
            </label>
            <br />
            <br />
            <label>
            <span>Email Address: </span><br />
            <input id="emailaddress" type="text" placeholder="email@hostsite.com" name="emailaddress" />
            </label>
            <br />
            <br />
            <label>
            <input type="button"  onClick="validateForm()" value="Confirm">
            </label>
         </form>
      </div>
      <div class="alt2">
         <div class="container" id="foot">
            <footer>&copy; Prowess World Series <br /><a href="#home">Back To Top</a></footer>
         </div>
      </div>
      <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script>
         $(function() {
         $('a[href*=#]:not([href=#])').click(function() {
         if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
         $('html,body').animate({
           scrollTop: target.offset().top
         }, 1000);
         return false;
         }
         }
         });
         });
      </script>
   </body>
</html>