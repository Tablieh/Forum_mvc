<?php
    namespace App\Model\Entity;
    
    use App\Core\AbstractEntity as AE;
    use App\Core\EntityInterface;

    class Messages extends AE implements EntityInterface
    {
        private $id;
        private $texte;
        private $DateDeCree;
        private $visiteur;
        private $sujet;

        public function __construct($data){
            parent::hydrate($data, $this);
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
            return $this->getVisiteur()." et Date de Ajout : ".$this->getDateDeCree('d/m/Y H:i:s');
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

        /**
         * Get the value of visiteur
         */ 
        public function getVisiteur()
        {
                return $this->visiteur;
        }

        /**
         * Set the value of visiteur
         *
         * @return  self
         */ 
        public function setVisiteur($visiteur)
        {
                $this->visiteur = $visiteur;

                return $this;
        }
    }