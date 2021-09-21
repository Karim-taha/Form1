<?php
include_once("conn.php");
session_start();
?>

<?php

if (isset($_POST['signup'])) {

  //    // I used "mysqli_real_escape_string()" to escape any special chars to avoid SQL INJECTION. 
  // $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
  // $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
  // $email = mysqli_real_escape_string($conn, $_POST['email']);
  // $password = $_POST['password'];
  // $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
  // $natid = mysqli_real_escape_string($conn, $_POST['nid']);
  // $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
  // $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
  // $govs = $_POST['govs'];
  // //$type = $_POST['type'];
  // $type = "student";

  //   // I used "mysqli_real_escape_string()" to escape any special chars to avoid SQL INJECTION. 
  $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];
  $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
  $natid = mysqli_real_escape_string($conn, $_POST['nid']);
  $mobilenumber = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
  $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
  $govs = $_POST['govs'];
  //$type = $_POST['type'];
  $type = "student";


  // Validating Password  
  if ($password !== $confirmPassword) {
    // echo "Password not Confirmed";
    $_SESSION['conPass'] = "Password not Confirmed";
  } else if ($password <= 8) {
    // echo "Password must not be less than 8 characters";
    $_SESSION['passLength'] = "Password must not be less than 8 characters";
  }
  // else {
  //   $hash = "$2y$10$";
  //   $salt = "iusesomecrazystrings22";
  //   $hash_and_salt = $hash . $salt;
  //   $password = crypt($password, $hash_and_salt);
  // }

  //  validating email :
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['emailErr'] = "Invalid Email format";
  }

  // validating Mobile Number :
  else if (!preg_match("/^01[0-5]\d{1,8}$/", $mobilenumber)) {
    // echo "Please Check Your Phone Number";
    $_SESSION['mobNumber'] = "Invalid Mobile Number";
  } else {


    //   $result = mysqli_query($conn, "INSERT INTO users(fname,lname,email,password,nid,mobilenumber,birthdate,govs,type) 
    //   VALUES('$firstname','$lastname','$email','$password','$natid','$mobilenumber','$birthdate','$govs','$type')");
    // }

    $result = mysqli_query($conn, "INSERT INTO users(u_type,u_password,u_fname,u_lname,u_email,u_mobile,u_government) 
    VALUES('$type','$password','$firstname','$lastname','$email','$mobilenumber','$govs')");
  }
}



?>
<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
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
  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <!-- //Bootstrap 4-->

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- //Fontawesome -->

  <style>
    .gov {
      width: 50%;
      border: 1px solid #6ab04c;
      border-radius: 0.4em;
      padding: 0.25em 0.5em;
      font-size: 1.1rem;
      cursor: pointer;
      line-height: 1.1;
    }
  </style>

</head>

<body>
  <!-- main -->
  <div class="main-w3layouts wrapper">
    <h1 class="signup-text">Sign Up</h1>
    <div class="main-agileinfo">
      <div class="agileits-top">
        <form action="#" method="POST">
          <input class="text" type="text" name="fname" placeholder="First Name" required="" />
          <input class="text email" type="text" name="lname" placeholder="Last Name" required="" />
          <input class="text email" type="text" name="email" placeholder="Email" required="" />
          <?php if (isset($_SESSION['emailErr'])) : ?>
            <small id="emailHelp" class="form-text  text-danger"><?php echo $_SESSION['emailErr']; ?></small>
          <?php endif; ?>
          <input class="text" type="password" name="password" placeholder="Password" required="" />
          <?php if (isset($_SESSION['passLength'])) : ?>
            <small id="emailHelp" class="form-text  text-danger"><?php echo $_SESSION['passLength']; ?></small>
          <?php endif; ?>
          <input class="text w3lpass" type="password" name="confirmPassword" placeholder="Confirm Password" required="" />
          <?php if (isset($_SESSION['conPass'])) : ?>
            <small id="emailHelp" class="form-text  text-danger"><?php echo $_SESSION['conPass']; ?></small>
          <?php endif; ?>
          <input class="text w3lpass" type="text" name="nid" placeholder="National ID" required="" />
          <input class="text w3lpass" type="text" name="mobilenumber" placeholder="Mobile Number Like 01 XXXXXXXXX" required="" />
          <?php if (isset($_SESSION['mobNumber'])) : ?>
            <small id="emailHelp" class="form-text  text-danger"><?php echo $_SESSION['mobNumber']; ?></small>
          <?php endif; ?>
          <input class="text w3lpass" type="text" name="birthdate" placeholder="Birth Date Like yyyy/mm/dd" required="" />

          <!-- <div class="dropdown">
            <button class="dropdown1 btn dropdown-toggle btn-lg btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Governorate
            </button>
            <div class="dropdown-menu btn-lg btn-block" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item btn-lg btn-block" value="cairo" href="#">Cairo</a>
              <a class="dropdown-item btn-lg btn-block" value="alex" href="#">Alex</a>
              <a class="dropdown-item btn-lg btn-block" value="bns" href="#">Beni Suef</a>
            </div>
          </div> -->



          <label class="labelGovern">Governorate : </label>
          <select class="gov" name="govs">
            <?php $govs = [
              'Alexandria',
              'Aswan',
              'Asyut',
              'Beheira',
              'Beni Suef',
              'Cairo',
              'Dakahlia',
              'Damietta',
              'Faiyum',
              'Gharbia',
              'Giza',
              'Ismailia',
              'Kafr El Sheikh',
              'Luxor',
              'Matruh',
              'Minya',
              'Monufia',
              'New Valley',
              'North Sinai',
              'Port Said',
              'Qalyubia',
              'Qena',
              'Red Sea',
              'Sharqia',
              'Sohag',
              'South Sinai',
              'Suez',
            ];
            foreach ($govs as $gov) {
              echo "<option value='$gov'>$gov</option>";
            }
            ?>
          </select>
          <br><br>
          <!-- 
          <label class="labelGovern">Profession : </label>
          <select class="gov" name="type">
            <?php //$types = ['Teacher', 'Student']; 

            //foreach($types as $type){
            //echo "<option value='student'>$type</option>";
            //}

            ?>
          </select>
          <br><br>
          -->

          <!-- <label>Governorate : </label>
          <select name="city">
            <option value="nc">Nasr city</option>
            <option value="sg">Sedy Gaber</option>
            <option value="ihns">Ihnasia</option>
          </select>
          <br><br> -->

          <!-- <label>Governorate : </label>
          <select name="zcode">
            <option value="62631">62631</option>
            <option value="775588">775588</option>
            <option value="112233">112233</option>
          </select>
          <br><br> -->


          <!-- <div class="dropdown">
            <button class="dropdown2 btn dropdown-toggle btn-lg btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Your City
            </button>
            <div class="dropdown-menu btn-lg btn-block" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item btn-lg btn-block" value="nc" href="#">Nasr city</a>
              <a class="dropdown-item btn-lg btn-block" value="sg" href="#">Sedy Gaber</a>
              <a class="dropdown-item btn-lg btn-block" value="ihns" href="#">Ihnasia</a>
            </div>
          </div> -->

          <!-- <div class="dropdown">
            <button class="dropdown3 btn dropdown-toggle btn-lg btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Zip Code
            </button>
            <div class="dropdown-menu btn-lg btn-block" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item btn-lg btn-block" value="62631" href="#">62631</a>
              <a class="dropdown-item btn-lg btn-block" value="775588" href="#">775588</a>
              <a class="dropdown-item btn-lg btn-block" value="112233" href="#">112233</a>
            </div>
          </div> -->

          <div style="clear: both"></div>
          <div class="wthree-text">
            <label class="anim">
              <input type="checkbox" class="checkbox" required="" />
              <span>I Agree To The Terms & Conditions.</span>
            </label>
            <div class="clear"></div>
          </div>
          <input type="submit" name="signup" value="SIGNUP" />
        </form>
        <p>You have an Account? <a href="login.php"> Login Now!</a></p>
      </div>
    </div>
    <!-- copyright -->
    <div class="colorlibcopy-agile">
      <p>
        © 2021 Full Mark. All rights reserved | Design with
        <i class="heart fas fa-heart"></i> by
        <a href="#" target="_blank">Full Mark Team.</a>
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
  <!-- Bootstrap 4 -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- //Bootstrap 4 -->
</body>

</html>
<?php session_destroy();
?>