<?php
namespace App\Model\Manager;
use App\Core\AbstractManager;
use App\Model\Entity\ForumSubjet;

    class ForumSubjetManager extends AbstractManager
    {
        public function __construct(){
            parent::connect();
        }
    
        public function findAll(){
            return $this->getResults(
                "Model\Entity\ForumSubjet",
                "SELECT * FROM forumsubjet#
                ORDER BY DateDeCree"
            );
        }

        public function findOneById($id){
            return $this->getOneOrNullResult(
                "Model\Entity\ForumSubjet",
                "SELECT * FROM forumsubjet WHERE id = :num", 
                [
                    "num" => $id
                ]
            );
        }
        public function insertSujet($titre,$DateDeCree){
            return $this->executeQuery(
                "INSERT INTO forumsubjet (titre,DateDeCree) VALUES (:titre,:DateDeCree)",
                [
                    "titre"=>$titre,
                    "DateDeCree" => $DateDeCree,
                   
                ]
            );
        }
    }
