<!DOCTYPE html>
<html>
  <body>
    <?php
      session_start();
      $con = @mysqli_connect("localhost","root","5421040143","ddevent");
      @mysqli_set_charset($con,"utf8");
      include("navbar.php");
      $table1 = $_SESSION['table2'];
      $idevent1 = $_SESSION['idevent2'];
      $eventname = $_POST['eventname'];
      $eventdate = $_POST['eventdate'];
      $eventtime = $_POST['eventtime'];
      $eventplace = $_POST['eventplace'];
      $location = $_POST['location'];
      $ticket = $_POST['ticket'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $contact = $_POST['contact'];
      $eventpic = $_POST['eventpic'];
      echo $_SESSION['idevent1'];;
      echo $_SESSION['table1'];;
      if (isset($eventname)) {
        $sql = "UPDATE $table1 SET eventname='$eventname',eventdate='$eventdate',eventtime='$eventtime'
        ,eventplace='$eventplace',location='$location',ticket='$ticket',price='$price'
        ,description='$description',contact='$contact',eventpic='$eventpic'
        WHERE idevent=$idevent1";
        mysqli_query($con,$sql);
      }
     ?>
<form action="update.php" method="post">
  <div id="content">
        <left>
        <?php $show = "SELECT * FROM $table1 WHERE idevent=$idevent1 ";
          $showall = @mysqli_query($con, $show);
          while($history = @mysqli_fetch_assoc($showall)){ ?>
    <label>Eventname:</label>
    <input type="text" class="form-control" name="eventname" value="<?php echo $history['eventname']; ?>" required>
    <label>Eventdate:</label>
    <input type="date" class="form-control" name="eventdate" value="<?php echo $history['eventdate']; ?>" required>
    <label>Eventtime:</label>
    <input type="time" class="form-control" name="eventtime" value="<?php echo $history['eventtime']; ?>" required>
    <label>Eventplace:</label>
    <input type="text" class="form-control" name="eventplace" value="<?php echo $history['eventplace']; ?>" required>
    <label>Location (shot link googlemap):</label>
    <input type="text" class="form-control" name="location" value="<?php echo $history['location']; ?>" required>
    <label>Number of tickets:</label>
    <input type="number" class="form-control" name="ticket" value="<?php echo $history['ticket']; ?>" required>
    <label>Tickets Price:</label>
    <input type="number" class="form-control" name="price" value="<?php echo $history['price']; ?>" required>
    <label>Description:</label>
    <input type="textarea" class="form-control" name="description" value="<?php echo $history['description']; ?>" required>
    <label>Contact:</label>
    <input type="text" class="form-control" name="contact" value="<?php echo $history['contact']; ?>" required>
    <label>Event Picture:</label>
    <input type="file" class="form-control" name="eventpic" value="img" required>
      </left>
      <?php } ?>
      <br><br>
      <center>
    <button type="submit" name="submit" class="btn btn-success">edit</button>
    <button type="reset" class="btn btn-danger">cancle</button>
  </center>
</div>
</form>
</body>
</html>

<style media="screen">
#content {
margin-left: 30%;
margin-right: 30%;
margin-top: 5%;
margin-bottom: 5%;
}
