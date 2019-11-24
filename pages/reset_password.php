<?php include('../php/functions/session_start.php'); ?>
<?php include('../php/functions/database_connection.php'); ?>
<?php include('../php/functions/helper_functions.php'); ?>
<?php include('../php/functions/clear_message.php'); ?>
<?php include('../partials/head.php'); ?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- FORGOT PASSWORD CODE SCRIPT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

if (isset($_POST['reset-password-submit-button'])) {

if (isset($_GET['email']) && isset($_GET['activation_code']) && isset($_COOKIE['temp_access_code']) && $_POST['token'] == $_SESSION['token']) {

    $error_array = array();

    if ($_POST['new_password'] == $_POST['new_password_confirm']) {

    $new_password = $_POST['new_password'];
    $email = $_GET['email'];


        if ((preg_match('/[\'^£$!%&*()}{@#~?><>,|=_+-]/', $new_password)) && (preg_match('#[0-9]#', $new_password)) && (strlen($new_password) > 6)) {

            // echo "password is fine";

            $new_password = $new_password = password_hash($new_password, PASSWORD_BCRYPT);


                $update_query = "UPDATE user_table SET password = '". $new_password . "' WHERE email = '" . $email . "' ";
                if (mysqli_query($con, $update_query)) {
                    // echo "new password successfully uploaded";
                    // header("Location: http://localhost:8888/timesheet_control/index.php");

                    set_message("
                                <p>
                                    The password was reseted successfully!
                                </p>
                                <br>
                                <a href='../index.php' class='button button-blue'>Login</a>
                    ");

                } else {
                     set_message("
                                 <p>
                                     Something went wrong by uploading the new password <br/>
                                     Please contact your administrator.
                                 </p>
                                 <img src='http://localhost:8888/timesheet_control/media/icons/icon_error.png' class='icon-small' alt='icon success'>
                     ");
                }


        } else {

            array_push($error_array, "ERROR_PASSWORD_CONDITIONS");

        }

        // echo "the passwords matches!";


    } else {

        array_push($error_array, "PASSWORD_NOT_MATCH");

    }

       if (!empty($error_array)) {
            $error_log = "";

                if(in_array("ERROR_PASSWORD_CONDITIONS", $error_array)){
                    $error_log = $error_log .= "
                                 <li>
                                  <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                                  <p>the password must contain 6 characters and it must contain at least one number and one special character</p>
                                </li>
                    ";
                }

                if(in_array("PASSWORD_NOT_MATCH", $error_array)){
                    $error_log = $error_log .= "
                                 <li>
                                  <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                                  <p>The passwords dont match</p>
                                </li>
                    ";
                }
            }
       } else {
           // echo "no errors";
       }

} else {
     echo "time has expired";
    //header("Location: http://localhost:8888/timesheet_control/pages/forgot_password.php");
}





?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- PAGE CONTENT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="forgot-password-page" class="pagewrapper">



  <div class="content-page">

  <?php include('../php/functions/database_connection_status_report.php'); ?>

    <div class="card">
      <h1><img src="../media/logo/timesheet_organiser_temporary_logo.svg" alt="Logo" class="logo"></h1>
      <form action="#" method="post">
        <input type="password" name="new_password" placeholder="New password">
        <input type="password" name="new_password_confirm" placeholder="Confirm new password">
        <input type="hidden" name="token" value="<?php echo token_generator();?>">
        <input type="submit" class="button button-blue" name="reset-password-submit-button" value="Set new password">
      </form>
    </div>
  </div>
  <div id="register-error-note">
        <?php display_message() ?>
  </div>

</div>




  <?php include('../partials/scripts_import.php'); ?>
  <?php include('../partials/footer.php'); ?>
