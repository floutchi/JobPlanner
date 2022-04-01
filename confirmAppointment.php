<?php

$message = "";

var_dump($_POST);

if(isset($_POST['submit'])) {
    $message = "Your appointment has been made!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-createOffer.css">
    <link rel="stylesheet" href="css/style-footer.css">
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Confirmation</title>
</head>
<body>

<?php require('php/header.inc.php');?>

<!-- Formulaire pour la soumission d'une heure.-->
<div class="registration-form">
    <form class="mt-5" method="POST">
        <h2 class="mb-5">Confirm your appointement</h2>

        <?php if(!empty($message)) echo '<p style="color: #146c43">'.$message.'</p>'?>

        <p>Please select a schedule below for an interview.</p>

        <div class="form-group">
            <label style="display: block">
                <input type="checkbox" name="hour" style="padding-right: 30%" value="A">
                <label class="langageForm">21.12.2011 13:30</label>
            </label>

            <label style="display: block">
                <input type="checkbox" name="hour" style="padding-right: 30%" value="A">
                <label class="langageForm">21.12.2011 15:30</label>
            </label>

            <label style="display: block">
                <input type="checkbox" name="hour" style="padding-right: 30%" value="A">
                <label class="langageForm">21.12.2011 17:30</label>
            </label>

            <label style="display: block">
                <input type="checkbox" name="hour" style="padding-right: 30%" value="A">
                <label class="langageForm">21.12.2011 18:30</label>
            </label>
        </div>

        <p class="infoText">Your interview will only take place by video conference. To find out how this works, please read the email that was sent to you.</p>

        <div class="form-group mt-3">
            <button name="submit" type="submit" class="btn btn-block create-account">Submit</button>
        </div>
    </form>
</div>

<?php require ('php/footer.inc.php')?>
</body>
</html>