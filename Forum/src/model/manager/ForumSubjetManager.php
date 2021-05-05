<?php
namespace App\Model\Manager;

use App\Core\AbstractManager as AM;
use App\Core\ManagerInterface;

class ForumsubjetManager extends AM implements ManagerInterface
{
    public function __construct(){
        parent::connect();
    }


    public function getAll(){
        return $this->getResults(
            "App\Model\Entity\Forumsubjet",
            "SELECT * FROM forumsubjet
            ORDER BY forumsubjet.DateDeCree DESC"
        );
    }

    public function getOneById($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Forumsubjet",
            "SELECT * FROM forumsubjet WHERE id = :num", 
            [
                "num" => $id
            ]
        );
    }

    public function getMessagesByTopic($id){
        return $this->getResults(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages WHERE forumsubjet_id = :id 
             ORDER BY messages.DateDeCree DESC",
            [
                "id" => $id 
            ]
        );
    }

    public function getAnswersByTopic($id){
        return $this->getResults(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages WHERE forumsubjet_id = :id
            HAVING  messages.id_message != 
	            (SELECT min(messages.id_message) FROM messages WHERE forumsubjet_id = :id) 
            ORDER BY messages.DateDeCree DESC",
            [
                "id" => $id 
            ]
        );
    }

    public function getFirstMessageByTopic($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages WHERE forumsubjet_id = :id
             ORDER BY messages.DateDeCree
             LIMIT 1", 
            [
                "id" => $id
            ]
        );
    }

    
    public function changeStatus($id){
        $statut= 1-$this->getOneById($id)->getStatut();
        $this->executeQuery( 
            "UPDATE forumsubjet
            SET forumsubjet.statut = :statut
            WHERE id = :id",
            [
                "statut" => $statut,
                "id" => $id
            ]
        );
        return $this->getLastInsertId();
    }

    public function insertTopic($titre, $visiteur_id){
        $this->executeQuery( 
            "INSERT INTO forumsubjet (titre, statut, visiteur_id) VALUES (:titre, 1, :visiteur_id)",
            [
                "titre"  => $titre,
                "visiteur_id" => $visiteur_id

            ]
        );
        return $this->getLastInsertId();
    }


    public function deleteTopic($id){
        return $this->executeQuery( 
            "DELETE FROM forumsubjet WHERE id = :id",
            [
                "id" => $id 
            ]
        );
    }
}