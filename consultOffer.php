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

$repository = new ApplicationRepository();
$uRepository = new UserRepository();
$oRepository = new OfferRepository();

$id = $_GET['id_offer'];

$resultat = $repository->showApplicationByOffer($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style-candidateList.css">
    <script src="../js/bootstrap.min.js"></script>
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
                 src="../img/deloitte2.jpg"
                 data-holder-rendered="true">
        </div>
    </div>
    <hr class="featurette-divider">
</div>


<!-- Candidats -->
<?php
foreach ($resultat as $row) { ?>

    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
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
                                <div class="d-flex flex-row mt-2 itemSpacing">
                                    <a href="php/sendValidation.php?userId=<?php echo $user->idUser?>"><img src="assets/person-check-fill.svg" alt="" width="30"
                                                                                                        height="24"></a>
                                    <a href="index.php"><img src="../assets/person-x-fill.svg" alt="" width="30"
                                                             height="24"></a>
                                </div>
                                <div class="d-flex flex-row mt-2">
                                    <select class="changeOffer" name="offertoChange">
                                        <?php
                                        $offers = $oRepository->showOffersExceptThis($row->idOffer);
                                        var_dump($offers);
                                        foreach ($offers as $currentOffer) {
                                            ?>
                                            <option value="<?php echo $currentOffer->titleOffer?>"><?php echo $currentOffer->titleOffer?></option>
                                        <?php } ?>
                                    </select>
                                    <a href="index.php"><img title="Change offer" src="../assets/box-arrow-right.svg"
                                                             alt=""
                                                             width="30" height="24"></a>
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