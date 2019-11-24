<?php include('php/functions/session_start.php'); ?>
<?php include('php/functions/database_connection.php'); ?>
<?php include('php/functions/helper_functions.php'); ?>
<?php include('php/functions/clear_message.php'); ?>
<?php include('partials/head.php'); ?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- USER LOGIN SCRIPT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

set_message("");

if (isset($_POST['login-submit-button'])) {

    $error_array = array();

    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);

    if (empty($username)) {
        array_push($error_array, "EMAIL_EMPTY");
    }

    if(empty($password)) {
        array_push($error_array, "PASSWORD_EMPTY");
    }

    if (!empty($error_array)) {
        for ($i = 0; $i < sizeof($error_array); $i++) {
            echo $error_array[$i] . "<br>";
        }
   } else {

            $check_login = mysqli_query($con, "SELECT password, username FROM user_table WHERE username = '" .  $username . "' AND active = 1 ");
            $check_login_rows = mysqli_num_rows($check_login);

            if ($check_login_rows == 1) {

                $row = mysqli_fetch_array($check_login);
                $db_password = $row['password'];

                // echo $db_password;

                if (password_verify($password, $db_password)) {

                    // echo "password verification successfull" . "<br>";

                    $_SESSION['username'] = $username;

                    setcookie('username', $username, time() + 86400 );

                    header("Location: http://localhost:8888/timesheet_control/pages/dashboard.php");

                } else {

                set_message("
                    <li>
                      <img src='media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>Password could not be verified</p>
                    </li>
                ");

                }

                set_message("
                    <li>
                      <img src='media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>Password is not correct</p>
                    </li>
                ");

            } else {

                set_message("
                    <li>
                      <img src='media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>User not found</p>
                    </li>
                ");

            }

   }





}

?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- PAGE CONTENT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="login-page" class="pagewrapper">



  <div class="content-page">

  <?php include('php/functions/database_connection_status_report.php'); ?>

    <div class="card">
      <h1><img src="media/logo/timesheet_organiser_temporary_logo.svg" alt="Logo" class="logo"></h1>
      <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password"placeholder="Password">
        <input type="submit" class="button button-blue" name="login-submit-button" value="Login">
        <div class="links-box">
          <a href="pages/register.php" class="blue-link">Register</a>
          <a href="pages/forgot_password.php" class="blue-link">Forgot password?</a>
        </div>
      </form>
    </div>
  </div>
  <div id="register-error-note">

    <?php display_message(); ?>

    <!--
    <li>
      <img src="media/icons/icon_error.png" class="icon-small" alt="">
      <p>Username already exist</p>
    </li>
    <li>
      <img src="media/icons/icon_error.png" class="icon-small" alt="">
      <p>Passwords dont match</p>
    </li>
    -->

  </div>

</div>



  <?php include('partials/scripts_import.php'); ?>
  <?php include('partials/footer.php'); ?>
