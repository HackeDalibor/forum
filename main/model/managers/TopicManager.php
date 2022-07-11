<?php
    namespace Model\Managers;
    //? namespaces sont qualifiés pour résoudre deux problèmes différents :
        //? Ils servent pour une organisation plus adaptée en groupant les classes lesquels marchent ensemble.
        //? Ils autorisent l'utilisation du même nom dans différentes classes.

    
    use App\Manager;
    use App\DAO;
    //? l'opérateur use est un alias.

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function findTopicsByUser($id){


            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.user_id = :id
                    ORDER BY a.dateTopic DESC";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]), 
                $this->className
            );
        }

        public function findTopicsByCategory($id)
        {

            $sql = "SELECT *
            FROM ".$this->tableName."
            WHERE category_id = :id
            ORDER BY dateTopic DESC";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]), 
                $this->className
            );
        }

        

    }