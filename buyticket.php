<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      session_start();
      $con = @mysqli_connect("localhost","root","5421040143","ddevent");
      @mysqli_set_charset($con,"utf8");
      date_default_timezone_set("Asia/Bangkok");
      $datebuy = date('Y-m-d');
      $eventtype = $_POST['eventtype'];
      $eventname = $_POST['eventname1'];

      $price = $_POST['pricesell'];
      $numofticket = $_POST['numofticket'];
      $sumprice = ($price*$numofticket);
      $id = $_SESSION['userid'];
      $beforeticket = $_POST['beforeticket'];
      $newticket = ($beforeticket-$numofticket);
      if(isset($id)) {
      $check = @mysqli_query($con,"INSERT INTO `selldetail` (userid,eventname,eventtype,numofticket,sumprice,datebuy)"
                        ."VALUES('$id','$eventname','$eventtype','$numofticket','$sumprice','$datebuy')");
      $sql = "UPDATE $eventtype SET ticket='$newticket' WHERE idevent='$idevent'";
      mysqli_query($con,$sql);
    }
              if($check) {
                echo '<h2>success</h2>';
                echo '<h2><a href="index.php">back to home</a></h2>';
              }
              else {
                echo 'nonono';
              }
    ?>
  </body>
</html>
