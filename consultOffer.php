<?php
require 'php/db_offer.inc.php';
require 'php/db_user.inc.php';
require 'php/db_application.inc.php';
require 'php/PHPMailer/src/PHPMailer.php';
require 'php/PHPMailer/src/Exception.php';


use User\User;
use Application\Application;
use Application\ApplicationRepository;
use Offer\OfferRepository;
use User\UserRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

$repository = new ApplicationRepository();
$uRepository = new UserRepository();
$oRepository = new OfferRepository();

$id = $_GET['id_offer'];

$offer = $oRepository->showOffer($id);

$resultat = $repository->showApplicationByOffer($id);

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
            <h2 class="featurette-heading title_societyColor"><?php echo $offer->titleOffer ?></h2>
            <p class="lead"><?php echo $offer->descriptionOffer ?></p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                 src="img/deloitte2.jpg"
                 data-holder-rendered="true">
        </div>
    </div>
    <hr class="featurette-divider">
</div>

<div class="container" style="padding-bottom: 10px; display: flex">
    <select class="form-select" aria-label="Filtrer by" style="width: 10%">
        <option selected>Filter by</option>
        <option>Language</option>
        <option>Diploma</option>
    </select>
    <select class="form-select" aria-label="Filter value" style="width: 10%">
        <option selected> Filter value</option>
        <option>French</option>
        <option>English</option>
        <option>German</option>
        <option>Netherlands</option>

    </select>
</div>


<!-- Candidats -->
<?php
foreach ($resultat as $row) { ?>

    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column">

                        <strong class="d-inline-block mb-2 colorForItems"><?php echo $row->diploma ?></strong>
                        <h3 class="mb-0">
                            <?php
                            $user = $uRepository->getUserById($row->idCandidat, $mes);
                            ?>
                            <a class="text-dark" href="#"><?php echo "{$user->nom} {$user->prenom}"?></a>
                        </h3>
                        <div class="mb-1 text-muted"><?php echo $row->language ?></div>
                        <p class="card-text mb-auto"><?php echo $row->motivation ?>
                        </p>
                        <div class="mb-1 text-muted"><?php echo $row->ableToStartIn ?></div>
                        <div class="d-flex col-md-12 justify-content-between">
                            <button class="btn btn-block btnColor" href="#">Télécharger CV</button>
                            <div class="d-flex flex-column ">
                                <div class="d-flex flex-row mt-2">

                                    <?php if($row->status == null) {?>
                                        <a href="php/sendValidation.php?userId=<?php echo $user->idUser?>&offerId=<?php echo $id?>&applId=<?php echo $row->idApplication?>">
                                        <img src="assets/person-check-fill.svg" alt="" width="30" height="24">
                                        </a>
                                        <a href="index.php">
                                        <img src="assets/person-x-fill.svg" alt="" width="30" height="24">
                                        </a>
                                        <?php
                                    } else {?>

                                        <button class="btn" style="font-size: 25px; color: #21b471">Validated</button>
                                    <?php
                                    }?>

                                <div class="d-flex flex-row mt-2">
                                        <?php
                                        $offers = $oRepository->showOffersExceptThis($row->idOffer);
                                        foreach ($offers as $currentOffer) {
                                            ?>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


</body>
</html>