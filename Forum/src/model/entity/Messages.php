<?php  
namespace App\Model\Entity;
   use App\Core\AbstractEntity;


    class ForumSubjet extends AbstractEntity
    {
        private $id_message;
        private $texte;
        private $DateDeCree;
        private $images;

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
         * Get the value of images
         */ 
        public function getImages()
        {
                return $this->images;
        }

        /**
         * Set the value of images
         *
         * @return  self
         */ 
        public function setImages($images)
        {
                $this->images = $images;

                return $this;
        }
    }