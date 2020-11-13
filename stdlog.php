<?php
include_once("config.php");
if (isset($_POST["check"])){
  $adm=$_POST["admin"];
  $pas=$_POST["passac"];
$q="SELECT * FROM stdnt WHERE stdnt.email='$adm' AND stdnt.password='$pas' ";
$f=mysqli_query($conn,$q);
$g = mysqli_fetch_assoc($f);
if ($adm == $g["email"] && $pas == $g["password"]){
//id of student from student table
  $s19=$g["stdid"];
  $s21=$g["rolid"];
session_start();
$s20=$_SESSION['sid']=$s19;
$s22=$_SESSION['rol']=$s21;
  header("location:showmat.php?sid=$s20&rol=$s21");}


else{ echo "<h3 style=\"margin: 50px auto ;
  padding: 10px;
  border-radius: 5px;
  color: #3c763d;
  background: #dff0d8;
  border: 1px solid #3c763d;
  width: 50%;
  text-align: center\">تم ادخال بيانات خاطئه <h3>";
}}

 ?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>access admin</title>
    <link href="magstyle.css" rel="stylesheet" type="text/css" />
    <style media="screen">
    .astyle{ style="margin: 50px auto ;font-size: 20px;
      padding: 10px;
      border-radius: 5px;
      color: #3c763d;
      background: #dff0d8;
      border: 1px solid #3c763d;
      width: 50px;
      text-align: center;}
      a:hover{ color: red;
      background: blue;}
    </style>
  </head>
  <body>
    <a class="astyle" href=accessadmin.php>admin</a>
        <a class="astyle" href=index.php>الصفحة الرئسية</a>

    <form class="form2login"  action="stdlog.php" method="POST">
      <h3>ادخل الايميل والباسوورد</h3>
      <h4> الايميل :<input type="text" name="admin" value=""></h4>
      <h4>  كلمة المرور:<input type="password" name="passac" value="" autocomplete="off"></h4>
      <input type="submit" name ="check" value="confirm"  float="left">

<br>

    </form>
<?php include 'footer.php';?>
    </body>
</html>
