<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Entities\Category;
    use Model\Managers\CategoryManager;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\UserManager;

    class CategoryController extends AbstractController implements ControllerInterface
    {

        public function index()
        {
            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."category/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(["nameCategory", "ASC"])
                ]
            ];
        }

        public function detailCategory($id)
        {
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."category/detailCategory.php",
                "data" => [
                    "detail" => $topicManager->findTopicsByCategory($id),
                    "category" => $categoryManager->findOneById($id)
                ]
            ];
        }

        public function addCategory()
        {
            $categoryManager = new CategoryManager();

            if(isset($_POST['submit'])) {

                $nameCategory = filter_input(INPUT_POST, 'name_category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $nameCategory = $_POST["name_category"];

                if($nameCategory) {

                    $categoryManager->add([

                        'nameCategory' => $nameCategory

                    ]);


                    

                    $this->redirectTo("category", "listCategories");

                }
            }

        }

        public function addTopicByCategory($id){
            
            
            
            if(isset($_POST['submit'])){
                
                $titleTopic = filter_input(INPUT_POST, 'title_topic', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // var_dump($titleTopic);
                // var_dump($message);
                // die;
                
                // $titleTopic = $_POST["title_topic"];
                // $message = $_POST["message"];
                
                if($titleTopic && $message){
                    
                    $topicManager = new TopicManager();
                    $messageManager = new MessageManager();
                    
                    $idTopic = $topicManager->add([
                        
                        'title' => $titleTopic,
                        'user_id' => 1,
                        'category_id' => $id
                        
                    ]);

                    $messageManager->add([

                        'text' => $message,
                        'topic_id' => $idTopic,
                        'user_id' => 1

                    ]);

                    
                }
            }
            
            $this->redirectTo("category", "detailCategory", $id);
        }
    }