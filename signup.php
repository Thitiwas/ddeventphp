<!DOCTYPE html>
<html>
  <body>
    <?php
      include 'navbar.php';
      $username = $_POST['username'];
      $password = $_POST['password'];
      $checkpassword = $_POST['checkpassword'];
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $phone = $_POST['phone'];
      $birth = $_POST['birth'];
      $sex = $_POST['sex'];
      $email = $_POST['email'];
      $pictureprofile = $_POST['pictureprofile'];
      date_default_timezone_set("Asia/Bangkok");
      $time = date('Y-m-d');

      if(isset($username) && $checkpassword == $password) {
      $check = @mysqli_query($con,"INSERT INTO customer (username,password,email,firstname,lastname,phone,birth,sex,dateregis,pictureprofile)".
                        "VALUES('$username','$password','$email','$firstname','$lastname','$phone','$birth','$sex','$time','$pictureprofile')");
                      }
      if(isset($check)){
        if($check){
        echo "success";
      }
      else {
        echo "again";
      }
    }
    // header("LOCATION: index.php");

  ?>

            <div id="content">
              <form action="#" method="post">
                  <left>
              <label>Username:</label>
              <input type="text" class="form-control" name="username" value="" required>
              <label>Password:</label>
              <input type="password" class="form-control" name="password" value="" required>
              <label>Confirm Password:</label>
              <input type="password" class="form-control" name="checkpassword" value="" required>
              <label>Email:</label>
              <input type="text" class="form-control" name="email" value="" required>
              <label>Firstname:</label>
              <input type="text" class="form-control" name="firstname" value="" required>
              <label>Lastname:</label>
              <input type="text" class="form-control" name="lastname" value="" required>
              <label>Phone Number:</label>
              <input type="text" class="form-control" name="phone" value="" required>
              <label>birth:</label>
              <input type="date" class="form-control" name="birth" value="" required>
              <label>sex:</label>
              <input type="radio" name="sex" value="male" required> male &emsp;&emsp;
              <input type="radio" name="sex" value="female"> female<br>
              <label>Profile Picture:</label>
              <input type="file" class="form-control" name="pictureprofile" value="img" required>
                </left>
                <br><br>
                <center>
              <button type="submit" name="submit" class="btn btn-success">sign up</button>
              <button type="reset" class="btn btn-danger">cancle</button>
            </center>
            </form>
      </div>
  </body>
</html>

<style media="screen">
  #content {
    margin-left: 30%;
    margin-right: 30%;
    margin-top: 5%;
    margin-bottom: 5%;
    /*background-color: #eeeeee;*/
  }
</style>
