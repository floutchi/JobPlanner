<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<!-- Navigation bar -->
<?php require('php/header.inc.php');?>

<!-- Job desc -->
<div class="container container-margin">
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

<!-- Search bar -->
<div class="container d-flex justify-content-center col-6 mb-3">
        <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Search an offer...">
            <div class="input-group-append"><button class="btn btn-primary btn_societyColor"><i class="fas fa-search">Search</i></button></div>
        </div>
</div>

<!-- Funded content -->
<div class="container-md">
    <div class="row" id="joboffer">
        <div class="col-lg-4">
            <img class="rounded-circle" src="img/deloitte.jpeg" alt="Generic placeholder image" width="140" height="140">
            <h2>Software Engineer</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
            <p><a class="btn btn-secondary btn_societyColor" href="jobOffer.php?idOffer=9" role="button">Postuler »</a></p>
        </div><div class="col-lg-4">
        <img class="rounded-circle" src="img/deloitte.jpeg" alt="Generic placeholder image" width="140" height="140">
        <h2>IT developper FullStack</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        <p><a class="btn btn-secondary btn_societyColor" href="jobOffer.php?idOffer=10" role="button">Postuler »</a></p>
    </div><div class="col-lg-4">
        <img class="rounded-circle" src="img/deloitte.jpeg" alt="Generic placeholder image" width="140" height="140">
        <h2>Human resources manager</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
        <p><a class="btn btn-secondary btn_societyColor" href="jobOffer.php?idOffer=11" role="button">Postuler »</a></p>
    </div></div>
</div>

</body>
</html>