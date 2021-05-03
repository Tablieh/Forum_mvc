<?php  
namespace App\Model\Entity;
   use App\Core\AbstractEntity;


    class Visiteur extends AbstractEntity
    {
        private $id;
        private $pesudo;
        private $email;
        private $MoteDePass;
        private $DateDeVisite;
        private $role;
        private $TBan;

        public function __construct($data){
            parent::hydrate($data, $this);
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
        /**
         * Get the value of TBan
         */ 
        public function getTBan($format)
        {
                return $this->TBan->format($format);
        }

        /**
         * Set the value of TBan
         *
         * @return  self
         */ 
        public function setTBan($TBan)
        {
                $this->TBan = new \DateTime($TBan);

                return $this;
        }

        public function __toString()
        {
            return $this->pseudo;
        }

        public function hasRole($role){
            return $this->role == $role ? true : false;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }