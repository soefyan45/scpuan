@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>CHECKOUT</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
                    Sed feugiat, tellus vel tristique posuere, diam</p>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">SHOP</a></li>
                    <li class="active">CHECKOUT</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!--======= CONATACT  =========-->
        <section class="contact padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="contact-form">
                    <h5>Silahkan Isi Data Dengan Lengkap</h5>
                    <div class="row">
                        <div class="col-md-8">

                            <!--======= Success Msg =========-->
                            <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You.
                                Your Message has been Submitted</div>

                            <!--======= FORM  =========-->
                            <form role="form" id="contact_form" class="contact-form" method="post"
                                onSubmit="return false">
                                <ul class="row">
                                    <li class="col-sm-6">
                                        <label>full name *
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <label>Email *
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <label>Phone *
                                            <input type="text" class="form-control" name="company" id="company"
                                                placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <label>SUBJECT
                                            <input type="text" class="form-control" name="website" id="website"
                                                placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>Message
                                            <textarea class="form-control" name="message" id="message" rows="5"
                                                placeholder=""></textarea>
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <button type="submit" value="submit" class="btn" id="btn_submit"
                                            onClick="proceed();">SEND MAIL</button>
                                    </li>
                                </ul>
                            </form>
                        </div>

                        <!--======= ADDRESS INFO  =========-->
                        <div class="col-md-4">
                            <div class="contact-info">
                                <h6>OUR ADDRESS</h6>
                                <ul>
                                    <li> <i class="icon-map-pin"></i>Jl. Paritindah No. 12,.<br>
                                        Pekanbaru Riau, Indonesia</li>
                                    <li> <i class="icon-call-end"></i> +62761 196652</li>
                                    <li> <i class="icon-envelope"></i> <a href="mailto:info@melayump.com"
                                            target="_top">info@melayump.com</a> </li>
                                    <li>
                                        <p>Kami bangga bisa hadir untuk menjadi solusi bagi anda.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--======= MAP =========-->
        <div id="map"></div>

        <!-- About -->
        <section class="small-about padding-top-150 padding-bottom-150">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4>about PAVSHOP</h4>
                    <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu
                        posuere odio luctus non. Nulla lacinia,
                        eros vel fermentum consectetur, risus purus tempc, et iaculis odio dolor in ex. </p>
                </div>

                <!-- Social Icons -->
                <ul class="social_icons">
                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                    <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                    <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                </ul>
            </div>
        </section>

        <!-- News Letter -->
        <section class="news-letter padding-top-150 padding-bottom-150">
            <div class="container">
                <div class="heading light-head text-center margin-bottom-30">
                    <h4>NEWSLETTER</h4>
                    <span>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu
                        posuere odi </span>
                </div>
                <form>
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit">SEND ME</button>
                </form>
            </div>
        </section>
    </div>
    <!-- Begin Map Script -->
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script>
    <script type="text/javascript">
        /*==========  Map  ==========*/
        var map;
        function initialize_map() {
            if ($('#map').length) {
	            var myLatLng = new google.maps.LatLng(-37.814199, 144.961560);
	            var mapOptions = {
		            zoom: 17,
		            center: myLatLng,
		            scrollwheel: false,
		            panControl: false,
		            zoomControl: true,
		            scaleControl: false,
		            mapTypeControl: false,
		            streetViewControl: false
	            };
	            map = new google.maps.Map(document.getElementById('map'), mapOptions);
	            var marker = new google.maps.Marker({
		            position: myLatLng,
		            map: map,
		            tittle: 'MelayuMp',
		            icon: './images/map-locator.png'
	            });
            } else {
	            return false;
            }}
        google.maps.event.addDomListener(window, 'load', initialize_map);
    </script>
    @endsection