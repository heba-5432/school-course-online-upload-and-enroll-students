<?php

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>مرحله جديده</title>
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
.table1{width: 90%;
  background: #FAFAFA;
  padding: 10px;
  margin-top: 20px auto;
  box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
  border-radius: 10px;
  border: 6px solid #305A72;
font-size: 18px;}

    </style>
  </head>
  <body>
    <?php include 'header.php';?><br><br>
  <?php include 'menuadmin.php';?>
  <br><br><br><br>
  <form action="newdplom.php" method="POST" enctype="multipart/form-data" >
    <?php
include_once("config.php");
     if (isset($_POST["add"])){
       if($_post["add"]==" "){
       header("Location: newdplom.php");}

       //recieve value from
       $fm=$_POST["mtrnm"];

 $dtr=$_POST["trd"];
 $d02=$_POST["s1"];
    if (empty($fm)){echo "<a style=\"color:red;\">"."ادخل اسم المرحله"."</a>";

    }

     else{
     $inscl="INSERT INTO stage(stagnam ) VALUES  ('$fm')";
    mysqli_query($conn,$inscl);
    echo "تم الحفظ بنجاح"." ";}}
    if (isset($_POST["add1"])){
      if($_post["add1"]==" "){
      header("Location: newdplom.php");}
      $dtr=$_POST["trd"];
      $d02=$_POST["s1"];
    if ($d02==0){echo "<a style=\"color:red;\">"."اختار المرحله"."</a>";
    echo "----";
    }
    if (empty($dtr)){echo "<a style=\"color:red;\">"."ادخل القسم او الشعبه"."</a>";
    echo "----";
    }
     else{
     $inss="INSERT INTO section(sectname,stgid ) VALUES  ('$dtr',$d02)";
    mysqli_query($conn,$inss);
    echo "تم التخزين بنجاح"." ";
  }}
if (isset($_POST["add1"])){
      if($_post["add1"]==" "){
      header("Location: newdplom.php");}
      $dt01=$_POST["t01"];
      $d03=$_POST["l1"];
 if ($d03==0){echo "<a style=\"color:red;\">"."اختار قسم "."</a>";
    echo "----";
    }
    if (empty($dt01)){echo "<a style=\"color:red;\">"."ادخل المستوي"."</a>";
    echo "----";
    }
     else{
     $inss="INSERT INTO level(levname,scid ) VALUES ('$d03','$dt01')";
    mysqli_query($conn,$inss);
    echo "تم التخزين بنجاح"." ";
  }}
  if (isset($_POST["add2"])){
        if($_post["add2"]==" "){
        header("Location: newdplom.php");}
        $l02=$_POST["l01"];//level id
        $w03=$_POST["w1"];//department id
        $w04=$_POST["z1"];//termnumber

    /*  if ($w04==0){echo "<a style=\"color:red;\">"."ادخل القسم"."</a>";
      echo "----";
    }*/

       $inssw="INSERT INTO levdep(lvid,dptid,trmid ) VALUES ('$l02','$w03','$w04')";
      mysqli_query($conn,$inssw);
    

}
//-----------------
//new term
if (isset($_POST["add1"])){
      if($_post["add1"]==" "){
      header("Location: newdplom.php");}

      $a1=$_POST["tr"];

    if (empty($a1)){echo "<a style=\"color:red;\">"."ادخل الفصل الدراسي"."</a>";
    echo "----";
    }
else{
$in="INSERT INTO termnum(termname) VALUES ('$a1')";
mysqli_query($conn,$in);
echo "تم التخزين بنجاح"." ";
}}
$in1= "SELECT * FROM level";
  $in3=mysqli_query($conn,$in1);
  $x1= "SELECT * FROM termnum";
    $x2=mysqli_query($conn,$x1);
//----------------
  $sel= "SELECT * FROM stage ";
    $d2 =mysqli_query($conn,$sel);
    $sel1= "SELECT * FROM section,stage where stage.stagid=section.stgid   ";
      $d21 =mysqli_query($conn,$sel1);
//to show material
$se= "SELECT * FROM section,stage,level where level.stgid=section.sectid and stage.stagid=section.stgid ";
  $dt2 =mysqli_query($conn,$se);

    $sed= "SELECT * FROM department";
      $wd2 =mysqli_query($conn,$sed);
     ?>



   <h3>تسجيل مرحله جديدة</h3>

           <label>اسم المرحلة:<input type="text" name="mtrnm"><label>

      <input class="btn" type="submit" name="add" value="save">
<h3>تسجيل قسم او شعبه جديده</h3>
  <select name="s1">
      <option>  اختار المرحله:<option>
        <?php while($d22=mysqli_fetch_assoc($d2)){?>
          <option value="<?php echo $d22["stagid"]; ?>"><?php echo $d22["stagnam"]; ?><option>
            <?;}?>
            <select>
            ادخل القسم- الشعبة جديدة  <input  type="text" name="trd" value="">
      <input class="btn" type="submit" name="add1" value="save">
<br>
<h3>تسجيل مستوي جديد</h3>
  <select name="t01">
      <option>  اختار القسم او الشعبه:<option>
        <?php while($d22=mysqli_fetch_assoc($d21)){?>
          <option value="<?php echo $d22["sectid"]; ?>"><?php echo $d22["sectname"]; ?><option>
            <?;}?>
            <select>
            ادخل المستوي <input  type="text" name="l1" value="">
      <input class="btn" type="submit" name="add1" value="save">
      <h3>تسجيل قسم جديد</h3>
        <select name="l01">
            <option>اختار المستوي:<option>
              <?php while($in4=mysqli_fetch_assoc($in3)){?>
                <option value="<?php echo $in4["levid"];?>"<?php if(isset($_POST['l01']) && $_POST['l01'] == $in4["levid"])
            echo ' selected="selected"';?>><?php echo $in4["levname"]; ?><option>
                  <?;}?>
                  <select>

                                <select name="w1">
                                    <option>اختار القسم:<option>
                                      <?php while($w22d=mysqli_fetch_assoc($wd2)){?>
                                        <option value="<?php echo $w22d["deptid"]; ?>"<?php if(isset($_POST['w1']) && $_POST['w1'] == $w22d["deptid"])
                                    echo ' selected="selected"';?>>><?php echo $w22d["depname"];?><option>
                                          <?;}?>
                                          <select>
                                            <select name="z1">
                                                <option>اختر الفصل الدراسي:<option>
                                                  <?php while($x3=mysqli_fetch_assoc($x2)){?>
                                                    <option value="<?php echo $x3["trnmid"]; ?>""<?php if(isset($_POST['z1']) && $_POST['z1'] == $x3["trnmid"])
                                                echo ' selected="selected"';?>><?php echo $x3["termname"]; ?><option>
                                                      <?;}?>
                                                      <select>
            <input class="btn" type="submit" name="add2" value="save">
<h3>تسجيل فصل دراسي</h3>
اسم الفصل الدراسي:<input type="text" name="tr" value="">
  <input class="btn" type="submit" name="add1" value="save">
     <?php
     /*include_once("config.php");
     $num ="SELECT COUNT(*)	stagnam  FROM stage ";
     $num2= mysqli_query($conn,$num);
     $num3=mysqli_fetch_assoc($num2);
     echo "<a style=\"margin:50px auto ;
       padding: 10px;
       border-radius: 5px;
       color: black;
       background: #dff0d8;
       border: 0px solid #3c763d;
       width:30%;\">\"عدد  المراحل :\" </a>";
       echo $num3["	stagnam"];*/
      ?><br><br>
<table class="table1" table border="1px">

<tr>
<th>رقم المرحله</th>
<th>اسم المرحله</th>
<th colspan="2">update</th>
</tr>
<?php   $i=0;
while($d3 =mysqli_fetch_assoc($d2)){
$i=$i+1;
?>


<tr><td><?PHP echo $i;?></td>
<td><?php echo $d3["stagnam"];?></td>
<td><a href="ed_dpnm.php?deid=<?php echo $d3["stagid "] ;?>">تعديل الاسم</a></td>
</tr>
<?php ;}?>
</table>
<table class="table1" table border="1px">

<tr>
<th>رقم القسم-الشعبه </th>
<th>اسم المرحله</th>
<th>اسم القسم الشعبه</th>
<th>اسم المستوي<th>
<th colspan="2">update</th>
</tr>
<?php   $i=0;
while($dt3 =mysqli_fetch_assoc($dt2)){
$i=$i+1;
?>


<tr><td><?PHP echo $i;?></td>
  <td><?php echo $dt3["stagnam"];?></td>
<td><?php echo $dt3["sectname"];?></td>
<td><?php echo $dt3["levname"];?></td>
<td><a href="ed_dpnm.php?reid=<?php echo $dt3["sectid "] ;?>">تعديل الاسم</a></td>
</tr>
<?php ;}?>
</table>

</form>

  </body>

</html>
