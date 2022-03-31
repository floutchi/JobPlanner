<?php

require 'db_user.inc.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';

use User\UserRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$idUser = $_GET['idUser'];

$uRepository = new UserRepository();

$message = "";
$user = $uRepository->getUserById($idUser, $message);

sendMail($user);

header('Location :consultOffer.php');

function sendMail($user) {
    try {
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('noReply@delloite.com');
        $mail->addAddress($user->email);
        $mail->isHTML(false);
        $mail->Subject = "Your application to the Deloitte Team";
        $mail->Body = "Dear candidate,
        The Deloitte team is pleased to announce that your application has been selected!
        The Human Resources team would like to invite you to choose a suitable time to attend a job interview via Teams.

        Please use this link to select a slot: 
        https://www.jobplanner.deloitte.com\confirmAppointment.php?

        Kind regards,
        The Deloitte team
        ";
        $mail->send();
    } catch (Exception $e) {
        $message = "An error occurred, please try later";
    }
}