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

    <div class="btn-div">
        <button class="btn" type="button" title="Add evenement"><a href="createEvenement.php"><img id="newDate" src="assets/calendar-plus-fill.svg"
                                                                                                   href="createEvenement.php" alt="" width="50"
                                                                                                   height="40"></a></button>
        <button class="btn" type="button" title="Export calendar"><img id="export" src="assets/box-arrow-up-right.svg"
                                                                       alt=""
                                                                       width="50" height="40"></button>
    </div>



    <div class="row row-striped">
        <div class="col-2 text-right">
            <h1 class="display-4"><span class="badge badge-secondary radiusAgenda">21</span></h1>
            <h2>WED</h2>
        </div>
        <div class="col-10">
            <h3 class="text-uppercase"><strong>Appointment with Florian Detiffe</strong></h3>
            <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i>Wednesday</li>
                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 1:30 PM - 2:00 PM</li>
            </ul>
            <p>For Titre de l'offre recruitment</p>
        </div>
    </div>


</div>


</body>
</html>