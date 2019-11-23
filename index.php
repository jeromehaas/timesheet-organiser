<!doctype html>
<html lang="en">

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- HEAD -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="A timetracker tool for the 20th century">
  <meta name="author" content="Jerome Haas">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/central.css">
  <meta name="theme-color" content="#fafafa">
</head>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- BODY START -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<body>

<div id="login-page" class="pagewrapper">


  <div class="content-page">
    <div class="card">
      <h1><img src="media/logo/timesheet_organiser_temporary_logo.svg" alt="Logo" class="logo"></h1>
      <form action="#">
        <input type="text" name="username" placeholder="E-Mail">
        <input type="password" name="password"placeholder="Password">
        <input type="submit" class="button button-blue" value="Login">
        <div class="links-box">
          <a href="register.php" class="blue-link">Register</a>
          <a href="#" class="blue-link">Forgot password?</a>
        </div>
      </form>
    </div>
  </div>
  <div id="register-error-note">
    <li>
      <img src="media/icons/icon_error.png" class="icon-small" alt="">
      <p>Username already exist</p>
    </li>
    <li>
      <img src="media/icons/icon_error.png" class="icon-small" alt="">
      <p>Passwords dont match</p>
    </li>
  </div>

</div>




  <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- SCRIPTS SECTION -->
  <!-------------------------------------------------------------------------------------------------------------------------------------------------------->
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>

</body>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- BODY END -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------->


</html>
