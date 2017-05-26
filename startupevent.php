<!DOCTYPE html>
<html>
<?php
  include("navbar.php");
  session_status();
?>
  <body>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <h3>Startup Event</h3> </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['userid'])) {?>
        <li><a href="#" data-toggle="modal" data-target="#modalstart"><span class="glyphicon glyphicon-plus"></span> Add Startup Event</a></li>
        <?php } else {?>
        <li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login for Add event</a></li>
        <?php } ?>
      </ul>
    </div>
    <!-- Modal -->
    <form class="" action="addevent.php" method="post">
    <div class="modal fade" id="modalstart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h8 class="modal-title" id="myModalLabel"> Add Startup Event</h8>
          </div>
          <div class="modal-body">
            <label>Eventname:</label>
            <input type="text" class="form-control" name="eventname" value="" required>
            <label>Eventdate:</label>
            <input type="date" class="form-control" name="eventdate" value="" required>
            <label>Eventtime:</label>
            <input type="time" class="form-control" name="eventtime" value="" required>
            <label>Eventplace:</label>
            <input type="text" class="form-control" name="eventplace" value="" required>
            <label>Location (shot link googlemap):</label>
            <input type="text" class="form-control" name="location" value="" required>
            <label>Number of tickets:</label>
            <input type="number" class="form-control" name="ticket" min="0" value="" required>
            <label>Tickets Price:</label>
            <input type="number" class="form-control" name="price" min="0" value="" required>
            <label>Description:</label>
            <input type="textarea" class="form-control" name="description" value="" required>
            <label>Contact:</label>
            <input type="text" class="form-control" name="contact" value="" required>
            <label>Event Picture:</label>
            <input type="file" class="form-control" name="eventpic" value="img" required>
            <input type="hidden" name="nametable" value="startupevent">
              </left>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    </form>
    <br>
      <?php
      $n = 0;
      $show = "SELECT * FROM startupevent";
      $showall = @mysqli_query($con, $show);
      while($history = @mysqli_fetch_assoc($showall)){ ?>
        <form class="" action="buyticket.php" method="post">
      <div class="row">
      <div class="col-sm-20 col-md-15">
        <div class="thumbnail">
          <img src="picture/<?php echo $history['eventpic'] ?>">
          <div class="caption">
            <h8><?php echo $history['eventname'] ?></h8><br>
            <h8><?php echo $history['eventdate'] ?></h8><br>
            <h8><?php echo $history['eventtime'] ?></h8><br>
            <h8><?php echo $history['eventplace'] ?></h8><br>
            <a href="<?php echo $history['location'] ?>" target="_blank"><?php echo $history['location']; ?></a><br>
            <h8><?php echo $history['ticket'] ?></h8><br>
            <h8><?php echo $history['price'] ?></h8><br>
            <h8><?php echo $history['description'] ?></h8><br>
            <h8><?php echo $history['contact'] ?></h8><br>
            <p>
              <input type="hidden" name="eventtype" value="startupevent">
              <input type="hidden" name="eventname1" value="<?php echo $history['eventname']; ?>">
              <input type="hidden" name="pricesell" value="<?php echo $history['price']; ?>">
              <input type="hidden" name="beforeticket" value="<?php echo $history['ticket']; ?>">
              <input type="number" value="1" name="numofticket" width="10px" min="1" max="<?php echo $history['ticket'] ?>" value="">
              <input type="submit" name="submit" value="buyticket">
          </div>
        </div>
      </div>
      </div>
    </form>
<?php
    }
      ?>
  </body>
</html>

<style media="screen">
  a:link { color: black; }
  .row {
    float: left;
    width: 30%;
    margin-left: 3%;
  }
</style>
