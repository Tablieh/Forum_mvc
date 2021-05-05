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
   

}