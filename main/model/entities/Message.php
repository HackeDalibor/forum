<?php

    namespace Model\Entities;

    use App\Entity;

    class Message extends Entity
    {
        private $id;
        private $text;
        private \DateTime $dateMessage;
        private $user;
        private $topic;

        public function __construct($data)
        {
            $this->hydrate($data);
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
         * Get the value of text
         */ 
        public function getText()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function setText($text)
        {
            $this->text = $text;

            return $this;
        }
        
        /**
         * Get the value of dateMessage
         */ 
        public function getDateMessage()
        {
            return $this->dateMessage->format("d M Y, G:i:s");
        }
        
        /**
         * Set the value of dateMessage
         *
         * @return  self
         */ 
        public function setDateMessage($dateMessage)
        {
            $this->dateMessage = new \DateTime($dateMessage);
            
            return $this;
        }
        
        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }
        
        /**
         * Get the value of topic
         */ 
        public function getTopic()
        {
                return $this->topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setTopic($topic)
        {
                $this->topic = $topic;

                return $this;
        }
        
        public function __toString()
        {
            return $this->text.$this->dateMessage->format("d m Y, G:i:s");
        }




    }

?>