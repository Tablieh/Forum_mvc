<?php
namespace App\Model\Manager;

use App\Core\AbstractManager as AM;
use App\Core\ManagerInterface;

class VisiteurManager extends AM implements ManagerInterface
    {
        public function __construct(){
            parent::connect();
        }
        public function getAll(){
            return $this->getResults(
                "App\Model\Entity\Visiteur",
                "SELECT * FROM visiteur"
            );
        }
    
        public function getOneById($id){
            return $this->getOneOrNullResult(
                "App\Model\Entity\Visiteur",
                "SELECT * FROM visiteur WHERE id = :num", 
                [
                    "num" => $id
                ]
            );
        }
        public function insertVisiteur($pesudo,$mail, $pass){
            return $this->executeQuery(
                "INSERT INTO visiteur (pesudo,email, MoteDePass, role) VALUES (:pesudo,:mail, :pass, 'ROLE_USER')",
                [
                    "pesudo"=>$pesudo,
                    "mail" => $mail,
                    "pass" => $pass,
                    
                ]
            );
        }
    
        function getVisiteurByEmail($mail){
            return $this->getOneOrNullResult(
                "App\Model\Entity\Visiteur",
                "SELECT * FROM visiteur WHERE email = :mail",
                [
                    "mail" => $mail
                ]
            );
        }

        function getPasswordByEmail($mail){
            return $this->getOneValue(
                "SELECT MoteDePass FROM visiteur WHERE email = :mail",
                [
                    "mail" => $mail
                ]
            );
        }

    }
