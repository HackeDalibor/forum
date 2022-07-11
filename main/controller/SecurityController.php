<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\MessageManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;

    class SecurityController  extends AbstractController implements ControllerInterface {

    
    
        public function registerForm(){

            return [
                "view" => VIEW_DIR."security/register.php",
                "data" => null
            ];

        }

        public function register(){

            if (isset($_POST['submitSignup'])) {
                
                $nickname = filter_input(INPUT_POST, "nicknameSignup", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "emailSignup", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "passwordSignup", FILTER_SANITIZE_FULL_SPECIAL_CHARS, /* FILTER_VALIDATE_REGEXP, */
                    // array(
                    //     "options" => array("regexp" => '/[A-Za-z0-9]{8,32}/')
                    // )
                );
                $confirmPassword = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);



                if($nickname && $password && $email) {

                    if(($password == $confirmPassword) /* and strlen($password) >= 8 */) {
                        
                        $manager = new UserManager();
                        $user = $manager->findOneByPseudo($nickname);

                        if(!$user){

                            //TODO : Si l'email n'existe pas, on poursuit la requête
                            // if(!$user->getEmail()) {} 

                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            
                            if($manager->add([
                                "nickname" => $nickname,
                                "email" => $email,
                                "password" => $hash,
                                "roles" => json_encode(['ROLE_USER'])
                            ])) {
                                return var_dump("Vous êtes inscrit");
                                $this->redirectTo("security", "registerForm");
                            } 
                        } else {
                            echo "Cet utilisateur existe déjà !";
                        }
                    } else {
                        echo "Vos mots de passe ne sont pas les mêmes ou vous avez moins de 8 caractères !";
                    }
                } else {
                    echo "Vous devez compléter tous les champs !";
                }
            }
            return [
                "view" => VIEW_DIR."security/register.php"
                
            ];
        }

        public function loginForm(){

            return [
                "view" => VIEW_DIR."security/login.php",
                "data" => null
            ];

        }

        public function login()
        {

            if(isset($_POST['submitLogin']))
            {

                $nickname = filter_input(INPUT_POST, "nicknameLogin", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "emailLogin", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, "passwordLogin", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($nickname && $email && $password)
                {
                    $userManager = new UserManager();
                    $checkNick = $userManager->findOneByPseudo($nickname);

                    $hashPass = $checkNick->getPassword();

                    // var_dump($checkNick);
                    // var_dump($hashPass);
                    // die;
                    if(password_verify($password, $hashPass))
                    {
                    
                        Session::setUser($checkNick);
                        Session::addFlash("success","tu est co wini l'ourson est fier  de toi !");

                        $this->redirectTo("forum", "listTopics");
                    }
                }
            }

        }

        public function logout()
        {
            session_unset();

            $this->redirectTo("forum", "listTopics");
        }
    }