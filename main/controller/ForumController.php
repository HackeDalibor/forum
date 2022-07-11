<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Entities\Message;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index()
        {
          
            $categoryManager = new CategoryManager();
            $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["dateTopic", "DESC"]),
                    "categories" => $categoryManager->findAll(["nameCategory", "ASC"])
                ]
            ];
        
        }

        public function detailTopic($id)
        {

           $messageManager = new MessageManager();
           $topicManager = new TopicManager();


            return [
                "view" => VIEW_DIR."forum/detailTopic.php",
                "data" => [
                    "detail" => $messageManager->findMessagesByTopic($id),
                    "topic" => $topicManager->findOneById($id)
    
                ]
            ];
        
        }

        
        public function addTopic()
        {
            
            if(isset($_POST['submit'])){
                
                $titleTopic = filter_input(INPUT_POST, 'title_topic', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $titleTopic = $_POST["title_topic"];
                
                
                if($titleTopic){
                    
                    $topicManager = new TopicManager();
                    
                    $id = $topicManager->add([
                        
                        'title' => $titleTopic,
                        'user_id' => Session::getUser()->getId(),
                        'category_id' => 3
                        
                    ]);

                    // $categoryManager = new CategoryManager();
 
                    // return [
                    //     "view" => VIEW_DIR."forum/listTopics.php",
                    //     "data" => [
                    //         "topics" => $topicManager->findAll(["dateTopic", "DESC"]),
                    //         "categories" => $categoryManager->findAll(["nameCategory", "ASC"])
            
                    //     ]
                    // ];
         
                    $this->redirectTo("forum", "listTopics");
                    
                }
            }
            
        }
        
        public function addMessage($id)
        {
            $messageManager = new MessageManager();
            // $topicManager = new TopicManager();

            if(isset($_POST['submit'])) {

                $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // $text = $_POST["text"];

                if($text) {

                    $messageManager->add([

                        'text' => $text,
                        'user_id' => 1,
                        'topic_id' => $id

                    ]);

                    // return [
                    //     "view" => VIEW_DIR."forum/detailTopic.php",
                    //     "data" => [
                    //         "detail" => $messageManager->findMessagesByTopic($id),
                    //         "topic" => $topicManager->findOneById($id)
            
                    //     ]
                    // ];

                    $this->redirectTo("forum", "detailTopic", $id);
                }
            }
        }

        public function deleteTopic($id)
        {
            $topicManager = new TopicManager();
            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/deleteTopic.php",
                "data" => [
                    "message" => $messageManager->deleteMessagesByTopic($id),
                    "delete" => $topicManager->delete($id)
                ]
            ];
        }

        public function deleteMessage($id)
        {
            $messageManager = new MessageManager();
            // $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/deleteMessage.php",
                "data" => [
                    "delete" => $messageManager->delete($id)
            
                ]
            ];
            
        }

        public function formModifyMessage($id)
        {

            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/modifyMessage.php",
                "data" => [
                    "message" => $messageManager->findOneById($id)
                ]
            ];

        }

        // public function modifyMessage($id)
        // {
        //     $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        //     if(isset($_POST['submit']))
        //     {
        //         if($text)
        //         {
        //             $messageManager = new MessageManager();

        //             $messageManager->updateMessage($id, $text);
        //         }

        //         $this->redirectTo("forum", "listTopics");
        //     }
        // }

        public function modifyMessage($id){
            $findId = explode(".", $id);
            $idPost = $findId[0];
            $idTopic = $findId[1];
            if(!empty($_POST)){
                $message = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // var_dump($idPost);
                // var_dump($idTopic);
                // var_dump($message);
                // die;
                $messageManager = new MessageManager();
                if($message){
                    $messageManager->update([
                        "text" => $message,
                        // "user_id" => 1,
                        // "topic_id" => $idTopic
                    ], 
                    $idPost);
                }
                $this->redirectTo("forum", "listPostsByTopic", $idTopic);
            }
        }

        
 
    }