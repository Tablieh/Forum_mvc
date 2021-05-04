<?php
namespace App\Controller;

use App\Core\AbstractController;
use App\Model\Manager\VisiteurManager;


class VisiteurController extends AbstractController
    {   
        public function __construct(){
        $this->manager = new VisiteurManager();
    }
    
    public function index()
    {
        $Visiteur = $this->manager->findAll();

        return $this->render("Visiteur/home.php", [
            "Visiteur" => $Visiteur,
            "title"    => "Liste des Visiteur"
        ]);
    }
    public function voirVisiteur($id)
    {
        if($id){
            
            $Visiteur = $this->manager->findOneById($id);

           

            return $this->render("Visiteur/voir.php", [
                "Visiteur" => $Visiteur,
                "title"   => $Visiteur,

        
            ]);
        }  
        else $this->redirectToRoute("Visiteur", "index");
    }
}