<?php
require 'php/db_offer.inc.php';
require 'php/db_user.inc.php';

use Offer\OfferRepository;
use User\User;
use User\UserRepository;


session_start();
$offerRepository = new OfferRepository();
$userRepository = new UserRepository();


$message = "";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id === "error") $message = "Wrong login or password";
}

$resultat = $offerRepository->showOffers();

if(isset($_POST['login'])) {
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $user = $userRepository->getUserByMail($email, $message);
        if($user !== false) {
            if(strcmp($user->password, $password) == 0) {
                $_SESSION['email'] = $user->email;
                $_SESSION['idUser'] = $user->idUser;
                $_SESSION['isRH'] = $user->isRH;



                var_dump($_SESSION);
                $message = "";
                header('location:index.php');
            }
        } else {
            header('location:index.php?id=error');
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-connection.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script defer src="js/home.mjs"></script>
    <meta charset="UTF-8">
    <title>Home - JobPlanner</title>
</head>
<body>

<!-- Navigation bar -->
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Deloitte - JobPlanner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#joboffer">Job offers</a></li>
                    <?php
                    if(isset($_SESSION['isRH'])) {
                        if($_SESSION['isRH'] == 1) {
                            echo '
                        <li class="nav-item active"><a class="nav-link" href="php/myOffers.php">My offers</a></li>
                        <li class="nav-item"><a class="nav-link" href="#joboffer">My agenda</a></li>
                    ';
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>
        <nav class="navbar navbar-light bg-light">
            <ul class="navbar-nav">
            <li class="nav-item pe-2"><a href="php/createOffer.html"><img id="addOffer" src="assets/plus-circle-fill.svg" alt="" width="30" height="24"></a></li>
            <li class="nav-item">
                <a href="#" id="loginbtn"><img id="connectionManager" href="#" src="assets/person-fill.svg" alt="" width="30" height="24"></a></li>
            </ul>
        </nav>
    </nav>
</div>

<!-- Office image -->
<div class="container-fluid">
    <div id="myCarousel" class="carousel" data-ride="carousel">
        <!-- Popup image -->
        <div class="wrapper fadeInDown connectionPosition">
            <div id="formContent">
                <form method="POST">
                    <h1 class="popupTitle"">Sign in</h1>
                    <?php
                    if(!empty($message)) echo "<h6 style='color: red'>". $message ."</h6>"?>
                    <input type="text" id="login" class="fadeIn second" name="email" placeholder="Login">
                    <input type="text" id="password" class="fadeIn third" name="password" placeholder="Password">
                    <input type="submit" class="fadeIn fourth" value="Log In" name="login">
                </form>

                <div id="formFooter">
                    <a class="underlineHover" href="#">Forgot Password</a>
                </div>

            </div>
        </div>

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="img/deloitte2.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-lg-end">
                        <h1>Deloitte</h1>
                        <p>Connect your future</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Company's presentation -->
<div class="container marketing">

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading title_societyColor">First featurette heading. <span
                    class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
                semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
                commodo.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                 style="width: 500px; height: 500px;"
                 src="img/deloitteOffices.jpeg"
                 data-holder-rendered="true">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading title_societyColor">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span>
            </h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
                semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
                commodo.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                 style="width: 500px; height: 500px;"
                 src="img/deloitteOffice3.jpeg"
                 data-holder-rendered="true">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading title_societyColor">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
                semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
                commodo.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500"
                 style="width: 500px; height: 500px;"
                 src="img/deloitteOffice2.jpg"
                 data-holder-rendered="true">
        </div>
    </div>

    <hr class="featurette-divider">
</div>

<!-- All offers -->
<div class="container-md"><div class="row" id="joboffer">

        <?php
        while($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo
            '<div class="col-lg-4">
                <img class="rounded-circle" src="img/deloitte.jpeg" alt="Generic placeholder image" width="140"
             height="140">
                <h2>'. $row['titleOffer'] .'</h2>
                <p>'. $row['descriptionOffer'] .'</p>
                <p><a class="btn btn-secondary btn_societyColor" href="php/jobOffer.php?idOffer='. $row['idOffer'] .'" role="button">Postuler »</a></p>
            </div>';
        }
        ?>
</div></div>

</body>
</html>