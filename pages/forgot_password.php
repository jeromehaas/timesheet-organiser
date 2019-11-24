<?php include('../php/functions/session_start.php'); ?>
<?php include('../php/functions/database_connection.php'); ?>
<?php include('../php/functions/helper_functions.php'); ?>
<?php include('../php/functions/clear_message.php'); ?>
<?php include('../partials/head.php'); ?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- FORGOT PASSWORD SCRIPT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

$error_array = array();

if (isset($_POST['forgot-password-submit-button'])) {

     if (isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {



            $email = htmlentities($_POST['email']);
            $activation_code = $_POST['token'];
            $reset_code = mt_rand(100000, 999999);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                $email_exist_check = mysqli_query($con, "SELECT email FROM user_table WHERE email = '$email'");
                $email_exist_row = mysqli_num_rows($email_exist_check);
                if($email_exist_row > 0) {

                       setcookie('temp_access_code', $activation_code, time() + 600);
                       $_SESSION['reset_code'] = $reset_code;

                       $update_query = "UPDATE user_table SET activation_code = '". $activation_code ."' WHERE email = '" . $email . "' ";
                       if (mysqli_query($con, $update_query)) {
                           // echo "activation code has been updated";

                           set_message("
                                       <p>
                                           activation code has been updated.
                                       </p>
                                       <img src='http://localhost:8888/timesheet_control/media/icons/icon_success.png' class='icon-small' alt='icon success'>
                                       <br/>

                           ");

                       } else {
                           // echo "ERROR: Could not execute $update_query. " . mysqli_error($con);

                           set_message("
                                       <p>
                                           Something went wrong with updating the activation code. <br>
                                           Please contact the administrator.
                                       </p>
                                       <img src='http://localhost:8888/timesheet_control/media/icons/icon_error.png' class='icon-small' alt='icon success'>
                                       <br/>
");


                       };


                       $subject =   "Please verify your e-mail";
                       $message =   " Here is your password reset-code"
                                    . " {$reset_code}";
                       $headers =   "From: info@timesheet-organiser.com";


                       send_email($email, $subject, $message, $headers);

                       header("Location: http://localhost:8888/timesheet_control/pages/forgot_password_code.php?email=" . $email . "&activation_code=" . $activation_code);


                } else {
                    array_push($error_array, "ERROR_EMAIL_NOTEXISTS");
                }

            } else {
                array_push($error_array, "ERROR_EMAIL_FORMAT");
            }

               if (!empty($error_array)) {
                    for ($i = 0; $i < sizeof($error_array); $i++) {
                        echo $error_array[$i] . "<br>";
                    }
               }

    }

  $error_log = "";

    if(in_array("ERROR_EMAIL_NOTEXISTS", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>This email-address does not exist</p>
                    </li>
        ";
    }

    if(in_array("ERROR_EMAIL_FORMAT", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>This email-address is not valid</p>
                    </li>
        ";
    }

set_message($error_log);

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
        <input type="text" name="email" placeholder="E-Mail">
        <input type="hidden" name="token" value="<?php echo token_generator(); ?>">
        <input type="submit" class="button button-blue" name="forgot-password-submit-button" value="Reset Password">
      </form>
    </div>
  </div>
  <div id="register-error-note">
    <?php display_message() ?>
  </div>

</div>




  <?php include('../partials/scripts_import.php'); ?>
  <?php include('../partials/footer.php'); ?>
