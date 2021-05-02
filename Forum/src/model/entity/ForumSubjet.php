<?php  
namespace App\Model\Entity;
   use App\Core\AbstractEntity;


    class ForumSubjet extends AbstractEntity
    {
        private $id_forum;
        private $titre;
        private $DateDeCree;

        public function __construct($data){
            parent::hydrate($data, $this);
        }

        

        /**
         * Get the value of id_forum
         */ 
        public function getId_forum()
        {
                return $this->id_forum;
        }

        /**
         * Set the value of id_forum
         *
         * @return  self
         */ 
        public function setId_forum($id_forum)
        {
                $this->id_forum = $id_forum;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

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
    }