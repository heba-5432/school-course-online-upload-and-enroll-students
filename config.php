<?php
$dbhost='localhost';
$dbname='cumsmatrl';
$dbusername='testuser';
$dbpassword='testpassword';
$conn=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
