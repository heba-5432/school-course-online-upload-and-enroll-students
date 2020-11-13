<?php
include_once("config.php");

if(isset($_GET["sel"])){
  $dlsel=$_GET["sel"];
  $f=$_GET["sid"];
  $r=$_GET["rol"];
  $df="DELETE FROM selection WHERE selid='$dlsel'";
  mysqli_query($conn,$df);
  header("location:showmat.php?sid=$f&rol=$r");
}
  ?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>المواد الدراسيه المشترك بها</title>
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
    <?if (isset($_GET["sid"])){
    $q1=$_GET["sid"];
  $q2=$_GET["rol"];}?>
    <form  class="form1" action="showmat.php?sid=<?php echo $q1;?>&rol=<?php echo $q2;?>" method="POST">
       <?php if (isset($_GET["sid"])){
        $q1=$_GET["sid"];
      $q2=$_GET["rol"];

               $wq2="SELECT * from matrials,stdnt,selection,levdep,section,stage,department,level,termnum
                WHERE matrials.levdpid=levdep.levdepid and stdnt.stdid=selection.partcpid AND
                 section.sectid=level.scid and stage.stagid=section.stgid and
                 level.levid=levdep.lvid and termnum.trnmid=levdep.trmid and department.deptid=levdep.dptid
               and matrials.matid=selection.materid and selection.partcpid='$q1'";
               $n5=mysqli_query($conn,$wq2);
              ;
      ?>

      <table border="1px">
        <th></th>
<th>المرحله</th>
<th> الشعبه</th>
<th> المستوي</th>
<th> القسم</th>
<th> الفصل الدراسي</th>
<th> كود المقرر</th>
<th>المقرر </th>
<th>action</th>
<?Php $i=0;
while($n6=mysqli_fetch_assoc($n5)){?>
<tr><td><?php echo $i=$i+1;?></td>
  <td>  <?php echo $n6["stagnam"];?> </td>
  <td>  <?php echo $n6["sectname"];?> </td>
  <td>  <?php echo $n6["levname"];?> </td>
  <td>  <?php echo $n6["depname"];?> </td>
  <td>  <?php echo $n6["termname"];?> </td>
  <td>  <?php echo $n6["codenum"];?> </td>
  <td>  <?php echo $n6["matname"];?> </td>
    <td><a href="showmat.php?sid=<?php echo $n6["partcpid"];?>&sel=<?php echo $n6["selid"];?>&rol=<?php echo $n6["rrrol"];?>">DELETE</a></td>

  <td><a href="coursdetail.php?sid=<?php echo $n6["partcpid"];?>&rol=<?php echo $n6["rrrol"];?>&mmtid=<?php echo $n6["materid"];?>">open for details</a></td>
  <?php if($q2=='2'||$q2=='3'){?>
            <td ><a href="files_upload.php?sid=<?php echo $q1;?>&rol=<?php echo $q2;?>&mttid=<?php echo $n6["materid"];?>&code=<?Php echo $n6["codenum"];?>">لتحميل  المفات الدراسيه للمقرر</td>

            <?php;}?>

</tr>
<?php;}?>
      </table>

<?php;}?>


<a href="edst.php?sid=<?php echo $q1;?>&rol=<?php echo $q2;?>">لتعديل البيانات الشخصيه</a>
<a href="reg-dplomst.php?sid=<?php echo $q1;?>&rol=<?php echo $q2;?>">لتسجيل للاشتراك بمواد اخري</a>

</form>

  </body>
</html>
