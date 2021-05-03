<?php
namespace App\Model\Manager;

use App\Core\AbstractManager as AM;
use App\Core\ManagerInterface;

class ForumSubjetManager extends AM implements ManagerInterface
{
    public function __construct(){
        parent::connect();
    }


    public function getAll(){
        return $this->getResults(
            "App\Model\Entity\ForumSubjet",
            "SELECT * FROM forumsubjet"
        );
    }

    public function getOneById($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\ForumSubjet",
            "SELECT * FROM forumsubjet WHERE id = :num", 
            [
                "num" => $id
            ]
        );
    }

    
    public function getAllTopicsWithDetails(){
        return $this->getResults(
            "App\Model\Entity\SujetDetails",
            "SELECT forumsubjet.id_forum AS sujet_id, max(messages.id_message) AS id_message, COUNT(messages.id_message) AS nombreDeMessages
            FROM  forumsubjet, messages
            WHERE forumsubjet.id_forum=messages.id_forum
            GROUP BY forumsubjet.id_forum"
        );
    }


    
    public function getMessagesByTopic($id){
        return $this->getResults(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages WHERE id_forum = :id 
             ORDER BY messages.DateDeCree DESC",
            [
                "id" => $id 
            ]
        );
    }

    public function getAnswersByTopic($id){
        return $this->getResults(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages WHERE id_forum = :id
            HAVING  messages.id_message != 
	            (SELECT min(messages.id_message) FROM messages WHERE id_forum = :id) 
            ORDER BY messages.DateDeCree DESC",
            [
                "id" => $id 
            ]
        );
    }

    public function getFirstMessageByTopic($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages WHERE id_forum = :id
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

    public function insertMessage($names, $descr, $price, $catid){
        $this->executeQuery( 
            "INSERT INTO Messages (names, description, price, category_id) VALUES (:names, :descr, :price, :catid)",
            [
                "names"  => $names,
                "descr" => $descr,
                "price" => $price,
                "catid" => $catid
            ]
        );
        return $this->getLastInsertId();
    }

    public function insertTopic($titre, $id_visiteur){
        $this->executeQuery( 
            "INSERT INTO forumsubjet (titre, statut, id_visiteur) VALUES (:titre, 1, :id_visiteur)",
            [
                "titre"  => $titre,
                "id_visiteur" => $id_visiteur

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