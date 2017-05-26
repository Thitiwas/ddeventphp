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
      echo "<br><center><h2>This is Your Event #$_SESSION[user] </h1></center><br>";
      for ($i=0; $i < 8; $i++) {
        if($i==0){$qtable = 'programerevent';}
        else if($i==1){$qtable = 'networkevent';}
        else if($i==2){$qtable = 'designerevent';}
        else if($i==3){$qtable = 'photoevent';}
        else if($i==4){$qtable = 'musicevent';}
        else if($i==5){$qtable = 'startupevent';}
        else if($i==6){$qtable = 'gamerevent';}
        else {$qtable = 'sportevent';}
      $event = "SELECT * FROM customer INNER JOIN $qtable ON customer.userid = $qtable.iduser WHERE customer.userid = $id";
      $yourevent = @mysqli_query($con, $event); ?>
      <div class="container-fluid bg-3 text-center">
        <div class="row">
      <?php
        while($history = @mysqli_fetch_assoc($yourevent)){ ?>
          <form class="" action="delete.php" method="POST">
        <div class="col-sm-4">
              <div class="thumbnail">
              <img class="img-responsive" style="width:100%" alt="Image" src="picture/<?php echo $history['eventpic']; ?>">
              <div class="caption">
                <h8><?php echo $history['eventname']; ?></h8><br>
                <h8><?php echo $history['eventdate']; ?></h8><br>
                <h8><?php echo $history['eventtime']; ?></h8><br>
                <h8><?php echo $history['eventplace']; ?></h8><br>
                <a href="<?php echo $history['location']; ?>" target="_blank"><?php echo $history['location']; ?></a><br>
                <h8><?php echo $history['ticket']; ?></h8><br>
                <h8><?php echo $history['price']; ?></h8><br>
                <h8><?php echo $history['description']; ?></h8><br>
                <h8><?php echo $history['contact']; ?></h8><br>
                <h8><?php echo $history['idevent']; ?></h8><br>
                <h8><?php echo $qtable; ?></h8><br>
                <input type="hidden" name="table" value="<?php echo $qtable; ?>">
                <input type="hidden" name="idevent" value="<?php echo $history['idevent']; ?>">
                <p>
                  <button type="submit" class="btn btn-danger" name="delete" value="delete">
                  delete</button>
                  <button type="submit" class="btn btn-warning" name="edit" value="edit">
                  <?php echo $qtable; ?></button>
                </p>
              </div>
            </div>
          </div>
    </form>
  <?php }
  }
  ?>
</div>
</div>
  </body>
</html>
<style media="screen">
  a:link { color: black; }
  .col-sm-4 {
    height: 90vh;
  }
</style>
