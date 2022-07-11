<?php
    namespace Model\Managers;
    
    
    use App\Manager;
    use App\DAO;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        public function findMessagesByTopic($id){


            $sql = "SELECT *
                    FROM ".$this->tableName."
                    WHERE topic_id = :id
                    ORDER BY dateMessage ASC";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]), 
                $this->className
            );
        }

        public function deleteMessagesByTopic($id)
        {
            $sql = "DELETE FROM ".$this->tableName."
                    WHERE topic_id = :id";

            return DAO::delete($sql, ['id' => $id]); 
        }
        
        public function updateMessage($id, $text) {
            $sql = "UPDATE ".$this->tableName."
                    SET text = :text
                    WHERE id_".$this->tableName." = :id";

            return DAO::update($sql, ['id' => $id, 'text' => $text]);
        }
    }