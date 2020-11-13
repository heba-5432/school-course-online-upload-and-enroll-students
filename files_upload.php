
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="magstyle.css" rel="stylesheet" type="text/css" />
    <style>
</style>
  </head>
  <body>
    <?php include 'header.php';?><br><br>
  <?php include 'menu.php';?>
  <?php include 'showname.php';?>
  <br><br><br><br>

<?php
include_once("config.php");
$m3=$_GET["mttid"];
$m1=$_GET["sid"];
$m2=$_GET["rol"];
$m4=$_GET["code"];
?>

<form class="formsel" action="files_upload.php?sid=<?php echo $m1; ?>&rol=<?php echo $m2;?>&mttid=<?php echo $m3;?>&code=<?php echo $m4;?>" method="POST" enctype="multipart/form-data" >
<?PHP
    if(isset($_GET["mttid"])){
        $m3=$_GET["mttid"];
        $m1=$_GET["sid"];
        $m2=$_GET["rol"];
        $m4=$_GET["code"];


    if(isset($_POST['submit'])){
      $c2=$_POST["ftn"];
    if(empty($c2)){echo "<h2 style=\"color:red;\"> ادخل وصف لملفاتك</h2>";}
    else{
     $subf1=$_POST["sh"];
      $fldnme=$m4;
      if( is_dir("uploaded/$fldnme/") === false )
{
    mkdir("uploaded/$fldnme/");//creat folder
}


  if( is_dir("uploaded/$fldnme/$subf1/") === false ){

  mkdir("uploaded/$fldnme/$subf1/");//creat folder
}


      if(count($_FILES['upload']['name']) > 0){
          //Loop through each file
          for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            //Get the temp file path
              $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

              //Make sure we have a filepath
              if($tmpFilePath != ""){

                  //save the filename
              $shortname  =  ( $_FILES['upload']['name'][$i]);
            $shortname1  =  pathinfo( $_FILES['upload']['name'][$i]);


$filuplod=base64_encode($shortname1['filename']).'.'.$shortname1['extension'];





                  //save the url and the file
                  $filePath = "uploaded/$fldnme/$subf1/" .$filuplod;
                  $files[] =   $shortname;
                  //insert into db
                  //use $shortname for the filename
                  //use $filePath for the relative url to the file
                $sh  =  $_POST["sh"];
                $c=$_POST["mtd"];
                $c2=$_POST["ftn"];
                $c3=$_POST["std"];
                  //Upload the file into the temp dir

                  if(move_uploaded_file($tmpFilePath, $filePath)) {
                  $l = "INSERT INTO files( filname,filename, matidd, shobaname,sidid,updatetime )VALUES('$c2','$shortname','$c','$sh','$c3',NOW() )";
                  mysqli_query($conn,$l);


                }
          }}
      }
}
      //show success message
      echo "<h1>تم التحميل:</h1>";
      if(is_array ($files)){
          echo "<ul>";
          foreach ($files as $file){
              echo "<li  style=\"color:red;\">$file</li>";
          }
         }
         else{echo "<li  style=\"color:red;\">upload failed</li>";
         echo "</ul>";
  }}

}

  ?>
  <?php  $a1= "SELECT *FROM matrials WHERE matid= '$m3'";
   $a2=mysqli_query($conn,$a1);
   $a3=mysqli_fetch_assoc($a2);?>
اسم المقرر:<?php echo $a3["matname"];?>-----
كود المقرر:<?php echo $m4;?>--------------
اختار الشعبه:<select name ="sh">
  <option>section1</option>
    <option>section2</option>
      <option>section3</option>
        <option>section4</option>
          <option>section5</option>

</select>
ملخص عن مجموعه الملفات :<textarea type="text" name ="ftn" value=""
rows="2";
cols="30"
></textarea>
<input type="hidden" name ="mtd" value=<?php echo $m3;?>>
<input type="hidden" name ="std" value=<?php echo $m1 ;?>>
      <div>
          <label for='upload'>Add Attachments:</label>
          <input id='upload' name="upload[]" type="file" multiple="multiple" />
      </div>

      <input class="btn" type="submit" name="submit" value="Submit">

           <a class="btn"   href="reg-dplomst.php?sid=<?php echo $m1;?>&rol=<?php echo $m2;?>&mttid=<?php echo $m3;?>&lev=<?php echo $a3["levdpid"];?>">رجوع</a>


    </form>









<?php include 'footer.php';?>
  </body>
</html>
<script type="text/javascript">

	function _(id){
		return document.getElementById(id);
	}

	function select_file_name(id) {
	    var filename = _(id).files[0].name;
	    if (filename.length > 20) {
	        filename = filename.substring(0, 20) + '...'
	    };
	    _('file-upload').innerHTML = '-> ' + filename;
	    _('file-upload').style.backgroundColor = '#1dd1a1'
	}

</script>
