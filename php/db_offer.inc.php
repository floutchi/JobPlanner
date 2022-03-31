<?php

namespace Offer;
require_once 'db_link.inc.php';

use DB\DBLink;
use PDO;

setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

class Offer
{
    public $idOffer;
    public $titleOffer;
    public $descriptionOffer;
    public $skillsOffer;
    public $jobStartDate;
    public $contractType;
}

class OfferRepository
{
    const TABLE_NAME = 'pluri2_Offer';

    public function storeOffer($offer, &$message)
    {
        $noError = false;
        $bdd = null;

        try {
            $bdd = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("INSERT INTO " . self::TABLE_NAME . " 
            (titleOffer, descriptionOffer, skillsOffer, jobStartDate, contractType) 
            VALUES (:title, :description, :skills, :jobStartDate, :contractType)");
            $stmt->bindValue(':title', $offer->titleOffer);
            $stmt->bindValue(':description', $offer->descriptionOffer);
            $stmt->bindValue(':skills', $offer->skillsOffer);
            $stmt->bindValue(':jobStartDate', $offer->jobStartDate);
            $stmt->bindValue(':contractType', $offer->contractType);

            if ($stmt->execute()) {
                $message .= 'The offer has been created';
                $offer->idOffer = $bdd->lastInsertId();
                $noError = true;
            } else {
                $message .= 'Une erreur système est survenue.<br> Veuillez essayer à nouveau plus tard ou contactez l\'administrateur du site. (Code erreur: ' . $stmt->errorCode() . ')<br>';
            }
            $stmt = null;
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }

        DBLink::disconnect($bdd);
        return $noError;
    }

    public function showOffers() {
        $result = null;
        $bdd = null;
        try {
            $bdd = DBLink::connect2db(MYDB, $message);
            $result = $bdd->query("SELECT idOffer, titleOffer, descriptionOffer FROM " . self::TABLE_NAME);
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($bdd);
        return $result;
    }

    public function showOffersExceptThis($idOffer) {
        $result = array();
        $bdd    = null;
        try {
            $bdd  = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("SELECT * FROM ".self::TABLE_NAME." WHERE idOffer <> :pattern;");
            $stmt->bindValue(':pattern', $idOffer);
            if ($stmt->execute()){
                $result = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Application\Application");
            }
        } catch (Exception $e) {
            $message .= $e->getMessage().'<br>';
        }
        DBLink::disconnect($bdd);
        return $result;
    }

    public function showOffer($idOffer) {
        $result = null;
        $bdd = null;
        try {
            $bdd = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE idOffer = :idOffer");
            $stmt->bindValue(':idOffer', $idOffer);
            if ($stmt->execute()) {
                $result = $stmt->fetchObject("Offer\Offer");
            }
            $stmt = null;
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($bdd);
        return $result;
    }


}