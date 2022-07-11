<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UserManager;
    use Model\Managers\MessageManager;
    use Model\Managers\TopicManager;
    use Model\Managers\CategoryManager;
    
    class UserController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $userManager = new UserManager();

            return [
                "view" => VIEW_DIR."user/listUsers.php",
                "data" => [
                    "users" => $userManager->findAll(["creationDate", "DESC"])
                ]
            ];
        
        }

        public function detailUser($id){

            $userManager = new UserManager();
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();
 
             return [
                 "view" => VIEW_DIR."user/detailUser.php",
                 "data" => [
                    "topics" => $topicManager->findTopicsByUser($id),
                    "user" => $userManager->findOneById($id),
                    "categories" => $categoryManager->findAll(["nameCategory", "ASC"])
     
                 ]
             ];
         
         }

         public function formAddUser(){
            return [
                "view" => VIEW_DIR."user/addUser.php"
            ];
         }

         public function addUser(){
             
            if(isset($_POST['submit'])){

                 
                 
                 
                if(isset($_POST['nickname']) && isset($_POST['email']) && isset($_POST['password'])){
                    
                    $userManager = new UserManager();
                     
                    $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $userManager->add([
                        'nickname' => $nickname,
                        'email' => $email,
                        'password' => $password
                    ]);

                    // header('Location:index.php?ctrl=user&action=index');

                    $this->redirectTo("user", "listUsers");
                } else {
                    echo "Cet utilisateur existe déjà";
                }

            }
         }

    }