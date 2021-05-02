<?php
namespace App\Model\Manager;
use App\Core\AbstractManager;
use App\Model\Entity\Messages;

    class MessagesManager extends AbstractManager
    {
        public function __construct(){
            parent::connect();
        }
    
        public function findAll(){
            return $this->getResults(
                "Model\Entity\Messages",
                "SELECT * FROM messages"
            );
        }

        public function findOneById($id){
            return $this->getOneOrNullResult(
                "Model\Entity\Messages",
                "SELECT * FROM messages WHERE id = :num", 
                [
                    "num" => $id
                ]
            );
        }
        public function findMessagesByForumSubjet($id){
            return $this->getResults(
                "Model\Entity\Messages",
                "SELECT * FROM messages WHERE id_forum = :id
                ORDER BY DateDeCree", 
                [
                    "id" => $id
                ]
            );
        }
        public function insertMessage($texte,$DateDeCree){
            return $this->executeQuery(
                "INSERT INTO messages (texte,DateDeCree) VALUES (:texte,:DateDeCree)",
                [
                    "texte"=>$texte,
                    "DateDeCree" => $DateDeCree,
                   
                ]
            );
        }
}
