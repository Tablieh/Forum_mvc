<?php  
namespace App\Model\Entity;
   use App\Core\AbstractEntity;


    class Visiteur extends AbstractEntity
    {
        private $id_visiteur;
        private $pesudo;
        private $email;
        private $MoteDePass;
        private $DateDeVisite;
        private $role;

        public function __construct($data){
            parent::hydrate($data, $this);
        }

        /**
         * Get the value of id_visiteur
         */ 
        public function getId_visiteur()
        {
                return $this->id_visiteur;
        }

        /**
         * Set the value of id_visiteur
         *
         * @return  self
         */ 
        public function setId_visiteur($id_visiteur)
        {
                $this->id_visiteur = $id_visiteur;

                return $this;
        }

        /**
         * Get the value of pesudo
         */ 
        public function getPesudo()
        {
                return $this->pesudo;
        }

        /**
         * Set the value of pesudo
         *
         * @return  self
         */ 
        public function setPesudo($pesudo)
        {
                $this->pesudo = $pesudo;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of MoteDePass
         */ 
        public function getMoteDePass()
        {
                return $this->MoteDePass;
        }

        /**
         * Set the value of MoteDePass
         *
         * @return  self
         */ 
        public function setMoteDePass($MoteDePass)
        {
                $this->MoteDePass = $MoteDePass;

                return $this;
        }

        /**
         * Get the value of DateDeVisite
         */ 
        public function getDateDeVisite()
        {
            return $this->DateDeVisite->format("d-m-Y");
        }

        /**
         * Set the value of DateDeVisite
         *
         * @return  self
         */ 
        public function setDateDeVisite($DateDeVisite)
        {
            $this->DateDeVisite = new \DateTime($DateDeVisite);

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }
    }