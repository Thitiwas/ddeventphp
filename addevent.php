<?php
  include("navbar.php");
  session_start();
  $nametable = $_POST['nametable'];
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
  $user = $_SESSION['user'];
  $id = $_SESSION['userid'];
  echo $id;
  date_default_timezone_set("Asia/Bangkok");
  $dateadd = date('Y-m-d');

  if(isset($nametable)) {
  $check = @mysqli_query($con,"INSERT INTO $nametable (iduser,username,eventname,eventdate,eventtime,eventplace,location,ticket,	price,description,contact,eventpic,dateadd)".
                    "VALUES('$id','$user','$eventname','$eventdate','$eventtime','$eventplace','$location','$ticket','$price','$description','$contact','$eventpic','$dateadd')");
                  }
  if(isset($check)){
    if($check){
    header("LOCATION: $nametable.php");
  }
  else {
    echo "again";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
