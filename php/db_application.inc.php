<?php
namespace Application;
require_once 'db_link.inc.php';

use DB\DBLink;
use PDO;

setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

class Application {
    public $idApplication;
    public $idOffer;
    public $idCandidat;
    public $motivation;
    public $ableToStartIn;
    public $cvURL;
    public $diploma;
    public $language;
}

class ApplicationRepository {
    const TABLE_NAME = 'pluri2_Application';

    public function storeApplication($application, &$message) {
        $noError = false;
        $bdd     = null;

        try {

            $bdd = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("INSERT INTO ".self::TABLE_NAME." 
            (idOffer, idCandidat, motivation, ableToStartIn, cvURL, diploma, language) 
            VALUES (:idOffer, :idCandidat, :motivation, :ableToStartIn, :cvURL, :diploma, :language)");
            $stmt->bindValue(':idOffer', $application->idOffer);
            $stmt->bindValue(':idCandidat', $application->idCandidat);
            $stmt->bindValue(':motivation', $application->motivation);
            $stmt->bindValue(':ableToStartIn',$application->ableToStartIn);
            $stmt->bindValue(':cvURL', $application->cvURL);
            $stmt->bindValue(':diploma', $application->diploma);
            $stmt->bindValue(':language', $application->language);

            if ($stmt->execute()){
                $message .= "Your application has been sent successfully. A confirmation email has been sent to you\n" ;
                $application->idApplication = $bdd->lastInsertId();
                $noError = true;
            } else {
                $message .= 'Une erreur système est survenue.<br> Veuillez essayer à nouveau plus tard ou contactez l\'administrateur du site. (Code erreur: ' . $stmt->errorCode() . ')<br>';
            }
            $stmt = null;
        } catch(Exception $e) {
            $message .= $e->getMessage().'<br>';
        }

        DBLink::disconnect($bdd);
        return $noError;
    }

    public function showApplicationByOffer($idOffer) {
        $result = null;
        $bdd = null;
        try {
            $bdd = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE idOffer = :idOffer");
            $stmt->bindValue(':idOffer', $idOffer);
            if ($stmt->execute()) {
                $result = $stmt->fetchObject("Application\Application");
            }
            $stmt = null;
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($bdd);
        return $result;
    }
}