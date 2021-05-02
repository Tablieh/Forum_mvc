<?php
namespace App\Controller;

use App\Core\AbstractController;
use App\Core\Session;
use App\Model\Manager\ForumSubjetManager;

    class ForumSubjetController extends AbstractController
    {   
        public function __construct(){
        $this->manager = new ForumSubjetManager();
    }
    
    public function index()
    {
        $ForumSubjet = $this->manager->findAll();

        return $this->render("ForumSubjet/home.php", [
            "forumSubjet" => $ForumSubjet,
            "title"    => "Liste des ForumSubjet"
        ]);
    }

    public function voirForumSubjet($id)
    {
        if($id){
            
            $ForumSubjet = $this->manager->findOneById($id);
            
           

            return $this->render("ForumSubjet/voir.php", [
                "forumSubjet" => $ForumSubjet,
                "title"   => $ForumSubjet,

        
            ]);
        }  
        else $this->redirectToRoute("ForumSubjet", "index");
    }
    
    public function addsujetAndMessage()
    {
        if(isset($_post["submit"])){
            
            $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST,"text",FILTER_SANITIZE_STRING);
           if($titre && $texte){
               if($id_forum=$this->ForumSubjectManager->insertSujet($titre)){

                   if($this->MessagesManager->insertMessage($texte,$id_forum)){
                       Session::addFlash('succes',"message ajoute");
                   }
               }
               else{
                Session::addFlash('error',"error contact l'admin");
               }

           }
           else Session::addFlash('error',"tout le champs doit etre ramplis");
        }
        else Session::addFlash('error',"petit malain mais ca marche pas !");
        return $this->redirectToRoute("ForumSubjet", "index");
    }
    public function addMessageAsSupjet()
    {
        if(isset($_post["submit"])){
            $texte = filter_input(INPUT_POST,"text",FILTER_SANITIZE_STRING);
            $id_forum = $_GET['id'];
            if($texte){
                if($this->MessagesManager->insertMessage($texte,$id_forum)){
                    Session::addFlash('succes',"message ajoute");
                }
            
            else{
                Session::addFlash('error',"error contact l'admin");
            }

        }
        else  Session::addFlash('error',"tout le champs doit etre ramplis");
     }
     return $this->redirectToRoute("ForumSubjet", "voirSujet",["id"=>$id_forum]);
 }
 public function available(){
     $id = $_GET['id'];
     $sujet = $this->ForumSubjetManager->getOneById($id);
     var_dump($sujet);
    if($sujet->getEtat() == 0){
        $this->ForumSubjetManager->SujetVerrouiller($id,1);
         Session::addFlash('error',"Sujet verrouiller !");
    }
    else{
        $this->ForumSubjetManager->SujetVerrouiller($id,0);
         Session::addFlash('error',"Sujet deverrouiller !");
    }
    return $this->redirectToRoute("ForumSubjet", "voirSujet",["id"=>$id]);
 }
    
}