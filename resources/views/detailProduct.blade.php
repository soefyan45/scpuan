@extends('layouts.marketApp')
@section('_contentMp')

<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!--======= SUB BANNER =========-->
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4 class="font-black">{{ $item['nameItem'] }}</h4>
            </div>
        </div>
    </section>
    <!-- Content -->
    <div id="content">

        <!-- Popular Products -->
        <section class="padding-top-100 padding-bottom-100">
            <div class="container">

                <!-- SHOP DETAIL -->
                <div class="shop-detail">
                    <div class="row">
                        <!-- Popular Images Slider -->
                        <div class="col-md-7">
                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    @foreach ($item['itemhasimages'] as $itemIMG)
                                    <li data-thumb="{{asset($itemIMG['imgItems'])}}">
                                        <img class="img-responsive" src="{{asset($itemIMG['imgItems'])}}" width="710px;"
                                            height="700px;" alt="">
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- COntent -->
                        <div class="col-md-5">
                            <h4>{{ $item['nameItem'] }}</h4>
                            <span
                                class="price"><small>IDR</small>{{ number_format($item['priceItem'],0,',','.') }}</span>
                            <!-- Sale Tags -->
                            <div class="on-sale"> 10% <span>OFF</span> </div>
                            <ul class="item-owner">
                                <li>Category :<span> {{ $item['itemcategories']['nameCategory'] }}</span></li>
                                <li>Shop Name:<span> {{ $item['shopofitem']['nameShop'] }}</span></li>
                            </ul>

                            <!-- Item Detail -->
                            <p>{{ $item['descriptionItem'] }}</p>

                            <!-- Short By -->
                            <div class="some-info">
                                <ul class="row margin-top-30">
                                    <li class="col-xs-4">
                                        <div class="quinty">
                                            <!-- QTY -->
                                            <select class="selectpicker" id="qtyAddtoChart">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </li>
                                    <!-- COLORS -->
                                    <li class="col-xs-8">
                                        <ul class="colors-shop">
                                            <li><span class="margin-right-20">Colors</span></li>
                                            @foreach ($item['itemhascolor'] as $itemColor)
                                            <li><a href="#."
                                                    style="background:{{ $itemColor['getitemcolor']['colorCode'] }};"></a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <!-- ADD TO CART -->
                                    @auth
                                    <li class="col-xs-6">
                                        {{ $item['shopofitem']['id'] }}
                                        <button class="btn"
                                            onclick="aadToChart('{{ $item['id'] }}','{{ $item['shopofitem']['id'] }}');"
                                            id="addToChart">ADD TO CART</button>
                                    </li>
                                    @else
                                    <li class="col-xs-6"> <a href="{{ route('user.login') }}" class="btn">ADD TO CART</a> </li>

                                    @endauth


                                    <!-- LIKE -->
                                    <li class="col-xs-6"> <a href="#." class="like-us"><i class="icon-heart"></i></a>
                                    </li>
                                </ul>

                                <!-- INFOMATION -->
                                <div class="inner-info">
                                    <h6>DELIVERY INFORMATION</h6>
                                    <p>Dengan Layanan Kurir Lokal Pekanbaru </p>
                                    {{-- <h6>SHIPPING & RETURNS</h6> --}}

                                    <h6>SHARE THIS PRODUCT</h6>

                                    <!-- Social Icons -->
                                    <ul class="social_icons">
                                        <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                                        <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                                        <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                                        <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--======= PRODUCT DESCRIPTION =========-->
                <div class="item-decribe">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs animate fadeInUp" data-wow-delay="0.4s" role="tablist">
                        <li role="presentation" class="active"><a href="#descr" role="tab"
                                data-toggle="tab">DESCRIPTION</a></li>
                        <li role="presentation"><a href="#review" role="tab" data-toggle="tab">REVIEW (03)</a></li>
                        <li role="presentation"><a href="#tags" role="tab" data-toggle="tab">INFORMATION</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content animate fadeInUp" data-wow-delay="0.4s">
                        <!-- DESCRIPTION -->
                        <div role="tabpanel" class="tab-pane fade in active" id="descr">
                            <p>{{ $item['descriptionItem'] }}<br>
                            </p>
                        </div>

                        <!-- REVIEW -->
                        <div role="tabpanel" class="tab-pane fade" id="review">
                            <h6>3 REVIEWS FOR SHIP YOUR IDEA</h6>

                            <!-- REVIEW PEOPLE 1 -->
                            <div class="media">
                                <div class="media-left">
                                    <!--  Image -->
                                    <div class="avatar"> <a href="#"> <img class="media-object"
                                                src="{{asset('/mpAssets/images/avatar-1.jpg')}}" alt=""> </a> </div>
                                </div>
                                <!--  Details -->
                                <div class="media-body">
                                    <p class="font-playfair">“Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.”</p>
                                    <h6>TYRION LANNISTER <span class="pull-right">MAY 10, 2016</span> </h6>
                                </div>
                            </div>

                            <!-- REVIEW PEOPLE 1 -->

                            <div class="media">
                                <div class="media-left">
                                    <!--  Image -->
                                    <div class="avatar"> <a href="#"> <img class="media-object"
                                                src="{{asset('/mpAssets/images/avatar-2.jpg')}}" alt=""> </a> </div>
                                </div>
                                <!--  Details -->
                                <div class="media-body">
                                    <p class="font-playfair">“Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua.”</p>
                                    <h6>TYRION LANNISTER <span class="pull-right">MAY 10, 2016</span> </h6>
                                </div>
                            </div>

                            <!-- ADD REVIEW -->
                            <h6 class="margin-t-40">ADD REVIEW</h6>
                            <form>
                                <ul class="row">
                                    <li class="col-sm-6">
                                        <label> *NAME
                                            <input type="text" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <label> *EMAIL
                                            <input type="email" value="" placeholder="">
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label> *YOUR REVIEW
                                            <textarea></textarea>
                                        </label>
                                    </li>
                                    <li class="col-sm-6">
                                        <!-- Rating Stars -->
                                        <div class="stars"> <span>YOUR RATING</span> <i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                    </li>
                                    <li class="col-sm-6">
                                        <button type="submit" class="btn btn-dark btn-small pull-right no-margin">POST
                                            REVIEW</button>
                                    </li>
                                </ul>
                            </form>
                        </div>

                        <!-- TAGS -->
                        <div role="tabpanel" class="tab-pane fade" id="tags"> </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Products -->
        <section class="light-gray-bg padding-top-150 padding-bottom-150">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4>Category Products</h4>
                    <span>Temukan kebutuhan anda dengan mudah, </span>
                </div>

                <!-- Popular Item Slide -->
                <div class="papular-block block-slide">

                    @foreach ($categoryItem as $categoryItem)
                    <div class="item">
                        <!-- Item img -->
                        <div class="item-img"> <img class="img-1" src="{{asset($categoryItem['imgCategory'])}}" alt="">
                            <img class="img-2" src="{{asset($categoryItem['imgCategory'])}}" alt="">
                            <!-- Overlay -->
                            <div class="overlay">
                                <div class="position-center-center">
                                    <div class="inn"><a href="{{asset($categoryItem['imgCategory'])}}" data-lighter><i
                                                class="icon-eye"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Item Category -->
                        <div class="item-name"> <a
                                href="{{ route('item.category',$categoryItem['slugCategory']) }}">{{ $categoryItem['nameCategory'] }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        function aadToChart(item_id,shop_id){
            //alert('Tambahkan Ke Chart')
            //var nilai   = totalChart++;
            var itemID  = item_id;
            var shopID  = shop_id;
            var qty     = document.getElementById('qtyAddtoChart').value;
            var secure_token = '{{ csrf_token() }}';
            //document.getElementById('countChart').innerHTML = nilai;
            $.ajax({
                //$("#listChart").empty();
                url : "/user/add/chart",
                method : "GET",
                data : {
                    'item_id'   : itemID,
                    'shop_id'   : shopID,
                    'qty'       : qty,
                    '_token'    : secure_token
                },
                async : false,
                dataType : 'json',
                success: function(data){
                    //console.log(data);
                    $("#listChart").empty();
                    var dataList = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var urlGambar = data[i].charthasitem.itemhasimages[0].imgItems;
                        var priceItem = data[i].charthasitem.priceItem;
                        var nameItem  = data[i].charthasitem.nameItem;
                        var qtyItem   = data[i].qty_item;
                        $("#listChart").append("<li><div class='media-left'><div class='cart-img'><img class='media-object img-responsive'src='"+urlGambar+"' alt='...'></div></div><div class='media-body'><h6 class='media-heading'>"+nameItem+"</h6><span class='price'>IDR"+priceItem+"</span> <span class='qty'>"+qtyItem+" Qty</span></div></li>");
                    }
                },error: function (xhr, ajaxOptions, thrownError) {
                    //console.log(xhr.message);
                }
            });
        };
    </script>

    @endsection