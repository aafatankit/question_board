<?php
include 'connect.php';
if(!isset($_SESSION['user'])){
  $_SESSION['user'] = 1;
}
$que = $_GET['id'];
if($que < 1){
  header('location:index.php');
}
$q = "select * from questions where qid = $que";
$result = mysqli_query($con,$q);
$available = mysqli_num_rows($result);
if($available == 1){
  $row = mysqli_fetch_array($result);
  $q1 = "select * from answers where que = $que order by popularity desc";
  $show = mysqli_query($con,$q1);
  $avail = mysqli_num_rows($show);
}
else{
  header('location:index.php');
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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <style>
    body{
      font-family: 'Josefin Sans', sans-serif;
    }
    .newColor{
      color: #000099;
    }
    pre{
      white-space: pre-wrap;
      word-break: break-word;
    }
    a#heading{
      text-decoration: none !important;
      color: black;
    }
    </style>

    <?php
      if(!isset($_SESSION['notification'])){
          $_SESSION['notification']=0;
      }

      if($_SESSION['notification']==1){
          echo '<script>';
              echo '$(document).ready(function(){';
                  echo '$("#registered").modal("show");';
              echo '});';
          echo '</script>';
      }
      $_SESSION['notification']=0;
    ?>
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
          <h2><b><?php echo $row['question']; ?></b></h2>
          <h6 class="text-right">- <?php echo $row['author']; ?></h6>
          <br>
          <hr>
          <?php
          if($avail == 0){
            echo '<br><br>';
            echo '<h3>No one answer this question till now. Can you?</h3>';
          }
          else{
            while($index = mysqli_fetch_array($show)){
              echo '<br>';
              if($index['popularity'] >= 0){
                echo '<p><b>'.$index['author'].'&nbsp;&nbsp;&nbsp;<i class="fas fa-thumbs-up"></i> '.$index['popularity'].'</b></p>';
              }
              else{
                echo '<p><b>'.$index['author'].'&nbsp;&nbsp;&nbsp;<i class="fas fa-thumbs-down"></i> '.-($index['popularity']).'</b></p>';
              }
              echo '<p><pre>';
              echo $index['answer'];
              echo '</pre></p>';
              echo '<br>';
              echo '<h6><a href="voteup.php?id='.$index['id'].'&qno='.$que.'" class="text-success"><i class="fas fa-thumbs-up"></i> Helpful</a> &nbsp;&nbsp;&nbsp; <a href="votedown.php?id='.$index['id'].'&qno='.$que.'" class="text-danger"><i class="fas fa-thumbs-down"></i> Not Helpful</a></h6>';
              echo '<hr>';
            }
          }
          ?>
          <br><br>
          <form action="insertAnswer.php" method="post" id="usrform">
            <div class="form-group">
              <lable>Name:</lable>
              <input type="text" name="author" class="form-control" autocomplete="off" required placeholder="Ankit Kumar">
            </div>
            <div class="form-group">
              <lable>Email:</lable>
              <input type="email" name="mail" class="form-control" autocomplete="off" required placeholder="example@gmail.com">
            </div>
            <div class="form-group">
              <label>Your Answer:</label>
              <textarea class="form-control" rows="5" name="comment" form="usrform" placeholder="Enter Your Answer/Suggestion"></textarea>
            </div>
            <input type="hidden" name="queNo" value="<?php echo $que; ?>">
            <input type="submit" value="Submission" class="btn btn-success">
          </form>
        </div>
      </div>
    </div>
    <br><br>
    <div class="modal" id="registered">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Please Enter Your Email Address and Try Again !<br>
          <form action="makeSession.php" method="post">
            <input type="hidden" name="question" value="<?php echo $que; ?>">
            <input type="email" class="form-control" name="mail" value="" required placeholder="Email">
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  </body>
</html>
