<?php include('../php/functions/session_start.php'); ?>
<?php include('../php/functions/database_connection.php'); ?>
<?php include('../php/functions/helper_functions.php'); ?>
<?php include('../php/functions/clear_message.php'); ?>
<?php include('../partials/head.php'); ?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- FORGOT PASSWORD CODE SCRIPT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

if (isset($_COOKIE['temp_access_code'])) {



    set_message("
             <li>
             <img src='../media/icons/icon_mail.png' class='icon-small' alt='icon error'>
             <p>" . $_SESSION['reset_code'] . "</p>
             </li>
    ");



    if (isset($_POST['forgot-password-code-submit-button'])) {
        if (!isset($_GET['email']) || !isset($_GET['activation_code'])) {
                set_message("
                         <li>
                         <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                         <p>no GET-request</p>
                         </li>
                ");
        } else if (empty($_GET['email']) || empty($_GET['activation_code'])) {
                set_message("
                         <li>
                         <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                         <p>GET-request us empty</p>
                         </li>
                ");
        } else if ($_POST['reset_code'] == $_SESSION['reset_code'] ){
            $activation_code = $_GET['activation_code'];
            $email = $_GET['email'];
            $check_reset_code = mysqli_query($con, "SELECT username FROM user_table WHERE activation_code = '" .  $activation_code . "' AND email = '". $email ."' ");
            $check_reset_code_rows = mysqli_num_rows($check_reset_code);
            if ($check_reset_code_rows == 1) {
                setcookie('temp_access_code', $activation_code, time() + 300);
                $_SESSION['token'] = $_POST['token'];
                header("Location: http://localhost:8888/timesheet_control/pages/reset_password.php?email=$email&activation_code=$activation_code");
            }
        } else if (!$_POST['reset_code'] == !$_SESSION['reset_code'] ){
             set_message("
                      <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>The code is not correct</p>
                      </li>
             ");
        }

    }

} else {

    // echo "the code is expired";

    set_message("
             <li>
             <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
             <p>The code is expired. <br>
             Please reset your email again. <br>

             </p>
             </li>
    ");

    //header("Location: http://localhost:8888/timesheet_control/index.php");

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
        <input type="text" name="reset_code" placeholder="Code">
        <input type="submit" class="button button-blue" name="forgot-password-code-submit-button" value="Reset Password">
      </form>
    </div>
  </div>
  <div id="register-error-note">
        <?php display_message() ?>
  </div>

</div>




  <?php include('../partials/scripts_import.php'); ?>
  <?php include('../partials/footer.php'); ?>
