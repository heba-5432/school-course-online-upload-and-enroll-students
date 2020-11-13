
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>طالب جديد</title>
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


    </style>
  </head>
  <body>
    <?php include 'header.php';?><br><br>
  <?php include 'menu.php';?>
  <br><br><br><br>
  <form action="newstud.php" method="POST" enctype="multipart/form-data" >
    <?php
    include_once("config.php");
    if (isset($_POST["add"])){

      $f1=$_POST["se1"];
      $f2=$_POST["se2"];
      $f3=$_POST["se3"];
      $f4=$_POST["se4"];
$f5=$_POST["se5"];
$f6=$_POST["se6"];

      if(empty($f1)){

      echo "<h4 style=\"
        padding: 10px;
        color: red;
        border: 0px solid #3c763d;
        width: 20%;
        text-align: center\";>ادخل اسم الطالب</h4>";}

    if(empty($f2)){

      echo "<h4 style=\"
        padding: 10px;
        color: red;
        border: 0px solid #3c763d;
        width: 20%;
        text-align: center\";>ادخل الايميل</h4>";}
        if ($f3==0) {echo"<h4 style=\"margin: 10px auto ;
            padding: 10px;
            color: red;
            border: 0px solid #3c763d;
            width: 20%;
            text-align: center\";>اختار role</h4>";}
            if (empty($f4)) {echo"<h4 style=\"margin: 10px auto ;
              padding: 10px;
              color: red;
              border: 0px solid #3c763d;
              width: 20%;
              text-align: center\";>ادخل الباسورد</h4>";}

           else{
             $ins="INSERT INTO stdnt(stdname, email, rolid, password,nid,regdate )VALUES ('$f1', '$f2','$f3', '$f4','$f5','$f6')";
     mysqli_query($conn,$ins);
     echo"<h4 style=\"margin: 10px auto ;
       padding: 10px;
       color: red;
       border: 0px solid #3c763d;
       width: 20%;
       text-align: center\";>تم الحفظ بنجاح";
  }
}

    ?>
<h3>تسجيل بيانات </h3>
<br></br>
<div ><li>
الاسم بالعربية:<input type="text" name="se1"  ><span  style="color:red;">حقول اجباريه</span><br><br>


<li><span class="span1">Email/البريد الكترونى: <input type="email" name="se2" /></span><span style="color:red;">حقول اجباريه</span>

 <li><span class="span1">role: <input type="text" name="se3" /></span>
</span><span  style="color:red;">حقول اجباريه</span><br><br>
<li><span class="span1">الرقم القومى: <input type="text" name="se5" /></span>
</span><span  style="color:red;">حقول اجباريه</span><br><br>
<li><span class="span1">العام الجامعى: <input type="text" name="se6" /></span>
</span><span  style="color:red;">حقول اجباريه</span><br><br>

<br><br><li><span class="span1">الباسوورد <input type="text" name="se4" autocomplete="off"/></span>
</div>
  <div class="btn">
   <input type="submit" name="add" value="save">
  </div>
  </form>
<?php include 'footer.php';?>
  </body>
</html>
