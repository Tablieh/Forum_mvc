<?php
    namespace App\Model\Entity;
    
    use App\Core\AbstractEntity as AE;
    use App\Core\EntityInterface;

    class Messages extends AE implements EntityInterface
    {
        private $id_message;
        private $texte;
        private $DateDeCree;
        private $utilisateur;
        private $sujet;

        public function __construct($data){
            parent::hydrate($data, $this);
        }

        /**
         * Get the value of id_message
         */ 
        public function getId_message()
        {
                return $this->id_message;
        }

        /**
         * Set the value of id_message
         *
         * @return  self
         */ 
        public function setId_message($id_message)
        {
                $this->id_message = $id_message;

                return $this;
        }

        /**
         * Get the value of texte
         */ 
        public function getTexte()
        {
                return $this->texte;
        }

        /**
         * Set the value of texte
         *
         * @return  self
         */ 
        public function setTexte($texte)
        {
                $this->texte = $texte;

                return $this;
        }

       /**
         * Get the value of DateDeCree
         */ 
        public function getDateDeCree()
        {
            return $this->DateDeCree->format("d-m-Y");
        }

        /**
         * Set the value of DateDeCree
         *
         * @return  self
         */ 
        public function setDateDeCree($DateDeCree)
        {
            $this->DateDeCree = new \DateTime($DateDeCree);

                return $this;
        }

      

        /**
         * Get the value of utilisateur
         */ 
        public function getUtilisateur()
        {
                return $this->utilisateur;
        }

        /**
         * Set the value of utilisateur
         *
         * @return  self
         */ 
        public function setUtilisateur($utilisateur)
        {
                $this->utilisateur = $utilisateur;

                return $this;
        }

        /**
         * Get the value of sujet
         */ 
        public function getSujet()
        {
                return $this->sujet;
        }

        /**
         * Set the value of sujet
         *
         * @return  self
         */ 
        public function setSujet($sujet)
        {
                $this->sujet = $sujet;

                return $this;
        }
        public function __toString()
        {
            return $this->getDateDeCree('d/m/Y H:i:s');
        }
    }