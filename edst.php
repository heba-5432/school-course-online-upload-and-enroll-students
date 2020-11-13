<?php
include_once("config.php");
if(isset($_POST["add"])){
  $d0=$_POST["me0"];
  $d1=$_POST["me1"];

  $d4=$_POST["me4"];
  $d5=$_POST["me5"];

  $d8=$_POST["me8"];
  $d9=$_POST["me9"];
  $d11=$_POST["me10"];
  $d10=$_POST["me0"];
  $g="UPDATE stdnt SET stdname ='$d1',email='$d5',nid='$d8',regdate='$d9',password='$d11' WHERE stdid ='$d10';";
  mysqli_query($conn,$g);
  header("location:edst.php?sid=$d10&rol=$d4")
;}


if(isset($_GET["sid"])){
$mr=$_GET["sid"];
$mr1=$_GET["rol"];
$n5="SELECT * FROM stdnt where stdid='$mr'";
$n6=mysqli_query($conn,$n5);
$n4=mysqli_fetch_assoc($n6);

}
  ?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>تعديل بيانات </title>
      <link href="magstyle.css" rel="stylesheet" type="text/css" />
<style media="screen">
.form1{max-width: 70%;
  background: #FAFAFA;
  padding: 30px;
  margin-top: 50px auto;
  box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
  border-radius: 10px;
  border: 6px solid #305A72;
font-size: 18px;}
</style>

  </head>
  <body>

    <?php include 'header.php';?><br><br><br>
    <?php include 'menu.php';?><br><br><br><br>
<?php include 'showname.php';?>
    <form  class="form1" action="edst.php" method="POST">
      <input type="hidden" name="me0" value="<?php echo $n4["stdid"];?>">
    الاسم بالكامل:<input type="text" name="me1" value="<?php echo $n4["stdname"];?>">

    <input type="hidden" name="me4" value="<?php echo $n4["rolid"];?>"><br><br>
      البريد الالكترونى  <input type="text" name="me5" value="<?php echo $n4["email"];?>">

          الرقم القومى     <input type="text" name="me8" value="<?php echo $n4["nid"];?>">
              العام الدراسي للتسجيل   <input type="text" name="me9" value="<?php echo $n4["regdate"];?>"><br><br>
 الباسورد<input type="text" name="me10" value="<?php echo $n4["password"];?>">

              <input  class="btn" type="submit" name="add" value="تعديل البيانات">
  <?php
session_start();
$d3=$_SESSION['sid'];
$d4=$_SESSION['rol'];?>
<a href="reg-dplomst.php?sid=<?php echo $d3?>&rol=<?php echo $d4?>">لتسجيل مواد دراسيه</a>


</form>

  </body>
</html>
