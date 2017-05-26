<?php
    session_start();
    $con = @mysqli_connect("localhost","root","5421040143","ddevent");
    @mysqli_set_charset($con,"utf8");
    $idevent1 = $_REQUEST['idevent'];
    $table1 = $_REQUEST['table'];
    $_SESSION['idevent2'] = $idevent1;
    $_SESSION['table2'] = $table1;
    $delete = $_REQUEST['delete'];
    $edit = $_REQUEST['edit'];

    if ($delete == 'delete') {
      $sql = "DELETE  FROM $table1 WHERE idevent = $idevent1";
    }
    else if ($edit == 'edit' ) {
      include("update.php");
    }
    if (@mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
    header("LOCATION: yourevent.php");
      } else {
          echo "Error deleting record: " . @mysqli_error($conn);
      }
  ?>
