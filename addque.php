<?php
include 'connect.php';
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
      <!-- <div class="text-right">
        <a href="#" class="btn btn-outline-info btn-lg">Want to Ask Question ?</a>
      </div> -->
      <br><br><br>
      <h4>Ask Your Question Here :)</h4>
      <br>
      <form action="insertQuestion.php" method="post" id="usrform">
        <div class="form-group">
          <lable>Name:</lable>
          <input type="text" name="author" class="form-control" autocomplete="off" required placeholder="Ankit Kumar">
        </div>
        <div class="form-group">
          <lable>Email:</lable>
          <input type="email" name="mail" class="form-control" autocomplete="off" required placeholder="example@gmail.com">
        </div>
        <div class="form-group">
          <label>Your Question:</label>
          <textarea class="form-control" rows="3" name="comment" form="usrform" placeholder="Enter Your Question/Doubt"></textarea>
        </div>
        <input type="submit" value="Submit" class="btn btn-danger">
      </form>
    </div>
  </body>
</html>
