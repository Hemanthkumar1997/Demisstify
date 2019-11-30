<?php
session_start();
$_SESSION["q"]= filter_input(INPUT_GET, 'q');
$_SESSION["order"]=filter_input(INPUT_GET, 'order');
$_SESSION["set"]=filter_input(INPUT_GET, 'set');
$_SESSION["option"]=filter_input(INPUT_GET,"show");
?>
<?php
$db=new mysqli("localhost","root","","demisstify");
if($db->error){
    die("connection failed".$db->error);
}
if ($_SESSION["order"]==""||!isset($_SESSION["order"])) {
    $order = "name";
    
} else {
    $order = $_SESSION["order"];
}
$count =4;
$total=0;
$row_num=0;
$pos = 22;
$type=filter_input(INPUT_GET,"show");
if(strlen($type)==0){
    $type="missing";
}
echo $type;
$question=$_SESSION["q"];
    $start=0;
    $end=5;
     if(isset($_SESSION["set"]))
    {
        $start=(((int)$_SESSION["set"])-1)*$count;
    }
$count_query="SELECT * FROM `missing` WHERE `status`='Active' and `type`='$type' and `name` like '$question%' order by $order";
$x=$db->query($count_query);
if($x){
$total=mysqli_num_rows($x)/$count;
}else{
    echo '<b style="color:red;position:absolute;top:48%;left:44%;font-size:25px;">No Entries Found</b>';
}
$sql="SELECT `Complaint ID`, `name`, `age`, `height`, `weight`, `contact_number`, `contact_email`, `place` FROM `missing` WHERE `status`='Active' and `type`='$type' and `name` like '$question%'  order by $order LIMIT 4 OFFSET ".$start;
$result=$db->query($sql);
echo'<html><head><style>';
    include 'common.php';
    echo '
        #sortby:focus{
         outline:none;
         }
        .info{
        overflow:hidden;
          }

        .info img{
        display: block;
        margin-left: auto;
        margin-right: auto;
        width:90%;
        height:70%;
        object-fit:contain;
        position:absolute;
        top:2%;
        left:4%;
        overflow:hidden;
        }
        button{
        text-align:center;
        width:180px;
        height:35px;
        color:white;
        background:#311B92;
        position:absolute;
        top:80%;
        left:27%;
        font-size:20px;
        border:none;
        box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        z-index:1;
        }       
 
        ';
    echo '</style><script>';
    include 'commonscripts.php';
    echo '
          function zoom(image){
          image.style.height="100%";
          image.style.width="100%";
          image.style.objectFit="contain";
          image.style.position="absolute";
          image.style.left="0%";
          image.style.top="0%";
          }
          function collapse(image){
          image.style.height="70%";
          image.style.width="90%";
          image.style.position="absolute";
          image.style.left="4%";
          image.style.top="2%";
          }
          function goto(id){
          window.open("display.php?id="+id);
          }
          function sort(){
            var ord=document.getElementById("sortby").value;
            if(ord!="")
            window.location.href = "search.php?q='.$question.'&order="+ord;'.'}
              function sort1(){
            var ord=document.getElementById("sortby").value;
            var opt=document.getElementById("option").value;
            if(ord!="")
            window.location.href = "search.php?q='.$question.'&&order="+ord+"&&show="+opt;'.'}  
            ';
    echo '</script></head><body>';
   include 'topborder.php';
   if($result){
if(mysqli_num_rows($result)>0){
    $initial_count=0;
    if(isset($_SESSION["set"])){
        $row_num=((int)$_SESSION["set"]);
    }
    else{
        $row_num=1;
    }
    if ($total  <= 1  ) {
        $total = 1;
    } else if((int)$total<$total){
        $total =  ((int)($total ))+1;
    }
    echo '<b style="z-index:0;position:absolute;left:13.5%;top:15%;font-size:20px"><x style="color:Green">Showing:</x> '.$row_num.'/'.$total.'</b>';
    echo '<select id="sortby" name="age" style="z-index:0;cursor: pointer;position:absolute;left:75%;top:14.99%;font-size:15px;width:150px;height:25px;margin-right: 15px" onchange=sort()>
                         <option value="" >SORT BY</option>
                         <option value="age">Age</option>
                         <option value="date">Date of Complaint</option>
                         <option value="name">Name</option>
                         <option value="place">Place</option>                       
                         </select>';
    echo '<select id="option" name="age" style="z-index:0;cursor: pointer;position:absolute;left:60%;top:14.99%;font-size:15px;width:150px;height:25px;margin-right: 15px" onchange=sort1()>
                         <option value="" >SHOW</option>
                         <option value="found">Found</option>
                         <option value="missing">Missing</option>                      
                         </select>';
    echo '<script>document.getElementById("sortby").value="'.$order.'";</script>';
    echo '<script>document.getElementById("option").value="'.$type.'";</script>';
    $left=12;
    echo "<div class='info'>";
    $id="";
while($row=$result->fetch_assoc() and $initial_count<$count){
    if($initial_count%2!=0){
        $left=55;
        echo "<br>";
    }else{
        $left=12;
    }
    echo '<div id='.$row["Complaint ID"].' style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);width:30%;height:60%;position:absolute;left:'.$left.'%;top:'.$pos.'%;">';           
    echo '<img src="fetch.php?id='.$row["Complaint ID"].'" onmouseenter="zoom(this)" onmouseleave="collapse(this)" />';
    echo '<button style="cursor:pointer" onclick="goto(this.parentNode.id)">'.$row["name"].'</button>'."</div>";
    
    if($initial_count%2!=0){
        $pos=$pos+70;
    }
    $initial_count+=1;
    $id=$row["Complaint ID"];
}
if($initial_count==1){
    echo '<script>
        d=document.getElementById("'.$id.'").style;
        d.position="absolute";
        d.left="35%";
        </script>';
    $pos+=65;
}if($initial_count==3){

    $pos+=70;
}
echo "</div>";
if($initial_count<$count){
    $pos=$pos;
}
}
else 
{
    echo '<b style="color:red;position:absolute;top:48%;left:44%;font-size:25px;">No Entries Found</b>';
}
   }
$db->close();
 
   if($row_num!=0){
       
   }
   if(!isset($_SESSION["order"])){
       $_SESSION["order"]="name";
   }
   if($total>=1){
   echo "<b style='position:absolute;top:".($pos)."%;left:45%;'>||";
   for($i=1;$i<=$total;$i++){
       if($i==$row_num&&$i!=$total){
           echo '<div style="background:#311B92;width:25px;display:inline-block;" >&nbsp&nbsp<a href="search.php?q='.$_SESSION["q"].'&show='.$_SESSION["option"].'&order='.$_SESSION["order"].'&set='.$i.'" style="color:white;" >'.$i.'</a>&nbsp&nbsp</div>|';
       }else if($i==$row_num&&$i==$total){
           echo '<div style="background:#311B92;width:25px;display:inline-block;" >&nbsp&nbsp<a href="search.php?q='.$_SESSION["q"].'&show='.$_SESSION["option"].'&order='.$_SESSION["order"].'&set='.$i.'" style="color:white;" >'.$i.'</a>&nbsp&nbsp</div>';
       }
       else{
       if($i!=$total){echo '&nbsp&nbsp<a href="search.php?q='.$_SESSION["q"].'&show='.$_SESSION["option"].'&order='.$_SESSION["order"].'&set='.$i.'">'.$i.'</a>&nbsp&nbsp|';}
       else{
           echo '&nbsp&nbsp<a href="search.php?q='.$_SESSION["q"].'&show='.$_SESSION["option"].'&order='.$_SESSION["order"].'&set='.$i.'">'.$i.'</a>&nbsp&nbsp';
       }
       }
    }
    echo "||</b>";
   }
    include 'bottomborder.php';
    if($pos<60){$pos=60;}
    echo '<script>var d=document.getElementById("bt").style;
                d.position="absolute";
                d.top="'.($pos+20).'%";</script>';
    
        echo '</body></html>';