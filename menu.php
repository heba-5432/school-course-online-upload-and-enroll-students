<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link href="magstyle.css" rel="stylesheet" type="text/css" />
      <style media="screen">
      .dropbtn {
        background-color: #F4F7FB;
        color: #627EB7;
        padding: 13px;
        font-size: 14px;
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
        min-width: 100px;
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

      .dropdown:hover .dropbtn {background-color: red;}

      </style>
  </head>
  <body>

    <div id="tabs">
  <ul>
    <li><a href="index.php"><span>الرئسيه</span></a></li>
    <li><a href="accessadmin.php"><span>الادارة</span></a></li>
    <li><a href="newstud.php"><span>طالب جديد</span></a></li>

<li><a href="stdlog.php"><span>لتعديل البيانات (خاص بالطلاب, تسجيل المواد)</span></a></li>

    </ul>



  </div>
  </body>
</html>
