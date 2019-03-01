<?php
include 'connect.php';
if(!isset($_SESSION['user'])){
  $_SESSION['user'] = 1;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Project Geek</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body{
      font-family: 'Josefin Sans', sans-serif;
    }
    .newColor{
      color: #000099;
    }
    a#heading{
      text-decoration: none !important;
      color: black;
    }
    </style>
  </head>
  <body>
    <br>
    <h1 class="text-center"><a href="index.php" id="heading">Question Board</a></h1>
    <div class="container">
      <div class="text-right">
        <a href="addque.php" class="btn btn-outline-info btn-lg">Want to Ask Question ?</a>
      </div>
      <div class="row">
        <div class="col-md-9">
          <h2><b>Recently Asked Questions</b></h2>
          <br>
          <?php
            $q = "select * from questions order by qid desc limit 3";
            $result = mysqli_query($con,$q);
            $available = mysqli_num_rows($result);
            if($available != 0){
              $row = mysqli_fetch_array($result);
              for($i=0; $i<$available; $i++){
                      echo '<h4><a href="question.php?id='.$row['qid'].'" class="newColor"><i class="fa fa-angle-double-right"></i> '.$row['question'].'</a></h4>';
                      echo '<br>';
                  $row=mysqli_fetch_array($result);
              }
            }
          ?>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-9">
          <h2><b>Popular Questions</b></h2>
          <br>
          <?php
            $q = "select * from questions order by popularity desc";
            $result = mysqli_query($con,$q);
            $available = mysqli_num_rows($result);
            if($available != 0){
              $row = mysqli_fetch_array($result);
              for($i=0; $i<$available; $i++){
                      echo '<h4><a href="question.php?id='.$row['qid'].'" class="newColor"><i class="fa fa-angle-double-right"></i> '.$row['question'].'</a></h4>';
                      echo '<br>';
                  $row=mysqli_fetch_array($result);
              }
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
