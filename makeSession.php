<?php
include 'connect.php';
$mail = $_POST['mail'];
$que = $_POST['question'];
$_SESSION['user'] = $mail;
header('location:question.php?id='.$que.'');
?>
