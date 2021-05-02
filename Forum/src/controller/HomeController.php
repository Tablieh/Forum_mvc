<?php
    namespace App\Controller;
    
    use App\Core\AbstractController as AC;
   
    class HomeController extends AC
    {
        public function __construct(){
            //déclarer vos managers ici
        }

        public function index()
        {
            
            return $this->render("home/home.php", [
                "controller_name" => get_class($this),
                "title"           => "Home"
            ]);
        }

    }