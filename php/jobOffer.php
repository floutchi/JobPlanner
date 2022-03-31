<?php
require 'db_offer.inc.php';
require 'db_user.inc.php';

use User\User;
use Application\Application;
use Application\ApplicationRepository;
use Offer\OfferRepository;
use User\UserRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$offerRepository = new OfferRepository();
$userRepository = new UserRepository();

$idOffer = null;

if(!isset($_GET['idOffer'])) {
    header('Location : index.php');
} else {
    $idOffer = $_GET['idOffer'];
}

$offer = $offerRepository->showOffer($idOffer);
$message = "";

if(isset($_POST['submit'])) {
    $user = new User();
    $user->nom = htmlentities($_POST['name']);
    $user->prenom = htmlentities($_POST['firstname']);
    $user->email = htmlentities($_POST['email']);
    $user->phone = htmlentities($_POST['phone']);
    $user->password = $user->generateRandomPassword();
    $user->isRH = 0;

    $userRepository->storeMember($user, $message);

    $application = new Application();

    //$diploma = htmlentities($_POST['diploma']);
    //$disponibility = htmlentities($_POST['disponibility']);


}

function sendMail($user, &$message) {
    try {
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('noReply@delloite.com');
        $mail->addAddress($user->email);
        $mail->isHTML(false);
        $mail->Subject = "Your application to Deloitte";
        $mail->Body = 'Thank you for applying to Deloitte,\n' .
            'So that you can send an application again if necessary without having to ' .
            'fill in the various forms again, we have created an account for you. '.
            'You can log in with your email address and this password: ' . $user->password .
            'Sincerely, the Deloitte team';
        $mail->send();
    } catch (Exception $e) {
        $message = "An error occurred, please try later";
    }
}

function downloadCV() {

}

function generateCVName($offer, $email) {
    return $offer->titleOffer . "-" . $email . ".pdf";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Offer</title>
</head>

<body class="bg-light">

<!-- Navigation bar -->
<div class="container-fluid fixed-top" >
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

<!-- Job description -->
<div class="container marketing container-margin">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading title_societyColor"><?php echo $offer->titleOffer ?></h2>
            <p class="lead"><?php echo $offer->descriptionOffer?></p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                 style="width: 250px; height: 250px;"
                 src="../img/deloitte2.jpg"
                 data-holder-rendered="true">
        </div>
    </div>
    <hr class="featurette-divider">
</div>

<!-- Formulaire pour la soumission d'un CV-->
<div class="registration-form">
    <form method="POST">
        <h2 class="mb-5"><?php echo $offer->titleOffer ?></h2>
        <h3><?php if(!empty($message)) echo $message ?></h3>
        <div class="form-group">
            <input type="text" class="form-control item" id="name" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="firstname" placeholder="Firstname" name="firstname">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="email" placeholder="Mail address" name="email">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number" name="phone">
        </div>

        <div class="form-group">
            <textarea name="motivations" class="form-control item" placeholder="Your motivations (optional)"></textarea>
        </div>


        <div class="form-group">
            <label style="display: block">
                <input type="radio" name="langageFrench" style="padding-right: 30%" value="A">
                <label class="langageForm">French</label>
            </label>

            <label style="display: block">
                <input type="radio" name="langageEnglish" style="padding-right: 30%" value="A">
                <label class="langageForm">English</label>
            </label>

            <label style="display: block">
                <input type="radio" name="langageNeederlands" style="padding-right: 30%" value="A">
                <label class="langageForm">Netherlands</label>
            </label>

            <label style="display: block">
                <input type="radio" name="langageAllemand" style="padding-right: 30%" value="A">
                <label class="langageForm">Allemand</label>
            </label>
        </div>


        <div class="form-group">
            <select class="form-control item" name="diploma">
                <option selected value="Community College">Community college</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Master">Master</option>
            </select>
        </div>

        <div class="form-group">
            <select class="form-control item" name="disponibility">
                <option selected>Able to start in</option>
                <option value="Immediatly">Immediatly</option>
                <option value="in 3 months (or less)">in 3 months (or less)</option>
                <option value="in 6 months (or less)">in 6 months (or less)</option>
                <option value="More">More</option>
            </select>
        </div>

        <div class="form-group">
            <input type="file" accept="image/*,.pdf" class="form-control item" id="cv" placeholder="Your cv">
        </div>

        <div class="form-group mb-2">
            <button type="submit" class="btn btn-block create-account" name="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>