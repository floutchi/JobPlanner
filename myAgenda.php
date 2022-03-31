<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-agenda.css">
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>My agenda</title>
</head>
<body>

<?php require('php/header.inc.php');?>

<div class="container">

    <div class="btn-div"><button class="btn" type="button" title="Add evenement"><img id="newDate" src="assets/calendar-plus-fill.svg" alt=""
                                                                                                   width="50" height="40"></button>
    <button class="btn" type="button" title="Export calendar"><img id="export" src="assets/box-arrow-up-right.svg" alt=""
                                                                                      width="50" height="40"></button></div>



    <div class="row row-striped">
        <div class="col-2 text-right">
            <h1 class="display-4"><span class="badge badge-secondary radiusAgenda">23</span></h1>
            <h2>MAR</h2>
        </div>
        <div class="col-10">
            <h3 class="text-uppercase"><strong>Social Meeting</strong></h3>
            <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i>Wednesday</li>
                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
                <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i>Office</li>
            </ul>
            <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>


    <div class="row row-striped">
        <div class="col-2 text-right">
            <h1 class="display-4"><span class="badge badge-secondary">25</span></h1>
            <h2>MAR</h2>
        </div>
        <div class="col-10">
            <h3 class="text-uppercase"><strong>Operations Meeting</strong></h3>
            <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Friday</li>
                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 2:30 PM - 4:00 PM</li>
                <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Room 4019</li>
            </ul>
            <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>

    <div class="row row-striped">
        <div class="col-2 text-right">
            <h1 class="display-4"><span class="badge badge-secondary">04</span></h1>
            <h2>APR</h2>
        </div>
        <div class="col-10">
            <h3 class="text-uppercase"><strong>Operations Meeting</strong></h3>
            <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i>Monday</li>
                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 1:30 PM - 3:00 PM</li>
                <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Room M205</li>
            </ul>
            <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>

    <div class="row row-striped">
        <div class="col-2 text-right">
            <h1 class="display-4"><span class="badge badge-secondary">05</span></h1>
            <h2>APR</h2>
        </div>
        <div class="col-10">
            <h3 class="text-uppercase"><strong>Candidate Meeting</strong></h3>
            <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i>Tuesday</li>
                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 1:30 PM - 5:30 PM</li>
                <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Room M206</li>
            </ul>
            <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>


</div>


</body>
</html>