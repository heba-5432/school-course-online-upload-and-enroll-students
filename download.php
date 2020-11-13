

<?php
include_once("config.php");
if(isset($_GET["flid"])){
$q4=$_GET["flid"];
$q1=$_GET["sid"];
$q2=$_GET["rol"];
$b="SELECT * from matrials,files WHERE matrials.matid=files.matidd and fileid='$q4'";
$b1=mysqli_query($conn,$b);
$b2=mysqli_fetch_assoc($b1);
$z=pathinfo($b2["filename"]);
$k= $b2["matidd"];

$filepath = 'uploaded/'.$b2["codenum"].'/'.$b2["shobaname"].'/'.base64_encode($z['filename']).'.'.$z['extension'];



if (file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
  //  header('Content-Disposition: attachment; filename=' .book.pdf);
  header('Content-Disposition: attachment; filename =' .basename( $b2["filename"]));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    //header('Content-Length: ' . filesize('uploads/' . $file['name']));
    readfile('uploaded/'.$b2["codenum"].'/'.$b2["shobaname"].'/'.base64_encode($z['filename']).'.'.$z['extension']);

    // Now update downloads count
    $newCount = $b2['download'] + 1;
  $s=  $b2['fileid'];
    $updateQuery = "UPDATE files SET download=$newCount WHERE fileid='$s'";
    mysqli_query($conn, $updateQuery);
    header("location:coursdetail.php?sid=$q1&rol=$q2&mmtid=$k");
  

}

}
?>
