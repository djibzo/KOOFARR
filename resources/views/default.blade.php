<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOOFARR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
</head>

<body>
    <div>
        <div class="header-blue">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#">KOOFARR</a><button class="navbar-toggler"
                        data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle
                            navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link active"
                                    href="/">Accueil</a></li>
                            {{-- <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Dropdown </a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                            </li> --}}
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input
                                    class="form-control search-field" type="search" name="search" id="search-field">
                            </div>
                        </form><span class="navbar-text"> <a href="{{ route('login') }}"
                                class="login">Connexion</a></span><a class="btn btn-light action-button" role="button"
                            href="{{ route('register') }}">Inscription</a>
                    </div>
                </div>
            </nav>
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1>Bienvenue sur <b>KOOFARR</b> Votre Plateforme de Transfert d'Argent en Ligne</h1>
                        <p>Chez KOOFARR, nous nous engageons à simplifier vos transferts d'argent et à offrir une
                            expérience sécurisée et transparente à nos utilisateurs. Que vous envoyiez de l'argent à
                            votre famille, à des amis ou que vous effectuiez des paiements internationaux, KOOFARR est
                            là pour vous accompagner à chaque étape du processus </p><button
                            class="btn btn-light btn-lg action-button" type="button">En savoir plus</button>
                    </div>
                    {{-- <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder">
                        <div class="iphone-mockup"><img src="assets/img/iphone.svg" class="device">
                            <div class="screen"></div>
                        </div>
                    </div> --}}
                    <div class="col-md-5 mt-5 pt-4 ml-4">
                        <img src="https://static.vecteezy.com/system/resources/previews/001/923/907/non_2x/young-man-with-laptop-and-money-free-vector.jpg" class="img-thumbnail" alt="...">
                    </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
