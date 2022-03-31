<?php
require 'db_offer.inc.php';

use Offer\OfferRepository;

$offerRepository = new OfferRepository();

$resultat = $offerRepository->showOffers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>My offers</title>
</head>
<body>

<!-- Navigation bar -->
<div class="container-fluid fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Deloitte - JobPlanner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.php#joboffer">Job offers</a></li>
                    <li class="nav-item active"><a class="nav-link" href="myOffers.php">My offers</a></li>
                    <li class="nav-item"><a class="nav-link" href="myAgenda.html">My agenda</a></li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-light bg-light bg-opacity-100 justify-content-between">
            <img src="../assets/person-fill.svg" alt="" width="30" height="24">
        </nav>
    </nav>
</div>

<!-- My offers -->
<div class="container-md">
    <div class="row" id="joboffer">

        <?php
        while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo
            '<div class="col-lg-4">
            <img class="rounded-circle" src="../img/deloitte.jpeg" alt="Generic placeholder image" width="140"
                 height="140">
            <h2>'. $row['titleOffer'] .'</h2>
            <p>'. $row['descriptionOffer'] .'</p>
            <div class="edelete">
                <ul >
                    <li class="list-inline-item"><a class="btn btn-secondary btn_societyColor" href="#" role="button">View application »</a></li>
                    <li class="list-inline-item">
                        <button class="btn" type="button" title="Edit"><img id="edit" src="../assets/pencil-fill.svg" alt=""
                                                                            width="20" height="19"></button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn" type="button" title="Delete"><img id="delete" src="../assets/trash-fill.svg"
                                                                              alt="" width="20" height="19"></button>
                    </li>
                </ul>
            </div>';
        }
        ?>
</div>

</body>
</html>