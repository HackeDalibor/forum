<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;
    
    class HomeController extends AbstractController implements ControllerInterface {

        public function index(){
            
           
            return [
                "view" => VIEW_DIR."home.php"
            ];
        }
    }
