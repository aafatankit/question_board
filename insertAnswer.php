<?php
include 'connect.php';
//INSERT INTO `answers` (`id`, `que`, `answer`, `popularity`, `author`, `email`) VALUES (NULL, '3', 'Jasmeet Narula is right, you need to have some advance concepts of JavaScript handy before starting with Node JS.\r\n\r\nYou can use following to get started:\r\nJavascript for Newbies\r\nObject Oriented Programing in JavaScript\r\nIntroduction to Node js', '0', 'Rajat Kumar', 'rajat@gmail.com');
$name = $_POST['author'];
$queNo = $_POST['queNo'];
$email = $_POST['mail'];
$submission = $_POST['comment'];
$submission1 = str_replace("'","\'", $submission);
$q = "insert into answers (que,answer,popularity,author, email) values($queNo,'$submission1',0,'$name','$email')";
mysqli_query($con,$q);
$q = "select * from questions where qid = $queNo";
$result = mysqli_query($con,$q);
$row = mysqli_fetch_array($result);
$pop = $row['popularity'];
$pop = $pop + 1;
$q = "update questions set popularity = $pop where qid = $queNo";
mysqli_query($con,$q);
header('location:question.php?id='.$queNo.'');
?>
