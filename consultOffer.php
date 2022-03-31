<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-candidateList.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Offer</title>
</head>
<body class="bg-light">

<?php require('php/header.inc.php');?>


<!-- Job description -->
<div class="container marketing container-margin">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading title_societyColor">IT Developer.</h2>
            <p class="lead">Recherche active d'un développeur dans le milieu du Software. Bonnes connaissances en Java
                ainsi qu'en utilisation de
                la technologie dotnet (6 conseillé). Bachelier minimum requis ainsi qu'une maitrise parfaite du
                Français, Anglais. La maitrise et/ou compréhension
                du néérlandais est également conseillé.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                 style="width: 250px; height: 250px;"
                 src="img/deloitte2.jpg"
                 data-holder-rendered="true">
        </div>
    </div>
    <hr class="featurette-divider">
</div>


<!-- Candidats -->
<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 colorForItems">JAVA - C# - ENVIE DE CANNER</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">John Doe</a>
                    </h3>
                    <div class="mb-1 text-muted">Français - Allemand - SquidGame</div>
                    <p class="card-text mb-auto">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
                        semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
                        commodo.
                    </p>
                    <div class="d-flex col-md-12 justify-content-between">
                        <button class="btn btn-block btnColor" href="#">Télécharger CV</button>
                        <div class="d-flex flex-row mt-2">
                            <a href="index.php"><img src="assets/person-check-fill.svg" alt="" width="30" height="24"></a>
                            <a href="index.php"><img src="assets/person-x-fill.svg" alt="" width="30" height="24"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>
</html>