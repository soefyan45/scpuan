<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M_Adnan">
    <title>Melayu eCommerce</title>
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('/mpAssets/rs-plugin/css/settings.css')}}" media="screen" />

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/mpAssets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('/mpAssets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/mpAssets/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/mpAssets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('/mpAssets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/mpAssets/css/responsive.css')}}" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="{{asset('/mpAssets/js/modernizr.js')}}"></script>

    <!-- Online Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- LOADER -->
    <div id="loader">
        <div class="position-center-center">
            <div class="ldr"></div>
        </div>
    </div>
    @yield('_contentMp')
    <!--======= FOOTER =========-->
    <footer>
        <div class="container">
            <!-- ABOUT Location -->
            <div class="col-md-3">
                <div class="about-footer"> <img class="margin-bottom-30" width="100px;"
                        src="{{asset('/mpAssets/images/logo-foot.png')}}" alt="">
                    <p><i class="icon-pointer"></i> Jl. Paritindah No. 12, Pekanbaru Riau, <br>
                        Indonesia.</p>
                    <p><i class="icon-call-end"></i> +62761 196652</p>
                    <p><i class="icon-envelope"></i> info@melayump.com</p>
                </div>
            </div>
            <!-- HELPFUL LINKS -->
            <div class="col-md-3">
                <h6>HELPFUL LINKS</h6>
                <ul class="link">
                    <li><a href="#."> Products</a></li>
                    <li><a href="#."> Find a Store</a></li>
                    <li><a href="#."> Features</a></li>
                    <li><a href="#."> Privacy Policy</a></li>
                    <li><a href="#."> Blog</a></li>
                    <li><a href="#."> Press Kit </a></li>
                </ul>
            </div>

            <!-- SHOP -->
            <div class="col-md-3">
                <h6>SHOP</h6>
                <ul class="link">
                    <li><a href="#."> About Us</a></li>
                    <li><a href="#."> Career</a></li>
                    <li><a href="#."> Shipping Methods</a></li>
                    <li><a href="#."> Contact</a></li>
                    <li><a href="#."> Support</a></li>
                    <li><a href="#."> Retailer</a></li>
                </ul>
            </div>

            <!-- MY ACCOUNT -->
            <div class="col-md-3">
                <h6>MY ACCOUNT</h6>
                <ul class="link">
                    <li><a href="#."> Login</a></li>
                    <li><a href="#."> My Account</a></li>
                    <li><a href="#."> My Cart</a></li>
                    <li><a href="#."> Wishlist</a></li>
                    <li><a href="#."> Checkout</a></li>
                </ul>
            </div>

            <!-- Rights -->

            <div class="rights">
                <p>© 2020 Melayu eCommerce All right reserved. </p>
                <div class="scroll"> <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a> </div>
            </div>
        </div>
    </footer>

    <!--======= RIGHTS =========-->

    </div>
    <script src="{{asset('/mpAssets/js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('/mpAssets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/mpAssets/js/own-menu.js')}}"></script>
    <script src="{{asset('/mpAssets/js/jquery.lighter.js')}}"></script>
    <script src="{{asset('/mpAssets/js/owl.carousel.min.js')}}"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{asset('/mpAssets/rs-plugin/js/jquery.tp.t.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/mpAssets/rs-plugin/js/jquery.tp.min.js')}}"></script>
    <script src="{{asset('/mpAssets/js/main.js')}}"></script>
</body>

</html>