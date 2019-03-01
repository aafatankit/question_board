<?php
include 'connect.php';
$que = $_GET['qno'];
$ans = $_GET['id'];
if($_SESSION['user'] == 1){
  $_SESSION['notification'] = 1;
  header('location:question.php?id='.$que.'');
}
else{
  $mail = $_SESSION['user'];
  $q = "select * from voters where email = '$mail' and ansid = $ans";
  $result = mysqli_query($con,$q);
  $avail = mysqli_num_rows($result);
  if($avail == 0){
    $q1 = "insert into voters(email,ansid,vote) values('$mail',$ans,-1)";
    $q2 = "update answers set popularity = popularity - 1 where id = $ans";
    mysqli_query($con,$q1);
    mysqli_query($con,$q2);
  }
  else{
    $row = mysqli_fetch_array($result);
    if($row[vote] == 1){
      $q3 = "update answers set popularity = popularity - 1 where id = $ans";
      $q4 = "update voters set vote = -1 where email = '$mail' and ansid = $ans";
      mysqli_query($con,$q3);
      mysqli_query($con,$q4);
    }
  }
  header('location:question.php?id='.$que.'');
}
?>
