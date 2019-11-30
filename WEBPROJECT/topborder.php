<div class="topborder">
            <img src="ico.jpg" style="width:15%;height: 100%;position:absolute;left:2%;cursor: pointer" onclick="change1('index.php','')" />
            <div class="search" id="search">
                <input type="text" id="question" style="font-size:17px;border:none;width:90%;height:90%;position:absolute;left:0%;top:0%;"/>
                <img src="search.png" style="height:75%;width:5%;position:absolute;left:93%;top:15%;cursor:pointer" onclick="query()"/>
            </div>
            
            <label id="home" style="position:absolute;top:36%;left:71%;cursor: pointer" onclick="change('index.php',this)">Home</label>
            <label id="cus" style="position:absolute;top:36%;left:76%;cursor: pointer" onclick="change('contact_us.php',this)">Contact us</label>
            <label style="position:absolute;top:36%;left:85%;cursor: pointer" id="login" onclick="change('login.php',this)"> <?php if(isset($_SESSION["name"])){
                if(strlen($_SESSION["name"])>7){
                    $name= substr($_SESSION["name"],0,7)."...";
                   // $name="hi";
                }else{
                     $name= $_SESSION["name"];
                }
                echo "<b style='color:yellow'>".$name."</b>";}else {echo 'Login';} ?>
            </label>
            <label id="logout" style="visibility:hidden;position:absolute;top:36%;left:92%;cursor: pointer" onclick="change1('logout.php',this)">Logout</label>
            
            
            <div id="menu" class="dropdown" style="border-radius:50%;height:20%;width:20%;position:absolute;left:85%;top:27%;">
                 <img src="hamburger.png" style="border-radius:55%;height:300%;width:15%;"  class="dropbtn" onclick="myFunction()"/>
                <div id="myDropdown" class="dropdown-content">
                    <?php                  if (!isset($_SESSION["name"])) {
                  echo '<a href="Register.php?">Register</a>';
                  }?>
                    <a href="check.php">Check Complaint</a>
                    
                    <?php  if(isset($_SESSION["type"]) && strcmp($_SESSION["type"],"admin")==0) {
                      
                  }
                  else{
                      
                      echo '<a href="view.php?task=close">Close complaint</a>';
                      echo '<a href="update.php">Update Complaint</a>';
                      if(isset($_SESSION["type"])&&(strcmp($_SESSION["type"],"customer")==0)){
                      echo '<a href="getID.php">View Complaint ID</a>';
                      }
                      echo '<a href="view.php?task=match">View All matched complaints</a>';
                  }
                  ?>
                  
                <?php                  if (isset($_SESSION["name"])) {
                      echo '<a href="logout.php">Logout</a>';
                  }
                  ?> 
                </div>
            </div>
            
            
            <?php if(isset($_SESSION["type"]) && strcmp($_SESSION["type"],"admin")==0){
                echo '<script>
                    document.getElementById("cus").style.visibility="hidden";
                    document.getElementById("menu").style.visibility="hidden";
                    document.getElementById("logout").style.visibility="visible";
                    document.getElementById("home").style.position="absolute";
                    document.getElementById("home").style.left="78%";
                    document.getElementById("search").style.position="absolute";
                    document.getElementById("search").style.left="45%";
                        </script>';
            }?>
            
        </div>