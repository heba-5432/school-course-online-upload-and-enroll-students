<?php
if(isset($_GET["sid"])){
  if(empty($_GET["sid"])){
    header("location:stdlog.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>اختيار المرحله</title>
      <link href="magstyle.css" rel="stylesheet" type="text/css" />
    <style>
    .dropbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}
    th{background:navy;
    color:white; }
    a:hover{color: blue;
    background: red;}
    .formst{margin: 10px auto ;
      padding: 20px;
      border-radius: 5px;
      color: blue;
      background: #dff0d8;
      border: 1px solid #3c763d;
      width:90%;
      text-align: center;}
    .astyle{  background-color:#3e8e41;
      color: white;
      padding: 5px;
      font-size: 16px;
      border: 1px;}


  select{
  font-size: 14px;
  margin: 20px auto ;
  padding: 5px;
  border-radius: 5px;
  color: white;
  background: purple;
  border: 1px solid #3c763d;
  width: 10%;
  text-align: center;
  }


    </style>
  </head>
  <body>
    <?php include 'header.php';?><br><br>
  <?php include 'menu.php';?>
  <?php include 'showname.php';?>
  <br>

<a class="astyle"  href="showmat.php?sid=<?php echo $mr;?>&rol=<?php echo $mr1;?>">عرض موادك الدراسيه</a>

      <a  class="astyle" href=index.php>خروج</a>


    <br>
    <?php
    include_once("config.php");

      $s9=$_POST["dpch"];//stage
    $tm=$_POST["dm1"];//section
      $t="SELECT * FROM stage";
      $t2=mysqli_query($conn,$t);

      //show only material of choosen deploma


  /*  if (isset($_POST["dpch"])){
      session_start();
      $_SESSION['tm']=$tm;//choose term
      $v1=$_SESSION['tm'];
      $_SESSION['s9']=$s9;
      $s8=$_SESSION['s9'];// id of deploma*/

$r1=$_GET["sid"];
$r2=$_GET["rol"];

    session_start();
    $_SESSION['sid']=$r1;
    $_SESSION['rol']=$r2;
    $d3=$_SESSION['sid'];//id of student
    $d4=$_SESSION['rol'];
      //  header("location:sh-stmat.php?dpid=$s8&sid=$d3&trm=$v1&rol=$d4");}

    ?>
    <form class="formsel" action="reg-dplomst.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>" method="POST">
    البحث باسم المقرر-كود المقرر: <input type="text" name="srch" value="">
    <input class="btn" type="submit" name="search" value="بحث"><a  href="reg-dplomst.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>">refresh</a>
    <?php //search for material
    if(isset($_POST["search"])){
      $c=$_POST["srch"];
    $eq1="SELECT * from matrials,stdnt,selection,levdep,section,stage,department,level,termnum
     WHERE matrials.levdpid=levdep.levdepid and stdnt.stdid=selection.partcpid AND
      section.sectid=level.scid and stage.stagid=section.stgid and
      level.levid=levdep.lvid and termnum.trnmid=levdep.trmid and department.deptid=levdep.dptid
    and matrials.matid=selection.materid AND(matrials.matname like '%$c%'|| matrials.codenum like'%$c%')";
    $q32=mysqli_query($conn,$eq1);?>
    <table border="1px">
      <th>الرقم</th>
      <th>المرحله</th>
      <th> الشعبه</th>
      <th> المستوي</th>
      <th> القسم</th>
      <th> الفصل الدراسي</th>
      <th> كود المقرر</th>
      <th>المقرر </th>
    <th>تسجيل</th>
    <?php $i=0;
    while( $p2=mysqli_fetch_assoc($q32)){?>
    <tr>
    <td> <?php echo $i=$i+1 ;?></td>
    <td>  <?php echo $p2["stagnam"];?> </td>
    <td>  <?php echo $p2["sectname"];?> </td>
    <td>  <?php echo $p2["levname"];?> </td>
    <td>  <?php echo $p2["depname"];?> </td>
    <td>  <?php echo $p2["termname"];?> </td>
    <td>  <?php echo $p2["codenum"];?> </td>
    <td>  <?php echo $p2["matname"];?> </td>
    <td><a href="course.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>&mttid=<?php echo $p2["matid"];?>">للاشتراك</a><td>
      <?php if($d4=='2'||$d4=='3'){?>
                <td ><a href="files_upload.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>&mttid=<?php echo $p2["matid"];?>&code=<?Php echo $p2["codenum"];?>">لتحميل  المفات الدراسيه للمقرر</td>

                <?php;}?>
    </tr>
    <?php;}?>
    </table><?php;
    }
    ?>
  </form>

    <form class="formsel" action="reg-dplomst.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>" method="POST"  enctype="multipart/form-data" >


      <select  name="dpch">
        <option>اختر االمرحله</option>
        <?php while($t3=mysqli_fetch_assoc($t2)){ ?>
        <option value="<?php echo $t3["stagid"];?>"<?php if(isset($_POST['dpch']) && $_POST['dpch'] == $t3["stagid"])
              echo 'selected="selected"';?>><?php echo $t3["stagnam"];?></option>
        <?php ;} ?>
      </select>
      <input class="btn" type="submit" name="add" value="go"><?php
      if(isset($_GET["lev"])){ // after regiter and return for the saame level
      echo"<h3>تم الاشتراك بنجاح</h3>";
        $n=$_GET["lev"];
        $wq2="SELECT * from matrials,stdnt,selection,levdep,section,stage,department,level,termnum
             WHERE matrials.levdpid=levdep.levdepid and stdnt.stdid=selection.partcpid AND
              section.sectid=level.scid and stage.stagid=section.stgid and
              level.levid=levdep.lvid and termnum.trnmid=levdep.trmid and department.deptid=levdep.dptid
            and matrials.matid=selection.materid AND   matrials.levdpid='$n' ";
        $q31=mysqli_query($conn,$wq2);?>


       <table border="1px">
         <th>الرقم</th>
         <th>المرحله</th>
         <th> الشعبه</th>
         <th> المستوي</th>
         <th> القسم</th>
         <th> الفصل الدراسي</th>
         <th> كود المقرر</th>
         <th>المقرر </th>
       <th>تسجيل</th>
       <?php $i=0;
       while( $p2=mysqli_fetch_assoc($q31)){?>
       <tr>
       <td> <?php echo $i=$i+1 ;?></td>
       <td>  <?php echo $p2["stagnam"];?> </td>
       <td>  <?php echo $p2["sectname"];?> </td>
       <td>  <?php echo $p2["levname"];?> </td>
       <td>  <?php echo $p2["depname"];?> </td>
       <td>  <?php echo $p2["termname"];?> </td>
       <td>  <?php echo $p2["codenum"];?> </td>
       <td>  <?php echo $p2["matname"];?> </td>
       <td><a href="course.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>&mttid=<?php echo $p2["matid"];?>
         ">للاشتراك</a><td>
           <?php if($d4=='2'||$d4=='3'){?>
                     <td ><a href="files_upload.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>&mttid=<?php echo $p2["matid"];?>&code=<?Php echo $p2["codenum"];?>">لتحميل  المفات الدراسيه للمقرر</td>

                     <?php;}?>
       </tr>
       <?php;}?>
     </table><?php; }?>


<?php if (isset($_POST["add"])){
  $s9=$_POST["dpch"];// choose material to register or to upload

$h="SELECT * FROM section,stage where stage.stagid=section.stgid and section.stgid='$s9'";//number of term
$h2=mysqli_query($conn,$h);
?>

<select  name="dm1">
          <option>القسم-الشعبه</option>
        <?php  while($h3=mysqli_fetch_assoc($h2)){?>
          <option value="<?php echo $h3["sectid"];?>"><?php echo $h3["sectname"];?></option>
          <?php ;} ?>
        </select>
    <input class="btn" type="submit" name="add2" value="add"><?php;}?>
    <br><?php if (isset($_POST["add2"])){
    $m1=$_POST["dm1"];//section
      $z1="SELECT * FROM section,level where section.sectid=level.scid and level.scid='$m1'";//number of term
      $z2=mysqli_query($conn,$z1);
      $e21="SELECT * FROM department";//number of term
      $e3=mysqli_query($conn,$e21);
      $y4="SELECT * FROM termnum";//number of term
      $y4=mysqli_query($conn,$y4);
    ?>
   <select name="dm3">
            <option>اختر مستوي</option>
          <?php  while($z3=mysqli_fetch_assoc($z2)){?>
            <option value="<?php echo $z3["levid"];?>"<?php if(isset($_POST['dm3']) && $_POST['dm3'] == $z3["levid"])
                  echo 'selected="selected"';?>><?php echo $z3["levname"];?></option>
            <?php ;} ?>
          </select>
          <select name="dm12">
                   <option>اخترالفصل الدراسي</option>
                 <?php  while($y5=mysqli_fetch_assoc($y4)){?>
                   <option value="<?php echo $y5["trnmid"];?>"<?php if(isset($_POST['dm12']) && $_POST['dm12'] == $t3["trnmid"])
                         echo 'selected="selected"';?>><?php echo $y5["termname"];?></option>
                   <?php ;} ?>

                 </select>
                 <select name="dm11">
                          <option>اخترالقسم</option>
                        <?php  while($e4=mysqli_fetch_assoc($e3)){?>

                          <option value="<?php echo $e4["deptid"];?>"<?php if(isset($_POST['dm11']) && $_POST['dm11'] == $e4["deptid"])
                                echo 'selected="selected"';?>><?php echo $e4["depname"];?></option>
                          <?php ;} ?>
                        </select>
          <input class="btn" type="submit" name="shmat" value="عرض المواد للاشتراك بها">
<?php if($d4=='2'||$d4=='3'){?>
          <input class="btn" type="submit" name="add3" value="لتحميل مقرر جديد">
          <?php;}}?>

<?php
if (isset($_POST["shmat"])){
  $q1=$_POST["dm3"];
$dw1=$_POST["dm11"];
$dw3=$_POST["dm12"];
         $wq2="SELECT * from levdep
          WHERE dptid='$dw1' and trmid='$dw3' and lvid='$q1'  ";
         $q31=mysqli_query($conn,$wq2);
      $g7  = mysqli_fetch_assoc($q31);
      $v= $g7["levdepid"];

  $g10=  "SELECT * from matrials,stdnt,selection,levdep,section,stage,department,level,termnum
       WHERE matrials.levdpid=levdep.levdepid and stdnt.stdid=selection.partcpid AND
        section.sectid=level.scid and stage.stagid=section.stgid and
        level.levid=levdep.lvid and termnum.trnmid=levdep.trmid and department.deptid=levdep.dptid
      and matrials.matid=selection.materid AND matrials.levdpid='$v'";
      $g11=mysqli_query($conn,$g10);

?>

<table border="1px">
  <th>الرقم</th>
  <th>المرحله</th>
  <th> الشعبه</th>
  <th> المستوي</th>
  <th> القسم</th>
  <th> الفصل الدراسي</th>
  <th> كود المقرر</th>
  <th>المقرر </th>
<th>تسجيل</th>

<?php $i=0;
 while( $p2=mysqli_fetch_assoc($g11)){?>
  <tr>
<td> <?php echo $i=$i+1 ;?></td>

<td>  <?php echo $p2["stagnam"];?> </td>
<td>  <?php echo $p2["sectname"];?> </td>
<td>  <?php echo $p2["levname"];?> </td>
<td>  <?php echo $p2["depname"];?> </td>
<td>  <?php echo $p2["termname"];?> </td>
<td>  <?php echo $p2["codenum"];?> </td>
<td>  <?php echo $p2["matname"];?> </td><td><a href="course.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>&mttid=<?php echo $p2["matid"];?>">للاشتراك</a><td>
  <?php if($d4=='2'||$d4=='3'){?>
            <td ><a href="files_upload.php?sid=<?php echo $d3;?>&rol=<?php echo $d4;?>&mttid=<?php echo $p2["matid"];?>&code=<?Php echo $p2["codenum"];?>">لتحميل  المفات الدراسيه للمقرر</td>

            <?php;}?>
</tr>
  <?php;}?>
</table>
<?php;}?>

<?php

           if (isset($_POST["add3"])){
if ($d4 =='2' || $d4=='3'){
            $q1=$_POST["dm3"];

          $dw1=$_POST["dm11"];
          $dw3=$_POST["dm12"];
                   $wq2="SELECT * from levdep ,selection WHERE dptid='$dw1' and trmid='$dw3' and lvid='$q1'";
                   $q31=mysqli_query($conn,$wq2);
                 $p2=mysqli_fetch_assoc($q31);

          //  if($p2["trmid"]!=0 && $p2["dptid"]!=0){

         echo $p2["levdepid"];?>

           <input type="text" name="mt1" value="<?php echo $p2["levdepid"];?>">

اسم المادة:<input type="text" name="mt2" value="">
كود المقرر:<input type="text" name="mt3" value="">

<input type="hidden" name="mt4" value="<?php echo $d3;?>">
<input type="hidden" name="mt5" value="<?php echo $d4;?>">
<input class="btn" type="submit" name="insert" value="next"><?php;}
else {echo "ليس لديك صلاحيه لاضافه مقررات قم بالتواصل مع IT admin";}}//role id =1 student
?>
<?php
if(isset($_POST["insert"])){
  $hy1=$_POST["mt1"];
  $hy2=$_POST["mt2"];
  $hy3=$_POST["mt3"];
  $hy4=$_POST["mt4"];
  $hy5=$_POST["mt5"];
  $h6="SELECT * from matrials where codenum='$hy3'";
$h7=mysqli_query($conn,$h6);
$h8=mysqli_fetch_assoc($h7);
if(empty($hy3))
  { echo "<span style=\"color:red;\">ادخل كود المقرر</span>";?>
    <input type="hidden" name="mt1" value="<?php echo $p2["levdepid"];?>">

   اسم المادة:<input type="text" name="mt2" value="">
   كود المقرر:<input type="text" name="mt3" value="">

   <input type="hidden" name="mt4" value="<?php echo $d3;?>">
   <input type="hidden" name="mt5" value="<?php echo $d4;?>">
   <input class="btn" type="submit" name="insert" value="next">
<?php;}
elseif ($hy3== $h8["codenum"]){ echo "المقرر موجود - قم بتحميل الملف مباشره";
  echo "<span style=\"color:red;\">كود المقرر:</span>" .$h8["codenum"]; echo "<span style=\"color:red;\">اسم المقرر:</span>".$h8["matname"]; ?>
  <a href="files_upload.php?sid=<?php echo $hy4; ?>&rol=<?php echo $hy5;?>&mttid=<?php echo $h8["matid"];?>&code=<?Php echo $h8["codenum"];?>">اضافه محتوي دراسي من ملفات</a>
<?php
}
elseif(empty($hy2)){ echo "<span style=\"color:red;\">ادخل اسم المقرر</span>";?>
  <input type="hidden" name="mt1" value="<?php echo $p2["levdepid"];?>">

 اسم المادة:<input type="text" name="mt2" value="">
 كود المقرر:<input type="text" name="mt3" value="">

 <input type="hidden" name="mt4" value="<?php echo $d3;?>">
 <input type="hidden" name="mt5" value="<?php echo $d4;?>">
 <input class="btn" type="submit" name="insert" value="next">

<?php;}

else {
  $h9="INSERT INTO matrials(levdpid, matname,codenum)  VALUES('$hy1','$hy2','$hy3')";
  mysqli_query($conn,$h9);
  echo "تم الحفظ بنجاح";
  $h10="SELECT* from matrials WHERE codenum='$hy3'";
  $h11=mysqli_query($conn,$h10);
  $h12=mysqli_fetch_assoc($h11);
echo  $h13=$h12["matid"];
  $z4="INSERT INTO selection( materid, partcpid, rrrol) VALUES('$h13','$hy4','$hy5')";//register admin with mat
  mysqli_query($conn,$z4);?>
  <a class="btn" href="files_upload.php?sid=<?php echo $hy4; ?>&rol=<?php echo $hy5;?>&mttid=<?php  echo $h13;?>&code=<?Php echo $h12["codenum"];?>">تحميل الملفات المقرر</a>;
<?php;}}

?>
    </form>

    <?php include 'footer.php';?>
  </body>
</html>
