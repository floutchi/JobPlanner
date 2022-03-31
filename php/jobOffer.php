<?php
require 'db_offer.inc.php';
require 'db_user.inc.php';
require 'db_application.inc.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';



use User\User;
use Application\Application;
use Application\ApplicationRepository;
use Offer\OfferRepository;
use User\UserRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$offerRepository = new OfferRepository();
$userRepository = new UserRepository();
$applicationRepository = new ApplicationRepository();

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

    if(!$userRepository->existInDb($user->email, $message)) {
        $userRepository->storeMember($user, $message);
        sendNewUserMail($user, $message);
    } else {
        sendApplicationMail($user, $message);
    }


    $application = new Application();
    $application->idCandidat = $userRepository->getUserByMail($user->email, $message)->idUser;
    $application->idOffer = $idOffer;
    $application->motivation = htmlentities($_POST['motivations']);
    $application->ableToStartIn = htmlentities($_POST['disponibility']);
    $application->cvURL = downloadCV($offer, $user->email);
    $application->diploma = htmlentities($_POST['diploma']);
    $selectedLanguages = "";
    foreach ($_POST['langage'] as $s) {
        $selectedLanguages .= $s . ", ";
    }
    if(!empty($selectedLanguages)) {
        $selectedLanguages = substr($selectedLanguages, 0, -2);
    }

    $application->language = $selectedLanguages;

    $applicationRepository->storeApplication($application, $message);

}

function sendNewUserMail($user, &$message) {
    try {
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('noReply@delloite.com');
        $mail->addAddress($user->email);
        $mail->isHTML(false);
        $mail->Subject = "Your account on JobPlanner at Deloitte";
        $mail->Body = "Thank you for applying to Deloitte,\n" .
            "So that you can send an application again if necessary without having to " .
            "fill in the various forms again, we have created an account for you. ".
            "You can log in with your email address and this password: " . $user->password .
            "Sincerely, the Deloitte team";
        $mail->send();
    } catch (Exception $e) {
        $message = "An error occurred, please try later";
    }
}

function sendApplicationMail($user, &$message) {
    try {
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('noReply@delloite.com');
        $mail->addAddress($user->email);
        $mail->isHTML(false);
        $mail->Subject = "Your application to Deloitte";
        $mail->Body = "Thank you for submitting your application,".
            "an email will be sent to you when your application is accepted or rejected.\n\n".
            "Sincerely, the Deloitte team";
        $mail->send();
    } catch (Exception $e) {
        $message = "An error occurred, please try later";
    }
}

function downloadCV($offer, $email) {
    $fileName = generateCVName($offer, $email);

    move_uploaded_file($_FILES['cv']['tmp_name'], "../uploads/$fileName");
    return "./uploads/$fileName";
}

function generateCVName($offer, $email) {
    return $offer->titleOffer . "!" . $email . ".pdf";
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

<?php require('header.inc.php');?>

<body class="bg-light">

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
    <form method="POST" enctype="multipart/form-data">
        <h2 class="mb-5"><?php echo $offer->titleOffer ?></h2>
        <h6 style="color: #0f5132"><?php if(!empty($message)) echo $message ?></h6>

        <h6>Name</h6>
        <div class="form-group">
            <input type="text" class="form-control item" id="name" placeholder="Name" name="name">
        </div>
        <h6>Firstname</h6>
        <div class="form-group">
            <input type="text" class="form-control item" id="firstname" placeholder="Firstname" name="firstname">
        </div>
        <h6>Mail address</h6>
        <div class="form-group">
            <input type="text" class="form-control item" id="email" placeholder="Mail address" name="email">
        </div>
        <h6>Phone number</h6>
        <div class="form-group">
            <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number" name="phone">
        </div>

        <h6>Motivations</h6>
        <div class="form-group">
            <textarea name="motivations" class="form-control item" placeholder="Your motivations (optional)"></textarea>
        </div>

        <h6>Diploma</h6>
        <div class="form-group">
            <select class="form-control item" name="diploma">
                <option selected value="Community College">Community college</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Master">Master</option>
            </select>
        </div>

        <h6>Your spoken languages</h6>
        <div class="form-group">
            <label style="display: block">
                <input type="checkbox" name="langage[]" style="padding-right: 30%" value="FR">
                <label class="langageForm">French</label>
            </label>

            <label style="display: block">
                <input type="checkbox" name="langage[]" style="padding-right: 30%" value="EN">
                <label class="langageForm">English</label>
            </label>

            <label style="display: block">
                <input type="checkbox" name="langage[]" style="padding-right: 30%" value="NE">
                <label class="langageForm">Netherlands</label>
            </label>

            <label style="display: block">
                <input type="checkbox" name="langage[]" style="padding-right: 30%" value="DE">
                <label class="langageForm">Allemand</label>
            </label>
        </div>

        <br>

        <h6>Your disponibility</h6>
        <div class="form-group">
            <select class="form-control item" name="disponibility">
                <option selected>Able to start in</option>
                <option value="Immediatly">Immediatly</option>
                <option value="in 3 months (or less)">in 3 months (or less)</option>
                <option value="in 6 months (or less)">in 6 months (or less)</option>
                <option value="More">More</option>
            </select>
        </div>

        <h6>CV</h6>
        <div class="form-group">
            <input type="file" accept="image/*,.pdf" class="form-control item" id="cv" placeholder="Your cv" name="cv">
        </div>


        <div class="form-group mb-2">
            <button type="submit" class="btn btn-block create-account" name="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>