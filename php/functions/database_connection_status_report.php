<?php

  //HERE YOU DISPLAY AN MESSAGE FOR TESTING PURPOSES
  if($con) {
      echo "
       <div id='database-connection-status'>
          <li>
            <img src='http://localhost:8888/timesheet_control/media/icons/icon_success.png' class='icon-small' alt=''>
            <p>database-connection is successfull</p>
          </li>
          <li>
       </div>
      ";
  } else {
      echo "
        <div id='database-connection-status'>
            <li>
            <img src='http://localhost:8888/timesheet_control/media/icons/icon_error.png' class='icon-small' alt=''>
            <p>database-connection failure</p>
            </li>
            <li>
        </div>
      ";
  }

  ?>