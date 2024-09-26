<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Breezed HTML Bootstrap Template</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-breezed.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

    <!-- Custom CSS for Navigation Background -->
    <style>
        /* Style for Navigation Background */
      /* Style for Navigation Background */
      nav.main-nav {
    background-color: #dfe7f2; /* Nouvelle couleur d'arrière-plan */
    backdrop-filter: none; /* Retirer l'effet de flou (si nécessaire) */
}

/* Changer la couleur du texte des liens dans la nav */
nav.main-nav ul.nav li a {
    color: black; /* Couleur du texte noir pour les liens */
}

/* Couleur du texte survolée */
nav.main-nav ul.nav li a:hover {
    color: #007bff; /* Couleur bleue sur hover */
}
    </style>

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                        EcoVoyageur
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#projects">Projects</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Deplacement</a>
                                <ul>
                                    <li><a href="{{ route('itinerairestem') }}">Itinéraire</a></li>
                                    <li><a href="{{ route('transportstem') }}">Transport</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Activites</a>
                                <ul>
                                    <li><a href="{{ route('activitestem') }}">Activite</a></li>
                                    <li><a href="{{ route('avisstem') }}">Avis</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#contact-us">Contact Us</a></li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Content Start ***** -->
    <div class="container">
        <!-- Section Example -->


        <!-- Another Section -->
        <div class="row">
            <div class="col-12">
                <!-- Add your dynamic content or components here -->

            </div>
        </div>
    </div>
    <!-- ***** Main Content End ***** -->

    <!-- ***** Search Area ***** -->

    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function(){
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
                setTimeout(function() {
                    $("."+selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);
            });
        });
    </script>

    </body>
</html>
