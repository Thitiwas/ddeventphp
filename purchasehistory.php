<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start();
      $id = $_SESSION['userid'];
      include("navbar.php");

      echo "<br><center><h2>This is Your purchasehistory #$_SESSION[user] </h1></center><br>";
      $event = "SELECT * FROM selldetail  WHERE selldetail.userid = $id";
      $yourevent = @mysqli_query($con, $event); ?>
      <form class="" action="delete.php" method="POST">
        <div class="container-fluid bg-3 text-center">
          <div class="row">
      <?php
        while($history = @mysqli_fetch_assoc($yourevent)){ ?>
        <div class="col-sm-4">
              <div class="thumbnail">
              <div class="caption">
                <h8>event name      <?php echo $history['eventname']; ?></h8><br>
                <h8>number of ticket<?php echo $history['numofticket']; ?></h8><br>
                <h8>sumprice        <?php echo $history['sumprice']; ?></h8><br>
                <h8>date buy        <?php echo $history['datebuy']; ?></h8><br>
              </div>
            </div>
          </div>
  <?php } ?>
        </div>
      </div>
    </form>
  </body>
</html>
<style media="screen">
  a:link { color: black; }
  .col-sm-4 {
    height: 85vh;
  }
</style>
