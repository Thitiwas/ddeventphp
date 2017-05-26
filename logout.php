<!DOCTYPE html>
<html lang="en">
<body>
<?php
  session_start();
  session_destroy();
  header("LOCATION: index.php");
?>
</body>
</html>
