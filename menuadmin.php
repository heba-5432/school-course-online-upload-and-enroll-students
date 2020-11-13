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
        font-size: 16px;font-weight: bold;
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
        font-size: 16px;font-weight: bold;
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
    <div class="dropdown">
    <button  class="dropbtn">لطباعه  كشوف الطلاب اختر</button>
    <div  class="dropdown-content">
      <a href="exportstudentassign.php">طباعه كشف  لرصد التكليفات</a>
        <a href="exportstudent.php">لطباعه كشف توقيع الطلاب بالامتحان</a>
      <a href="exportstudenthang.php">لطباعه كشف لتعليق على القاعات الامتحان</a>
</div>
</div>

<div class="dropdown">
<button  class="dropbtn">لتسجيل الطلاب(موظف)</button>
<div  class="dropdown-content">
  <a href="newstudemp.php"><span>طالب جديد(موظف)</span></a>
  <a href="stdinfo.php"><span>بيانات الطلاب ,وتسجيل المواد لكل طالب</span></a>
  <a href="newdplom.php"><span>مرحلة وقسم جديد</span></a>
<a href="newmat.php"><span>ماده جديده</span></a>
<a href="reg-dplom.php"><span>لتسجيل مواد الدبلومه</span></a>
<a href="sh-stmatfremptest.php"><span>عرض الطلاب المسجلين بالدبلومه</span></a>
<a href="yearexamdt.php"><span>دور الامتحان</span></a>
<a href="seatnumberadd.php"><span>ادخال ارقام الجلوس</span></a>
<a href="trmnumfrgrdution.php"><span>للنتيجة التراكميه دور الترم بالتاريخ</span></a>
<a href="baian.php"><span>بيان حاله</span></a>
<a href="care.php"><span>لمن يهمه الامر</span></a>
</div>
</div>
<div class="dropdown">
<button  class="dropbtn">لتسجيل الطلاب(طالب)</button>
<div  class="dropdown-content">

  <a href="newstud.php"><span>طالب جديد</span></a>
  <a href="stdinfo.php"><span>بيانات الطلاب ,وتسجيل المواد لكل طالب</span></a>

<a href="stdlog.php"><span>لتعديل البيانات (خاص بالطلاب, تسجيل المواد)</span></a>

</div>
</div>
<div class="dropdown">
<button  class="dropbtn">اوراق الامتحان والباركود</button>
<div  class="dropdown-content">
  <a href="se-expapr-brcode.php"><span>بيانات الطلاب بالبركود ورقه الامتحان</span></a>
  <a href="yearworkout.php"><span>عرض او ادخال درجات اعمال السنه</span></a>
  <a href="exampaperbymaterials.php"><span>طباعه ارراق الامتحان الماده مجمعه</span></a>
<?php//<a href="commmatentag.php"><span>موا د كل طالب لدبلومه الانتاج</span></a>?>
</div>
</div>
<div class="dropdown">
<button  class="dropbtn">لرصد النتيجه</button>
<div  class="dropdown-content">

  <a href="yearworkout.php"><span>عرض او ادخال درجات اعمال السنه</span></a>
  <a href="resultnew.php"><span>رصد النتيجه بالباركود</span></a>
<a href="acess2.php"><span>لعرض  بيانات الطلاب للنتيجه</span></a>
</div>
</div><!print result>
<?PHP
/*<div class="dropdown">
  <button class="dropbtn">لطباعه  نتيجه  دبلومه الانتاج التلفزيونى</button>
  <div class="dropdown-content">
    <a  href="resultdataex.php">لطباعه النتيجه بالماده</a>
    <a  href="totalprintresultentag.php">لطباعه النتيجه الاجماليه لدبلومه الانتاج  للترم بالدرجات</a>
  <a  href="  totalprintresulttqderentg.php">طباعه النتيجة الاجماليه الانتاج بالتقدير </a>
    <a  href="totalprintresult4entg.php">لطباعه النتيجه التراكمية للترم الاول والثانى لدبلومه الانتاج بالدرجات</a>
          <a  href="totalprintresult4entgtqd.php">لطباعه النتيجه التراكمية للترم التانى بالتقدير</a>


</div></div>
<div class="dropdown">
  <button class="dropbtn">لطباعه نتيجه دبلوم الاتصال السياسي</button>
  <div class="dropdown-content">
    <a  href="resultdataex.php">لطباعه النتيجه بالماده</a>
    <a  href="totalprintresultcomm1.php">لطباعه النتيجه الاجماليه الاتصال السياسي عام الاول بالدرجات </a>
  <a  href="  totalprintresulttqdercomm1.php">لطباعه النتيجه الاجماليه الاتصال السياسي عام الاول بالتقدير </a>
  <a  href="totalprintresultcomm2.php">لطباعه النتيجه الاجماليه الاتصال السياسي عام الثانى بالدرجات</a>
<a  href="  totalprintresulttqdercomm2.php">لطباعه النتيجه الاجماليه ماجستيرالاتصال السياسي عام الثانى بالتقدير</a>
    <a  href="totalprintresult4comm.php">لطباعه النتيجه التراكمية للعامين دبلومه الاتصال بالدرجات</a>
          <a  href="totalprintresult4tqcomm.php">لطباعه النتيجه التراكمية للعامين بالتقدير اتصال</a>


</div></div>
<div class="dropdown">
  <button class="dropbtn">لطباعه كشف بالمواد خاص بالطلاب</button>
  <div class="dropdown-content">
    <a  href="totalprintresultentag2.php">لطباعه النتيجه الاجماليه لدبلومه الانتاج  للترم </a>
    <a  href="totalprintresultcomm12.php">لطباعه النتيجه الاجماليه الاتصال السياسي عام الاول  </a>

  <a  href="totalprintresultcomm22.php">لطباعه النتيجه الاجماليه ماجستير الاتصال السياسي عام الثانى</a>



</div></div>*/?>
    <div id="tabs">
  <ul>

    <li><a href="administ.php"><span>الاداره</span></a></li>
    <li><a href="index.php"><span>خروج</span></a></li>

    </ul>
  </div>
  </body>
</html>
