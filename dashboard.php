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

<div id="dashboard-page" class="pagewrapper">

    <div class="sidebar">
        <a href="index.php" class="button button-darkgrey sidebar-bottom">Logout</a>
    </div>

    <div class="content-page">

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

