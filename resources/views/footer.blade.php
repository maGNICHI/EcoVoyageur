<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Breezed HTML Bootstrap Template</title>

<!--

Breezed Template

https://templatemo.com/tm-543-breezed

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-breezed.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="left-text-content">
                        <p>Copyright &copy; Coder's.

                        - Design: <a rel="nofollow noopener" href="https://templatemo.com">TemplateMo</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><p>Follow Us</p></li>
                                <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-facebook"></i></a></li>
                                <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-twitter"></i></a></li>
                                <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-linkedin"></i></a></li>
                                <li><a rel="nofollow" href="https://fb.com/templatemo"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
