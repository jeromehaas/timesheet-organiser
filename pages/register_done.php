<?php include('../php/functions/session_start.php'); ?>
<?php include('../php/functions/database_connection.php'); ?>
<?php include('../php/functions/helper_functions.php'); ?>
<?php include('../php/functions/clear_message.php'); ?>
<?php include('../partials/head.php'); ?>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- USER ACTIVATION SCRIPT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (isset($_GET['email'])) {

        $email = $_GET['email'];
        $activation_code = $_GET['activation_code'];

        $check_get_parameter = mysqli_query($con, "SELECT username FROM user_table WHERE email = '" .  $email . "' AND activation_code = '" . $activation_code . "'" );
        $check_get_parameter_rows = mysqli_num_rows($check_get_parameter);

        if ($check_get_parameter_rows == 1) {
            $update_query = "UPDATE user_table SET active = 1, activation_code = 0 WHERE email = '" . $email . "' AND activation_code = '" . $activation_code . "'";
            if (mysqli_query($con, $update_query)) {
                // echo "yes dude, its working!";
                set_message("
                            <p>
                                You are all set! <br/>
                                You can now login with your credentials.
                            </p>
                            <img src='http://localhost:8888/timesheet_control/media/icons/icon_success.png' class='icon-small' alt='icon success'>
                            <br/> <br/>
                            <a href=''../index.php' class='button button-blue'>Login</a>
                ");
            } else {
                echo "ERROR: Could not execute $update_query. " . mysqli_error($con);
            }
        } else {
            // echo "already activated";
            set_message("
                        <p>
                            Your account has already been acivated! <br/>
                        </p>
                        <img src='http://localhost:8888/timesheet_control/media/icons/icon_success.png' class='icon-small' alt='icon success'>
                        <br/> <br/>
                        <a href='../index.php' class='button button-blue'>Login</a>
            ");
        }

    }

}

?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- PAGE CONTENT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="register-done-page" class="pagewrapper">



    <div class="content-page">

    <?php include('../php/functions/database_connection_status_report.php'); ?>

        <div class="card">

            <?php display_message() ?>
            <!--
            <p>
                You are all set! <br/>
                You can now login with your credentials.
            </p>
            <img src="http://localhost:8888/timesheet_control/media/icons/icon_success.png" class="icon-small alt="icon success">
            <br/> <br/>
            <a href="../index.php" class="button button-blue">Login</a>
            -->
        </div>

    </div>

</div>

  <?php include('partials/scripts_import.php'); ?>
  <?php include('partials/footer.php'); ?>

