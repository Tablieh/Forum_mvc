<?php
namespace App\Controller;
use App\Core\Session;
use App\Core\AbstractController as AC;
use App\Model\Manager\MessagesManager;

    class MessagesController extends AC
    {   
        public function __construct(){
        $this->manager = new MessagesManager();
    }
    
    public function index()
    {
        $Messages = $this->manager->findAll();

        return $this->render("Messages/home.php", [
            "messages" => $Messages,
            "title"    => "Liste des Messages"
        ]);
    }

    public function voirMessages($id)
    {
        if($id){
            
            $Messages = $this->manager->findOneById($id);
            $comment = $this->manager->findMessagesByForumSubjet($id);
           

            return $this->render("Messages/voir.php", [
                "messages" => $Messages,
                "title"   => $Messages,
                "comment" => $comment,
        
            ]);
        }  
        else $this->redirectToRoute("Messages", "index");
    }
    public function addMessage(){
        if(isset($_POST["submit"])){
            
            $visiteur_id =  Session::get("user")->getId();
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
            
            if($texte){
            $id_message = $this->managerM->insertMessage($texte, $visiteur_id); 
                if($id_message){
                    Session::addFlash('success', "Le message est ajouté");
                }
                else{
                    Session::addFlash('error', "Une erreur est survenue, contactez l'administrateur...");
                }
            }
            else Session::addFlash('error', "Tous les champs doivent être remplis et respecter leur format...");
        }
        else Session::addFlash('error', "Petit malin, mais ça marche pas !! Nananèèèèreuh !");
        
        return $this->redirectToRoute("Froumsubjet");
    }
    public function newMessage()
        {
            return $this->render("Froumsubjet/makeMessage.php");
        }
}