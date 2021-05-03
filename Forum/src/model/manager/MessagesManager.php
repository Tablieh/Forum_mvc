<?php
namespace App\Model\Manager;
    
use App\Core\AbstractManager as AM;
use App\Core\ManagerInterface;

class MessagesManager extends AM implements ManagerInterface
{
    public function __construct(){
        parent::connect();
    }

    public function getAll(){
        return $this->getResults(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages"
        );
    }

    public function getOneById($id){
        return $this->getOneOrNullResult(
            "App\Model\Entity\Messages",
            "SELECT * FROM messages WHERE id = :num", 
            [
                "num" => $id
            ]
        );
    }

    public function insertMessage($texte, $id_visiteur, $id_forum){
        $this->executeQuery( 
            "INSERT INTO messages (texte, id_visiteur, id_forum) VALUES (:texte, :id_visiteur, :id_forum)",
            [
                "texte"  => $texte,
                "id_visiteur" => $id_visiteur,
                "id_forum" => $id_forum
            ]
        );
        return $this->getLastInsertId();
    }

    
    public function deleteMessage($id){
        return $this->executeQuery( 
            "DELETE FROM messages WHERE id = :id",
            [
                "id" => $id 
            ]
        );
    }

    public function deleteMessages($id){
        return $this->executeQuery( 
            "DELETE FROM messages WHERE id_forum = :id",
            [
                "id" => $id 
            ]
        );
    }

}
