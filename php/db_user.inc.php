<?php
namespace User;
require_once 'db_link.inc.php';

use DB\DBLink;
use PDO;

setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

class User {
    public $idUser;
    public $nom;
    public $prenom;
    public $phone;
    public $email;
    public $password;
    public $isRH;

    public function __set($prop, $val) {
        switch ($prop) {
            case "email": $this->$prop = strtolower($val); break;
            case "nom": $this->$prop = strtoupper($val); break;
            default: $this->$prop = $val;
        }
    }

    public function generateRandomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $this->password = implode($pass);
    }
}

class UserRepository {
    const TABLE_NAME = 'pluri2_User';

    public function storeMember($member, &$message) {
        $noError = false;
        $bdd     = null;

        try {
            $bdd = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("INSERT INTO ".self::TABLE_NAME." 
            (nom, prenom, email, phone, password) 
            VALUES (:nom, :prenom, :email, :phone, :password)");
            $stmt->bindValue(':nom', $member->nom);
            $stmt->bindValue(':prenom', $member->prenom);
            $stmt->bindValue(':email', $member->email);
            $stmt->bindValue(':phone', $member->phone);
            $stmt->bindValue(':password', $member->password);
            if ($stmt->execute()){
                $message .= 'Votre compte a bien été créé' ;
                $member->idUser = $bdd->lastInsertId();
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

    public function getUserById($idUser, &$message) {
        $result = false;
        $bdd = null;
        try {
            $bdd = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("SELECT * FROM " . self::TABLE_NAME . " WHERE idUser = :idUser");
            $stmt->bindValue(':idUser', $idUser);
            if ($stmt->execute()) {
                $result = $stmt->fetchObject("User\User");
            } else {
                $message .= 'Une erreur système est survenue.<br> Veuillez essayer à nouveau plus tard ou contactez l\'administrateur du site. (Code erreur: ' . $stmt->errorCode() . ')<br>';
            }
            $stmt = null;
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($bdd);
        return $result;
    }

    public function isRH($idUser) {
        $result = true;
        $bdd = null;
        try {
            $bdd = DBLink::connect2db(MYDB, $message);
            $stmt = $bdd->prepare("SELECT isRH FROM " . self::TABLE_NAME . " WHERE idUser = :idUser");
            $stmt->bindValue(':idUser', $idUser);
            if ($stmt->execute()) {
                $result = $stmt->fetchColumn();
            } else {
                $message .= 'Une erreur système est survenue.<br> Veuillez essayer à nouveau plus tard ou contactez l\'administrateur du site. (Code erreur E: ' . $stmt->errorCode() . ')<br>';
            }
            $stmt = null;
        } catch (Exception $e) {
            $message .= $e->getMessage() . '<br>';
        }
        DBLink::disconnect($bdd);
        return $result;
    }
}