<?php
require 'php/db_offer.inc.php';

require 'php/db_user.inc.php';

use Offer\Offer;
use Offer\OfferRepository;

session_start();
$offerRepository = new OfferRepository();

$message = "";

if(isset($_POST['create'])) {
    $offer = new Offer();
    $offer->titleOffer = htmlentities($_POST['title']);
    $offer->descriptionOffer = htmlentities($_POST['description']);
    $offer->contractType = htmlentities($_POST['contract']);
    $offer->jobStartDate = htmlentities($_POST['startDate']);
    $offer->skillsOffer = htmlentities($_POST['skills']);

    $offerRepository->storeOffer($offer, $message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-createOffer.css">
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>JobPlanner - Create evenement</title>
</head>
<body>

<?php require('php/header.inc.php');?>

<!-- Formulaire pour la soumission d'un CV-->
<div class="registration-form">
    <form class="mt-5" method="POST">
        <h2 class="mb-5">Create evenement</h2>
        <h5 style="color: #146c43"><?php if(!empty($message)) echo $message?></h5>

        <h6>Description</h6>
        <div class="form-group">
            <input type="text" name="description" class="form-control item" id="desc" placeholder="Description">
        </div>

        <h6>Date</h6>
        <div class="form-group">
            <input type="Date" name="date" class="form-control item" id="date" placeholder="Date">
        </div>

        <h6>Since</h6>
        <div class="form-group">
            <input type="text" name="heureDebut" class="form-control item" id="heureDebut" placeholder="00:00">
        </div>

        <h6>To</h6>
        <div class="form-group">
            <input type="text" name="heureFin" class="form-control item" id="heureFin" placeholder="00:00">
        </div>
        <div class="form-group mb-2">
            <button type="submit" name="create" class="btn btn-block create-account">Create</button>
        </div>
    </form>
</div>

</body>
</html>
