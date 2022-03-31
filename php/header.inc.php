<!-- Navigation bar -->
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Deloitte - JobPlanner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#joboffer">Job offers</a></li>
                    <?php
                    if(isset($_SESSION['isRH'])) {
                        if($_SESSION['isRH'] == 1) {
                            echo '
                        <li class="nav-item active"><a class="nav-link" href="myOffers.php">My offers</a></li>
                        <li class="nav-item"><a class="nav-link" href="myAgenda.php">My agenda</a></li>
                        <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
                    ';
                        } else {
                                echo '
                            <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
                            ';
                        }
                    }
                    ?>

                </ul>
            </div>
        </div>
        <nav class="navbar navbar-light bg-light">
            <ul class="navbar-nav">
            <li class="nav-item pe-2"><a href="../createOffer.php"><img id="addOffer" src="assets/plus-circle-fill.svg" alt="" width="30" height="24"></a></li>
            <li class="nav-item">
                <a href="#" id="loginbtn"><img id="connectionManager" href="#" src="assets/person-fill.svg" alt="" width="30" height="24"></a></li>
            </ul>
        </nav>
    </nav>
</div>