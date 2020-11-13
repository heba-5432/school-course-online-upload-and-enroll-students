
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
  <form action="stdinfo.php" method="POST" enctype="multipart/form-data" >
    <?php
    include_once("config.php");


     ?>










<?php include 'footer.php';?>
  </body>
</html>
