
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="magstyle.css" rel="stylesheet" type="text/css" />
    <style>
form{max-width: 70%;
	background: #FAFAFA;
	padding: 30px;
	margin-top: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
font-size: 18px;}
.table1{max-width: 90%;
	background: #FAFAFA;
	padding: 30px;
	margin-top: 50px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
font-size: 18px;}

.span1{margin-top:20px;}

.span2{margin-right:50px;

}
h3{font: normal 20px 'Bitter', serif;
	color: #2A88AD;
	margin-bottom: 5px;
text-decoration: underline;
font-weight: bold;
align="center" style="margin: 20px   ;
padding: 10px;
border-radius: 5px;
}
.span3{color:red;}


    </style>
  </head>
  <body>
    <?php include 'header.php';?><br><br>
  <?php include 'menu.php';?>
  <?php include 'showname.php';?>
  <br><br><br><br>
  <?php
  include_once("config.php");
  if (isset($_GET["sid"])) {


  $r1=$_GET["sid"];
  $r2=$_GET["rol"];
  $r3=$_GET["mttid"];
      session_start();
      $_SESSION['sid']=$r1;
      $_SESSION['rol']=$r2;
      $_SESSION['mttid']=$r3;
      $d3=$_SESSION['sid'];//id of student
      $d4=$_SESSION['rol'];
      $d5=$_SESSION['mttid'];


      $a1= "SELECT *FROM matrials WHERE matid= '$d5'";
      $a2=mysqli_query($conn,$a1);
      $a3=mysqli_fetch_assoc($a2);
      $g1= "SELECT *  from stdnt WHERE stdid='$d3'";
      $g2=mysqli_query($conn,$g1);
      $g3=mysqli_fetch_assoc($g2);}
       ?>

  <form action="course.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>&mttid=<?php echo $d5;?>" method="POST" enctype="multipart/form-data" >

<td>الاسم:<?php
echo $g3["stdname"];
?></td>
<td>اسم الماده : <?php echo $a3["matname"];?></td><br>
كود المقرر : <?php echo $a3["codenum"];?>

<input type="hidden" name="rll" value="<?php echo $d4;?>">
<input type="hidden" name="sd" value="<?php echo $d3;?>">
<input type="hidden" name="mmt" value="<?php echo $d5;?>">
<input type="hidden" name="lev" value="<?php echo $a3["levdpid"];?>">
<input class="btn" type="submit" name="reg" value="اشترك">

<?php  if (isset($_POST["reg"])){
$z1=$_POST["sd"];
$z2=$_POST["rll"];
$z3=$_POST["mmt"];
$z7=$_POST["lev"];

$h6="SELECT * from matrials,selection, stdnt where selection.materid=matrials.matid
 and selection.materid='$z3' and stdnt.stdid=selection.partcpid and selection.partcpid='$z1';
";
$h7=mysqli_query($conn,$h6);
$h8=mysqli_fetch_assoc($h7);

if ($z3== $h8["materid"] && $z1==$h8["partcpid"]){ echo "تم الاشتراك بالمقرر سابقا";?>
<a class="btn" href="reg-dplomst.php?sid=<?php echo $_POST["sd"];?>&rol=<?php echo $_POST["rll"];?>&mttid=<?php echo $_POST["mmt"];?>&lev=<?php echo $_POST["lev"];?>">رجوع</a>
 <?PHP }
else{
$z4="INSERT INTO selection( materid, partcpid,rrrol) VALUES('$z3','$z1','$z2')";
mysqli_query($conn,$z4);
header("location:reg-dplomst.php?sid=$z1&rol=$z2&mttid=$z3&lev=$z7");}}
?>
</form>

<?php include 'footer.php';?>
  </body>
</html>
