<?php
 namespace App\Controller;
 use App\Core\AbstractController;
 use App\Core\Session;
 use App\Model\Manager\VisiteurManager;

class SecurityController extends AbstractController
    {
        public function __construct(){
            $this->manager = new VisiteurManager();
        }
        /**
         * display the login form or compute the login action with post data
         * 
         * @return mixed the render of the login view or a Router redirect (if login action succeeded)
         */
        public function login(){
            if(isset($_POST["submit"])){
                sleep(1);
                
                $pesudoOrEmail = trim(filter_input(INPUT_POST, "pesudo-or-email", FILTER_SANITIZE_STRING));
                $MoteDePass = filter_input(INPUT_POST, "MoteDePass", FILTER_VALIDATE_REGEXP, [
                    "options" => [
                        "regexp" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/"
                        //au moins 6 caractères, MAJ, min et chiffre obligatoires
                    ]
                ]);
                        
                if( $pesudoOrEmail && $MoteDePass ){
                    if($Visiteur = $this->manager->getVisiteurByEmail($pesudoOrEmail)){//on récupère l'Visiteur si l'email saisi correspond en BDD
                        if(password_verify($MoteDePass, $this->manager->getPasswordByEmail($Visiteur->getEmail()))){
                            Session::setVisiteur($Visiteur);
                            Session::addFlash('success', "Bienvenue !");
                            
                            return $this->redirectToRoute("ForumSubjet", "index");
                        }
                        else  Session::addFlash('error', "Le mot de passe est erroné");
                    }
                    else  Session::addFlash('error', "E-mail inconnu !");
                }
                else  Session::addFlash('error', "Tous les champs sont obligatoires et doivent respecter...");

            }

            return $this->render("Visiteur/login.php");
        }

        public function logout(){
            Session::removeVisiteur();
            Session::addFlash('success', "Déconnexion réussie, à bientôt !");
            return $this->redirectToRoute("home");
        }

        public function register(){
            if(isset($_POST["submit"])){
                sleep(1);
                $pesudo = filter_input(INPUT_POST,"pesudo",FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                $MoteDePass = filter_input(INPUT_POST, "MoteDePass", FILTER_VALIDATE_REGEXP, [
                    "options" => [
                        "regexp" => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/"
                        //au moins 6 caractères, MAJ, min et chiffre obligatoires
                    ]
                ]);
                $password_repeat = filter_input(INPUT_POST, "password_repeat", FILTER_DEFAULT);

                if( $pesudo &&$email){
                    if(!$this->manager->getVisiteurByEmail($email)){
                        if($MoteDePass === $password_repeat){

                            $hash = password_hash($MoteDePass, PASSWORD_ARGON2I);

                            if($this->manager->insertVisiteur($pesudo,$email, $hash)){
                                Session::addFlash('success', "Inscription réussie, connectez-vous !");
                                
                                return $this->redirectToRoute("security", "login");
                            }
                            else  Session::addFlash('error', "Une erreur est survenue...");
                        }
                        else{
                            Session::addFlash('error', "Les mots de passe ne correspondent pas !");
                            Session::addFlash('notice', "Tapez les mêmes mots de passe dans les deux champs !");
                        }
                    }
                    else  Session::addFlash('error', "Cette adresse mail est déjà liée à un compte...");
                }
                else  Session::addFlash('error', "Les champs saisis ne respectent pas les valeurs attendues !");
            }

            return $this->render("Visiteur/register.php");
        }
        
        public function profile(){
            
        if( Session::getVisiteur()){
            return $this->render("Visiteur/profile.php");
        }
        
            Session::addFlash('error', 'Access denied !');
            // return $this->redirectToRoute("home");
            return $this->render("Visiteur/profile.php");
        }
        public function members(){
            return $this->render("Froumsubjet/membrs.php",[
                "users"=> $this->manager->getList(),
                "title"=> "Membres du forum"
            ]);
        }
        public function ubdate($id){
            return $this->render("Froumsubjet/membrs.php",[
                "users"=> $this->manager->ubdateDate($id),
                "title"=> "Membres du forum"
            ]);
        }
    }