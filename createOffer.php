<?php
require 'php/db_offer.inc.php';
require 'php/db_user.inc.php';

use Offer\Offer;
use Offer\OfferRepository;
use User\UserRepository;

session_start();

$offerRepository = new OfferRepository();
$userRepository = new UserRepository();

$message = "";

if(isset($_POST['create'])) {
    $offer = new Offer();
    $offer->titleOffer = htmlentities($_POST['title']);
    $offer->descriptionOffer = htmlentities($_POST['description']);
    $offer->contractType = htmlentities($_POST['contract']);
    $offer->jobStartDate = htmlentities($_POST['startDate']);
    $offer->skillsOffer = htmlentities($_POST['skills']);
    $offer->idRH = intval($_SESSION['idUser']);

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
    <title>JobPlanner - Create offer</title>
</head>
<body>

<?php require('php/header.inc.php');?>

<!-- Formulaire pour la soumission d'un CV-->
<div class="registration-form">
    <form class="mt-5" method="POST">
        <h2 class="mb-5">Create offer</h2>
        <h5 style="color: #146c43"><?php if(!empty($message)) echo $message?></h5>

        <h6>Title</h6>
        <div class="form-group">
            <input type="text" name="title" class="form-control item" id="title" placeholder="Title">
        </div>
        <h6>Description</h6>
        <div class="form-group">
            <input type="text" name="description" class="form-control item" id="desc" placeholder="Description">
        </div>

        <h6>Contract type</h6>
        <div class="form-group">
            <input type="text" name="contract" class="form-control item" id="contract" placeholder="Contract type">
        </div>

        <h6>Job start date</h6>
        <div class="form-group">
            <input type="Date" name="startDate" class="form-control item" id="date" placeholder="Date">
        </div>

        <h6>Skills</h6>
        <div class="form-group">
            <input type="text" name="skills" class="form-control item" id="skills" placeholder="Skills">
        </div>

        <h6>Image</h6>
        <div class="form-group">
            <input type="file" accept="image/*,.png, .jpg, .jpeg" class="form-control item" id="cv" placeholder="Photo">
        </div>

        <div class="form-group mb-2">
            <button type="submit" name="create" class="btn btn-block create-account">Create</button>
        </div>
    </form>
</div>

</body>
</html>