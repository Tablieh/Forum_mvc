<?php
    namespace App\Model\Entity;
 
    use App\Core\AbstractEntity as AE;
    use App\Core\EntityInterface;

    class SujetDetails extends AE implements EntityInterface
    {

        private $sujet;
        private $message;
        private $nombreDeMessages;

        
        public function __construct($data){
            parent::hydrate($data, $this);
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

       

        /**
         * Get the value of nombreDeMessages
         */ 
        public function getNombreDeMessages()
        {
                return $this->nombreDeMessages;
        }

        /**
         * Set the value of nombreDeMessages
         *
         * @return  self
         */ 
        public function setNombreDeMessages($nombreDeMessages)
        {
                $this->nombreDeMessages = $nombreDeMessages;

                return $this;
        }

        /**
         * Get the value of message
         */ 
        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }
    }