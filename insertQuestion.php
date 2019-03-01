<?php
include 'connect.php';
//INSERT INTO `answers` (`id`, `que`, `answer`, `popularity`, `author`, `email`) VALUES (NULL, '3', 'Jasmeet Narula is right, you need to have some advance concepts of JavaScript handy before starting with Node JS.\r\n\r\nYou can use following to get started:\r\nJavascript for Newbies\r\nObject Oriented Programing in JavaScript\r\nIntroduction to Node js', '0', 'Rajat Kumar', 'rajat@gmail.com');
$name = $_POST['author'];
$email = $_POST['mail'];
$submission = $_POST['comment'];
$submission1 = str_replace("'","\'", $submission);
$q = "insert into questions(question,popularity,report,author,email) values('$submission1',0,0,'$name','$email')";
mysqli_query($con,$q);
header('location:index.php');
?>
