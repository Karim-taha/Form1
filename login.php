<?php
// Starting Session.
session_start();
?>
<?php include_once("conn.php"); ?>
<?php

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];
  // $hash = "$2y$10$";
  //   $salt = "iusesomecrazystrings22";
  //   $hash_and_salt = $hash . $salt;
  //   $password = crypt($password, $hash_and_salt);


  $query = "SELECT * FROM users WHERE u_email = '$email' and u_password = '$password' LIMIT 1";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo mysqli_error($conn);
  }

  if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['id'] = $row['u_id'];
    $_SESSION['email'] = $row['u_email'];
    header("Location: hellologin.php");
    exit;
  } else {
    //echo "Invalid Email or Password";
    $_SESSION['email-pass'] = "Email or Password is incorrect";
  }

  // close the connection
  mysqli_free_result($result);
  mysqli_close($conn);
}
?>
<!-- 
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
  <title>Log In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Custom Theme files -->
  <link href="form.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->
  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet" />
  <!-- //web font -->
  <!-- Bootstrap 4.0 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- //Bootstrap 4.0 -->

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- //Fontawesome -->
</head>

<body>
  <!-- main -->
  <div class="main-w3layouts wrapper">
    <h1 class="signup-text">Log In</h1>
    <div class="main-agileinfo">
      <div class="agileits-top">
        <form method="post">
          <?php if (isset($_SESSION['email-pass'])) : ?>
            <div style="font-size: 20px; text-align:center" id="emailHelp" class="form-text  text-danger"><?php echo $_SESSION['email-pass']; ?></div>
          <?php endif; ?>
          <input class="text email" type="email" name="email" placeholder="Email" required="" />

          <input class="text" type="password" name="password" placeholder="Password" required="" />

          <input type="submit" name="login" value="LOGIN" />
        </form>
        <p>Don't have an Account? <a href="signup.php"> Sign up Now!</a></p>
      </div>
    </div>
    <!-- copyright -->
    <div class="colorlibcopy-agile">
      <p>
        © 2021 Full Mark. All rights reserved | Design with <i class="heart fas fa-heart"></i> by
        <a href="https://colorlib.com/" target="_blank">Full Mark Team.</a>
      </p>
    </div>
    <!-- //copyright -->
    <ul class="colorlib-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <!-- //main -->
  <!-- Bootstrap 4.0 -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- //Bootstrap 4.0 -->
</body>

</html>

<?php session_destroy(); ?>