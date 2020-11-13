<?php
include_once("config.php");
if(isset($_GET["sid"])){


    if(empty($_GET["sid"])){
      header("location:stdlog.php");
    }  
    $mr=$_GET["sid"];
    $mr1=$_GET["rol"];
    $n5="SELECT * FROM stdnt where stdid='$mr'";
    $n6=mysqli_query($conn,$n5);
    $n4=mysqli_fetch_assoc($n6);


   echo "<h2 align=\"right\" color:\"blue\">". "مرحبا:".$n4["stdname"]."</h2>";}


?>
