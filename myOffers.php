<?php
require 'php/db_offer.inc.php';
session_start();

use Offer\OfferRepository;

session_start();

$offerRepository = new OfferRepository();

$resultat = $offerRepository->showOffers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>My offers</title>
</head>
<body>

<?php require('php/header.inc.php');?>

<!-- My offers-->
<div class="container-md">
    <div class="row" id="joboffer">
    <?php
    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        if ($_SESSION['idUser'] == $row['idRH']) {
            echo '
             <div class="col-lg-4">
            <img class="rounded-circle" src="img/deloitte.jpeg" alt="Generic placeholder image" width="140"
                 height="140">
            <h2>' . $row['titleOffer'] . '</h2>
            <p>' . $row['descriptionOffer'] . '</p>

            <div class="edelete">
                <ul >
                    <li class="list-inline-item">
                   
                    <a class="btn btn-secondary btn_societyColor" href="consultOffer.php?id_offer=' . $row['idOffer'] . '" role="button">View application »</a>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn" type="button" title="Edit"><img id="edit" src="assets/pencil-fill.svg" alt=""
                                                                            width="20" height="19"></button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn" type="button" title="Delete"><img id="delete" src="assets/trash-fill.svg"
                                                                              alt="" width="20" height="19"></button>
                    </li>
                </ul>
            </div></div>';
        }
    }
    ?>
    </div>
</div>
<?php require ('php/footer.inc.php')?>

</body>
</html>