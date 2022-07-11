<?php
    namespace Model\Managers;
    
    
    use App\Manager;
    use App\DAO;

    class UserManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }

        public function findOneByPseudo($data) {

            $sql = "SELECT *
                    FROM ".$this->tableName." u
                    WHERE u.nickname = :nickname
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['nickname' => $data], false), 
                $this->className
            );

        }

        // public function 

    }