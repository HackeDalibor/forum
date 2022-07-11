<?php

    namespace Model\Entities;

    use App\Entity;

    class User extends Entity
    {
        private $id;
        private $nickname;
        private $email;
        private $password;
        private \DateTime $creationDate;
        private $roles;
        private $status;

        public function __construct($data)
        {
            $this->hydrate($data);
        }

        /**
         * Get the value of id_user
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
         * Get the value of nickname
         */ 
        public function getNickname()
        {
                return $this->nickname;
        }

        /**
         * Set the value of nickname
         *
         * @return  self
         */ 
        public function setNickname($nickname)
        {
                $this->nickname = $nickname;

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
         * Get the value of password
         */ 
        public function getPassword()
        {
            return $this->password;
        }
        
        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
            $this->password = $password;
            
            return $this;
        }
        
        /**
         * Get the value of creationDate
         */ 
        public function getCreationDate()
        {
                return $this->creationDate->format("d M Y, G:i:s");
        }
        
        /**
         * Set the value of creationDate
         *
         * @return  self
         */ 
        public function setCreationDate($creationDate)
        {
                $this->creationDate = new \DateTime($creationDate);

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRoles()
        {
                return $this->roles;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRoles($roles)
        {
                $this->roles = json_decode($roles);

                if(empty($this->roles)){
                        return $this->roles[] = "ROLE_USER";
                }
        }

        public function hasRole($role)
        {
                return in_array($role, $this->getRoles());
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = false;

                return $this;
        }

        public function __toString()
        {
            return $this->nickname.$this->email.$this->creationDate->format("d m Y, G:i:s").$this->role.$this->status;
        }



    }

?>