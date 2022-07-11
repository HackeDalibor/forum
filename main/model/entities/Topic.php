<?php

    namespace Model\Entities;

    use App\Entity;

    class Topic extends Entity
    {
        private $id;
        private $title;
        private \DateTime $dateTopic;
        private $lock;
        private $user;
        private $category;

        public function __construct($data)
        {
            $this->hydrate($data);
        }
        

        /**
         * Get the value of id_topic
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
         * Get the value of title
         */ 
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
            $this->title = $title;

            return $this;
        }
            
        /**
         * Get the value of dateTopic
         */ 
        public function getDateTopic()
        {
            $formattedDate = $this->dateTopic->format("d M Y, G:i:s");
            return $formattedDate;
        }
        
        /**
         * Set the value of dateTopic
         *
         * @return  self
         */ 
        public function setDateTopic($dateTopic)
        {
            $this->dateTopic = new \DateTime($dateTopic);

            return $this;
        }

        /**
         * Get the value of lock
         */ 
        public function getLock()
        {
            return $this->lock;
        }

        /**
         * Set the value of lock
         *
         * @return  self
         */ 
        public function setLock($lock)
        {
            $this->lock = false;

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
         * Get the value of category
         */ 
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }

        public function __toString()
        {
            return $this->title.$this->dateTopic->format("d m Y, G:i:s");
        }
        
    }



?>