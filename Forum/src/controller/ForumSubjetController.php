<?php
    namespace App\Controller;

    use App\Core\Session;
    use App\Core\AbstractController as AC;
    use App\Model\Manager\ForumSubjetManager;
    use App\Model\Manager\MessagesManager;



    class ForumSubjetController extends AC
    {
        public function __construct(){
            $this->managerS = new ForumSubjetManager();
            $this->managerM = new MessagesManager();
        }

        public function index()
        {
            $sujets = $this->managerS->getAll();
            $topicsDetails = $this->managerS->getAllTopicsWithDetails();

            //Si utilisateur est connecté, il y a accés au forum, sinon on affiche une page de connextion
            if(Session::get("user")){
            return $this->render("FroumSubjet/topics.php", [
                "sujets" => $sujets,
                "topicsDetails" => $topicsDetails,
                "title"    => "Liste des sujets"
            ]);
            }  
            else return $this->render("Visiteur/login.php", [
                "title"    => "Connextion"
            ]);
        }


        public function showTopic($id)
        {
            if($id){
                
                $messages = $this->managerS->getAnswersByTopic($id);
                $sujet = $this->managerS->getOneById($id);
                $premierMessage = $this->managerS->getFirstMessageByTopic($id);

                return $this->render("FroumSubjet/topicAndMessages.php", [
                    "messages" => $messages,
                    "sujet" => $sujet,
                    "premierMessage" => $premierMessage,
                    "title"   => $sujet
                ]);
            }  
            else $this->redirectToRoute("FroumSubjet");
        }

        
        public function lockUnlockTopict($id)
        {
            if($id){
                if(Session::get("user") && Session::get("user")->hasRole("ROLE_ADMIN")){ 
                    $this->managerS->changeStatus($id);  
                }  
            }

            return $this->redirectToRoute("FroumSubjet");
        }


        public function newTopic()
        {
            return $this->render("FroumSubjet/createTopic.php");
        }

        
        public function addTopic(){
            if(isset($_POST["submit"])){
                
                $id_visiteur =  Session::get("user")->getId();
                $titre  = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
                $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
                
                if($titre && $texte){
                $id_forum = $this->managerS->insertTopic($titre, $id_visiteur);
                $id_message = $this->managerM->insertMessage($texte, $id_visiteur, $id_forum); 
                    if($id_forum && $id_message){
                        Session::addFlash('success', "Le sujet est ajouté");
                    }
                    else{
                        Session::addFlash('error', "Une erreur est survenue, contactez l'administrateur...");
                    }
                }
                else Session::addFlash('error', "Tous les champs doivent être remplis et respecter leur format...");
            }
            else Session::addFlash('error', "Petit malin, mais ça marche pas !! Nananèèèèreuh !");
            
            return $this->redirectToRoute("FroumSubjet");
        }

        public function delTopic($id){
            if($id){

                if($this->managerM->deleteMessages($id) && $this->managerS->deleteTopic($id)){
                    Session::addFlash('success', "Le sujet est suprimé");
                }
                else{
                    Session::addFlash('error', "Une erreur est survenue, contactez l'administrateur...");
                }
            }
            else Session::addFlash('error', "Une erreur est survenue, contactez l'administrateur...");
            
            return $this->redirectToRoute("FroumSubjet");
        }
    }