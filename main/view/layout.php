<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/mediaQuerries.css">
    <title>Document</title>
</head>
<body>
    

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Forum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?ctrl=category&action=index">Categories list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?ctrl=forum&action=index">Topics list</a>
                </li>

                <?php if(App\Session::isAdmin()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?ctrl=user&action=index">Users list</a>
                    </li>
                <?php  }  // if(App\Session::getUser()) {} else {} ?>
                <!-- <li class="nav-item">
                <a class="nav-link" href="">Home
                </a>
                </li> -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Paramètres</a>
                <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="index.php?ctrl=user&action=formAddUser">S'inscrire</a> -->

                    <?php if(/* session_status() === PHP_SESSION_NONE */ App\Session::getUser()) { ?>

                        <a class="dropdown-item" href="index.php?ctrl=security&action=logout">Déconnexion</a>

                    <?php } else { ?>

                        <a class="dropdown-item" href="index.php?ctrl=security&action=registerForm">Register</a>
                        <!-- <a class="dropdown-item" href="index.php?ctrl=security&action=loginForm">Login</a> -->

                    <?php } ?>

                    <!-- <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a> -->
                </div>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    </header>
    <main id="forum">
        <?= $page ?>
        <script src="public/js/script.js"></script>
    </main>
    <footer>

        <div class="contenu-footer">
            <div class="block footer-services">
                <h3>Nos services</h3>
                <ul class="liste-services">
                    <li><a href="#">Bonjour</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>

            <div class="block footer-contact">
                <h3>Contact</h3>
                <p>N° Tel: 911</p>
                <p>Email: support@fbi.fr</p>
                <p>30 Rue Antoine-Julien Hénard, 75012 Paris</p>
            </div>
            <!-- <div class="block footer-horaires"></div> -->
            <!-- Horaires de travail etc.. -->
            <!-- On pourra en ajouter autant d'options dans le footer que l'on souhaite -->

            <div class="block footer-medias">
                <h3>Nos réseaux</h3>
                <ul class="liste-media">
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i>LinkedIn</a></li>
                    <li><a href="#"><img src="public/img/github.svg" alt="github">GitHub</a></li>
                    <li><a href="#"><img src="public/img/youtube.png" alt="youtube">Youtube</a></li>
                    <li><a href="#"><img src="public/img/messenger.png" alt="facebook">Facebook</a></li>
                    <li><a href="#"><img src="public/img/instagram.svg" alt="instagram">Instagram</a></li>
                    <li><a href="#"><img src="public/img/snapchat.png" alt="snapchat">Snapchat</a></li>
                </ul>
            </div>

        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>