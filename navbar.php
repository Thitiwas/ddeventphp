<!DOCTYPE html>
<?php
session_start();
$con = @mysqli_connect("localhost","root","5421040143","ddevent");
@mysqli_set_charset($con,"utf8");
  $userlogin = $_POST['userlogin'];
  $passlogin = $_POST['passlogin'];

  $login = "SELECT username,password,userid FROM customer";
  $checklogin = @mysqli_query($con, $login);
  while($history = @mysqli_fetch_assoc($checklogin)){
    if($history['username'] == $userlogin && $history['password'] == $passlogin) {
      $_SESSION['user'] = $userlogin;
      $_SESSION['pass'] = $passlogin;
      $_SESSION['userid'] = $history['userid'];
  }
}
?>

<html>
  <head>
    <title>DDevent</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse" style="width: 100%;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">DDevent</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">Rules</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php"><span class="glyphicon glyphicon-download-alt"></span> Sign up</a></li>

          <?php if(!isset($_SESSION['user'])) { ?>
            <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php }
                else if (isset($_SESSION['user'])) { ?>
              <li><a href="purchasehistory.php"><span class="glyphicon glyphicon-book"></span> purchasehistory</a></li>
              <li><a href="yourevent.php" value="yourevent"><span class="glyphicon glyphicon-star-empty"></span> yourevent</a></li>
              <li><a href="logout.php" value="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Log in</h4>
      </div>
      <div class="modal-body">
      <div id="content">
      	<form action="index.php" method="post">
      	<center>
    <label>Username:</label>
    <input type="text" class="form-control" name="userlogin">
    <label>Password:</label>
    <input type="password" class="form-control"name="passlogin">
      	</center>
      </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit"  value="Login" class="btn btn-default" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        </form>
        </div>
      </div>
    </div>
  </body>
</html>

<style media="screen">
.navbar {
  color: white;
  background-color: #101010;
  margin-bottom: 0;
  padding-bottom: 0;
}
</style>
