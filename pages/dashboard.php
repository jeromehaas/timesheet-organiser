<?php include('../php/functions/session_start.php'); ?>
<?php include('../php/functions/database_connection.php'); ?>
<?php include('../php/functions/helper_functions.php'); ?>
<?php include('../php/functions/clear_message.php'); ?>
<?php include('../partials/head.php'); ?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- CHECK IF USER IS VERIFICATED SCRIPT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<?php

if (isset($_SESSION['username']) || isset($_COOKIE['username'])) {



} else {


    header("Location: http://localhost:8888/timesheet_control/index.php");

}

?>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- PAGE CONTENT -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->

<div id="dashboard-page" class="pagewrapper">

    <div class="sidebar">
        <a href="logout.php" class="button button-darkgrey sidebar-bottom">Logout</a>
    </div>

    <div class="content-page">

    <?php include('../php/functions/database_connection_status_report.php'); ?>

        <div class="journal-entity">
            <div class="journal-entity-title">Thursday, 21.11.2019</div>
            <div class="journal-entity-wrapper">
                <div class="journal-entity-label">
                    <p class="label">From</p>
                    <p class="label">To</p>
                    <p class="label label-grow">Description</p>
                    <p class="label">Task ID</p>
                    <p class="label">Totla</p>
                    <button class="placeholder-icon"></button>
                </div>
                <div class="journal-entity-item-container">
                    <li class="journal-entity-item">
                        <input class="input input-small" type="text">
                        <input class="input input-small" type="text">
                        <input class="input input-big" type="text">
                        <input class="input input-small" type="text">
                        <input class="input input-small" type="text">
                        <button class="delete-icon"></button>
                    </li>
                    <li class="journal-entity-item">
                        <input class="input input-small" type="text">
                        <input class="input input-small" type="text">
                        <input class="input input-big" type="text">
                        <input class="input input-small" type="text">
                        <input class="input input-small" type="text">
                        <button class="delete-icon"></button>
                    </li>
                    <li class="journal-entity-item">
                        <input class="input input-small" type="text">
                        <input class="input input-small" type="text">
                        <input class="input input-big" type="text">
                        <input class="input input-small" type="text">
                        <input class="input input-small" type="text">
                        <button class="delete-icon"></button>
                    </li>
                    <li class="new-journal-entity-item">
                        <input class="input" type="text" placeholder="Add description of Task">
                        <input class="new-journal-entity-item-button" type="submit" value="Add">
                        <button class="placeholder-icon"></button>
                    </li>
                </div>
            </div>
        </div>



    </div>

</div>

  <?php include('../partials/scripts_import.php'); ?>
  <?php include('../partials/footer.php'); ?>

