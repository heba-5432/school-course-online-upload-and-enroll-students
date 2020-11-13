<?php
 include_once("config.php");
if (isset($_GET["flid"])){
  $w1=$_GET["flid"];
$w2=$_GET["rol"];
  $w3=$_GET["sid"];
  $w4=$_GET["mmtid"];
  $df="DELETE FROM files WHERE fileid='$w1'";
  mysqli_query($conn,$df);
  header("location:coursdetail.php?sid=$w3&rol=$w2&mmtid=$w4");
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="magstyle.css" rel="stylesheet" type="text/css" />
    <style>
form{max-width: 70%;
	background: #FAFAFA;
	padding: 10px;
	margin-top: 5px auto;
	box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
	border-radius: 10px;
	border: 6px solid #305A72;
font-size: 14px;}
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
h3{font: normal 10px 'Bitter', serif;
	color: #2A88AD;
	margin-bottom: 3px;
text-decoration: underline;
font-weight: bold;
align="center" style="margin: 10px   ;
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
if(isset($_GET["sid"])){
$q1=$_GET["sid"];
$q2=$_GET["rol"];
$q3=$_GET["mmtid"];?>

<a class="btn" href="showmat.php?sid=<?php echo $q1?>&rol=<?php echo $q2?>">موادي الدراسيه</a><br>
  <form  class="formsel" action="coursdetail.php?sid=<?php echo $q1;?>&rol=<?php echo $q2;?>&mmtid=<?php echo $q3;?>" method="POST">



    <?php
    $q1=$_GET["sid"];
    $q2=$_GET["rol"];
    $qr=$_GET["mmtid"];?>

  <?php  if($q2=='2'||$q2=='3'){?>

  <input class="btn" name="partic" type="submit" value="المشتركون بالكورس">

    <?php
    if(isset($_POST["partic"])){
      include_once("config.php");
      $du="SELECT * from selection,stdnt,matrials WHERE stdnt.stdid=selection.partcpid and matrials.matid=selection.materid and selection.materid='2'";
  $f=mysqli_query($conn,$du);
       while($kh1=mysqli_fetch_assoc($f)){?>
         <li> <?php echo $kh1["stdname"];?></li>
      <?php ;}
    }?>
  <?php;}?>

<?php $b="SELECT * from matrials,files WHERE    matrials.matid=files.matidd and  matrials.matid='$q3'";
$b1=mysqli_query($conn,$b);
$e=mysqli_fetch_assoc($b1);
echo"<h1 style=\"color:red; font-size:35px;\">محتويات المقرر--".$e["matname"]."</h1>";
$i=0;
while($b2=mysqli_fetch_assoc($b1)){
  echo $i=$i+1;?>
<div style="color:green; font-size:10px;margin-right:450px;">
  <?php
  echo ":last updated";
  echo $b2["updatetime"];?></br></div>
<h1 style="color:brown; font-size:18px;margin-bottom: 10px;">
  <?php echo "<li>".$b2["shobaname"];
  echo "<li>".$b2["filname"]."----";
$z=pathinfo($b2["filename"]);
echo ($z['filename']).'.'.$z['extension'];// show namw in details ogf course?>
</h1>


<?PHP  $s=  $b2['fileid'];
?>
<a href="download.php?flid=<?php echo $s;?>&sid=<?php echo $q1?>&rol=<?php echo $q2?>">download</a>
<?PHP if($q2=='2'|| $q2=='3'){
echo"عدد مرات التحميل:".$b2["download"];?>
<div style=" font-size:18px;margin-right:250px; color:red;">
  <a href="coursdetail.php?flid=<?php echo $s;?>&sid=<?php echo $q1?>&rol=<?php echo $q2?>&mmtid=<?php echo $q3?>">حذف</a>
</div>
<?PHp;
}?>

<br>

----------------------------------------

<?php;}?>



<?php;}

     ?>
</form>









<?php include 'footer.php';?>
  </body>
</html>
