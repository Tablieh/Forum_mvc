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
                "INSERT INTO visiteur (pesudo,email, MoteDePass) VALUES (:pesudo,:mail, :pass)",
                [
                    "pesudo"=>$pesudo,
                    "mail" => $mail,
                    "pass" => $pass,
                    
                ]
            );
        }
    
        function getVisiteurByEmail($pesudoOrEmail){
            return $this->getOneOrNullResult(
                "App\Model\Entity\Visiteur",
                "SELECT * FROM visiteur WHERE email = :uore OR pesudo = :uore",
                [
                    "uore" => $pesudoOrEmail
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
        public function updateDate($id){
            $today = new \DateTime();
            $interval = new \DateInterval("P30D");
            $newDateBan = $today->add($interval);
            $this->executeQuery( 
                "UPDATE visiteur
                SET visiteur.end_ban = :end_ban
                WHERE id = :id",
                [
                    "end_ban" => $newDateBan->format('Y-m-d H:i:s'),
                    "id" => $id
                ]
            );
        }
        public function getList(){
            return $this->getResults(
                "App\Model\Entity\Visiteur",
                "SELECT * FROM visiteur_list ORDER BY DateDeVisite DESC"
            );
        }
        public function countUsers(){
            return $this->getResults(
                "App\Model\Entity\Visiteur",
                "SELECT COUNT(*) AS v FROM visiteur_list ORDER BY DateDeVisite DESC"
            );
        }
    }
