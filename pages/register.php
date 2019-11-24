<?php include('../php/functions/session_start.php'); ?>
<?php include('../php/functions/database_connection.php'); ?>
<?php include('../php/functions/helper_functions.php'); ?>
<?php include('../php/functions/clear_message.php'); ?>
<?php include('../partials/head.php'); ?>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- USER REGISTER SCRIPT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

if(isset($_POST['register-submit-button'])) {

    //------------------------------------
    // DECLARE VARIABLES -----------------
    //------------------------------------

    $firstname = "";
    $lastname = "";
    $username = "";
    $email = "";
    $password = "";
    $password_confirm = "";
    $activation_code = "";
    $active_status = "";


    //------------------------------------
    // ASSIGN VARIABLES ------------------
    //------------------------------------

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];




    //------------------------------------
    // CREATE EMTY ARRAY TO STORE ERRORS--
    //------------------------------------

    $error_array = array();

    //------------------------------------
    // CHECK FIRSTNAME -------------------
    //------------------------------------

    $firstname = str_replace(" ", "", $firstname);
    $firstname = strtolower($firstname);
    $firstname = ucfirst($firstname);

    if (strlen($firstname) < 3) {
        array_push($error_array, "ERROR_FIRSTNAME_LENGTH");
    }

   $_SESSION['reg_firstname'] = $firstname;

   //------------------------------------
   // CHECK FIRSTNAME -------------------
   //------------------------------------

   $lastname = str_replace(" ", "", $lastname);
   $lastname = strtolower($lastname);
   $lastname = ucfirst($lastname);

   if (strlen($firstname) < 3 ) {
        array_push($error_array, "ERROR_LASTNAME_LENGTH");
   }

   $_SESSION['reg_lastname'] = $lastname;

   //------------------------------------
   // CHECK USERNAME -------------------
   //------------------------------------

    $username = str_replace(" ", "", $username);
    $username = strtolower($username);

    $username = str_replace("ä", "ae" , $username);
    $username = str_replace("Ä", "Ae" , $username);
    $username = str_replace("ö", "oe" , $username);
    $username = str_replace("Ö", "Oe" , $username);
    $username = str_replace("ü", "ue" , $username);
    $username = str_replace("Ü", "Ue" , $username);

    $username_exist_check = mysqli_query($con, "SELECT username FROM user_table WHERE username = '$username'");
    $username_exist_row = mysqli_num_rows($username_exist_check);
    if ($username_exist_row > 0) {
        array_push($error_array, "ERROR_USERNAME_EXISTS");
    }

    $_SESSION['reg_username'] = $username;

   //------------------------------------
   // CHECK EMAIL -----------------------
   //------------------------------------

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_exist_check = mysqli_query($con, "SELECT email FROM user_table WHERE email = '$email'");
        $email_exist_row = mysqli_num_rows($email_exist_check);
        if($email_exist_row > 0) {
            array_push($error_array, "ERROR_EMAIL_EXISTS");
        }
        $_SESSION['reg_email'] = $email;
    } else {
        array_push($error_array, "ERROR_EMAIL_FORMAT");
    }

   //------------------------------------
   // CHECK PASSWORD --------------------
   //------------------------------------

    $password = strip_tags($password);
    $password_confirm = strip_tags($password_confirm);

   if ((preg_match('/[\'^£$!%&*()}{@#~?><>,|=_+-]/', $password)) && (preg_match('#[0-9]#', $password)) && (strlen($password) > 6)) {

        if ($password != $password_confirm) {
            array_push($error_array, "ERROR_PASSWORDS_NOMATCH");
        } else {
            $password = password_hash($password, PASSWORD_BCRYPT);
        }

   } else {
        array_push($error_array, "ERROR_PASSWORD_CONDITIONS");
   }

   //------------------------------------
   // CREATE ACTIVATION-CODE ------------
   //------------------------------------


   $activation_code = md5($username . microtime());

   //------------------------------------
   // SET STATUS TO INACTIVE (0) --------
   //------------------------------------

    $active_status = '0';

   //------------------------------------
   // CHECK IF ERRORS STORED IN ARRAY ---
   //------------------------------------

   if (!empty($error_array)) {
        /*for ($i = 0; $i < sizeof($error_array); $i++) {
            echo $error_array[$i] . "<br>";
        }*/
   } else {
        echo "no error found" . "<br> ";
        $user_upload =
        "INSERT INTO
        user_table
        VALUES (
        '$username',
        '$firstname',
        '$lastname',
        '$email',
        '$password',
        '$activation_code',
        '$active_status')";


    if (mysqli_query($con, $user_upload)) {

        // echo "user successfully uploaded";

        $subject = "Activate account";
        $message = "please click the link below to activate your account"
                    . "<br>"
                    . "http://localhost:8888/timesheet_control/pages/register_done.php?"
                    . "email=$email&"
                    . "activation_code=$activation_code";
        $headers = "From: info@timesheet-organiser.com";

        unset ($_SESSION["reg_firstname"]);
        unset ($_SESSION["reg_lastname"]);
        unset ($_SESSION["reg_username"]);
        unset ($_SESSION["reg_email"]);

        header("Location: http://localhost:8888/timesheet_control/pages/register_success.php?$email&");


    } else {
        echo "ERROR: Could not execute $user_upload. " . mysqli_error($con);
    }

  }

  mysqli_close($con);


  $error_log = "";

    if(in_array("ERROR_FIRSTNAME_LENGTH", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>Firstname must contain 3 or more letters</p>
                    </li>
        ";
    }

    if(in_array("ERROR_LASTNAME_LENGTH", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>Lastname must contain 3 or more letters</p>
                    </li>
        ";
    }

    if(in_array("ERROR_USERNAME_EXISTS", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>Username already exist</p>
                    </li>
        ";
    }

    if(in_array("ERROR_EMAIL_EXISTS", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>This email-addressexists already</p>
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

    if(in_array("ERROR_PASSWORDS_NOMATCH", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>The passwords do not match</p>
                    </li>
        ";
    }

    if(in_array("ERROR_PASSWORD_CONDITIONS", $error_array)){
        $error_log = $error_log .= "
                     <li>
                      <img src='../media/icons/icon_error.png' class='icon-small' alt='icon error'>
                      <p>the password must contain 6 characters and it must contain at least one number and one special character</p>
                    </li>
        ";
    }






    set_message($error_log);

} // END OF ISSET REGISTER-SUBMIT-BUTTON

?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- PAGE CONTENT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="register-page" class="pagewrapper">



    <div class="sidebar">
        <a href="../index.php" class="button button-darkgrey sidebar-bottom"> Back to start</a>
    </div>

    <div class="content-page">

        <?php include('../php/functions/database_connection_status_report.php'); ?>

        <div class="card">
            <form action="register.php" method="post">
                <input type="text" name="firstname" placeholder="Firstname"     value="<?php if(isset($_SESSION['reg_firstname'])) {echo $_SESSION['reg_firstname']; } ?>">
                <input type="text" name="lastname"  placeholder="Lastname"      value="<?php if(isset($_SESSION['reg_lastname']))  {echo $_SESSION['reg_lastname']; } ?>">
                <input type="text" name="username"  placeholder="Username"      value="<?php if(isset($_SESSION['reg_username']))  {echo $_SESSION['reg_username']; } ?>">
                <input type="text" name="email"     placeholder="E-Mail"        value="<?php if(isset($_SESSION['reg_email']))     {echo $_SESSION['reg_email']; } ?>">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirm" placeholder="Password confirm">
                <input type="submit" name="register-submit-button" class="button button-blue" value="Register">
            </form>
        </div>
        <div id="register-error-note">

            <?php display_message(); ?>

        </div>
    </div>

</div>

  <?php include('../partials/scripts_import.php'); ?>
  <?php include('../partials/footer.php'); ?>

