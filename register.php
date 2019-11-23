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

<div id="register-page" class="pagewrapper">

    <div class="sidebar">
        <a href="index.php" class="button button-darkgrey sidebar-bottom"> Back to start</a>
    </div>

    <div class="content-page">
        <div class="card">
            <form action="#">
                <input type="text" name="first_name" placeholder="Firstname">
                <input type="text" name="last_name" placeholder="Lastname">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="email" placeholder="E-Mail">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirm" placeholder="Password confrim">
                <input type="submit" class="button button-blue" placeholder="Register">
            </form>
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

