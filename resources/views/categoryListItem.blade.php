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
                <h4>PAVSHOP PRODUCTS</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
                    Sed feugiat, tellus vel tristique posuere, diam</p>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- Products -->
        <section class="shop-page padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">

                    <!-- Item Content -->
                    <div class="col-sm-9">
                        <div class="item-display">
                            {{--
                                <div class="row">
                                <!-- Products Select -->
                                <div class="col-xs-6">
                                    <div class="pull-left">

                                        <!-- Short By -->
                                        <select class="selectpicker">
                                            <option>Short By</option>
                                            <option>Short By</option>
                                            <option>Short By</option>
                                        </select>
                                        <!-- Filter By -->
                                        <select class="selectpicker">
                                            <option>Filter By</option>
                                            <option>Short By</option>
                                            <option>Short By</option>
                                        </select>

                                        <!-- GRID & LIST -->
                                        <a href="#." class="grid-style"><i class="icon-grid"></i></a> <a href="#."
                                            class="list-style"><i class="icon-list"></i></a> </div>
                                </div>
                                <div class="col-xs-6 text-right"> <span class="product-num">Showing 1 - 10 of 30
                                        products</span> </div>
                            </div>
                            --}}

                        </div>
                        <!-- Popular Item Slide -->
                        <div class="papular-block row">
                            <!-- Item -->
                            @foreach ($itemCategory[0]['categoryhasitem'] as $item)
                            <div class="col-md-4">
                                <div class="item">
                                    <!-- Item img -->
                                    <div class="item-img"> <img class="img-1" width="270px;" height="352px;"
                                            src="{{asset($item['itemhasimages'][0]['imgItems'])}}" alt=""> <img
                                            class="img-2" width="270px;" height="352px;"
                                            src="{{asset($item['itemhasimages'][0]['imgItems'])}}" alt="">
                                        <!-- Overlay -->
                                        <div class="overlay">
                                            <div class="position-center-center">
                                                <div class="inn"><a
                                                        href="{{asset($item['itemhasimages'][0]['imgItems'])}}"
                                                        data-lighter><i class="icon-eye"></i></a> <a
                                                        href="{{  route('detail.barang',[$item['shopofitem']['slugShop'],$item['slugNameItem']])  }}"><i
                                                            class="icon-link"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Item Name -->
                                    <div class="item-name"> <a
                                            href="{{ route('detail.barang',[$item['shopofitem']['slugShop'],$item['slugNameItem']]) }}">{{ $item['nameItem'] }}</a>
                                    </div>
                                    <!-- Price -->
                                    <span
                                        class="price"><small>IDR</small>{{ number_format($item['priceItem'],0,',','.') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <ul class="pagination in-center">
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Shop SideBar -->
                    <div class="col-sm-3">
                        <div class="shop-sidebar">

                            <!-- Category -->
                            <h5 class="shop-tittle margin-bottom-30">category</h5>
                            <ul class="shop-cate">
                                @foreach ($Category as $category)
                                <li><a href="{{ route('item.category',$category['slugCategory']) }}">
                                        {{ $category['nameCategory'] }}
                                        <span>{{ \App\Http\Controllers\Market\MarketController::countCategoryItem($category['id']) }}</span></a>
                                </li>
                                @endforeach
                            </ul>
                            {{--
                                <!-- FILTER BY PRICE -->
                                <h5 class="shop-tittle margin-top-60 margin-bottom-30">FILTER BY PRICE</h5>
                                <!-- TAGS -->
                                <h5 class="shop-tittle margin-top-60 margin-bottom-30">FILTER BY COLORS</h5>
                                <ul class="colors">
                                    <li><a href="#." style="background:#958170;"></a></li>
                                    <li><a href="#." style="background:#c9a688;"></a></li>
                                    <li><a href="#." style="background:#c9c288;"></a></li>
                                    <li><a href="#." style="background:#a7c988;"></a></li>
                                    <li><a href="#." style="background:#9ed66b;"></a></li>
                                    <li><a href="#." style="background:#6bd6b1;"></a></li>
                                    <li><a href="#." style="background:#82c2dc;"></a></li>
                                    <li><a href="#." style="background:#8295dc;"></a></li>
                                    <li><a href="#." style="background:#9b82dc;"></a></li>
                                    <li><a href="#." style="background:#dc82d9;"></a></li>
                                    <li><a href="#." style="background:#dc82a2;"></a></li>
                                    <li><a href="#." style="background:#e04756;"></a></li>
                                    <li><a href="#." style="background:#f56868;"></a></li>
                                    <li><a href="#." style="background:#eda339;"></a></li>
                                    <li><a href="#." style="background:#edd639;"></a></li>
                                    <li><a href="#." style="background:#daed39;"></a></li>
                                    <li><a href="#." style="background:#a3ed39;"></a></li>
                                    <li><a href="#." style="background:#f56868;"></a></li>
                                </ul>
                                <!-- TAGS -->
                                <h5 class="shop-tittle margin-top-60 margin-bottom-30">PAUPLAR TAGS</h5>
                                <ul class="shop-tags">
                                    <li><a href="#.">Towels</a></li>
                                    <li><a href="#.">Chair</a></li>
                                    <li><a href="#.">Bedsheets</a></li>
                                    <li><a href="#.">Shoe</a></li>
                                    <li><a href="#.">Curtains</a></li>
                                    <li><a href="#.">Clocks</a></li>
                                    <li><a href="#.">TV Cabinets</a></li>
                                    <li><a href="#.">Best Seller</a></li>
                                    <li><a href="#.">Top Selling</a></li>
                                </ul>
                                <!-- BRAND -->
                                <h5 class="shop-tittle margin-top-60 margin-bottom-30">brands</h5>
                                <ul class="shop-cate">
                                    <li><a href="#."> G-Furniture
                                        BigYellow</a></li>
                                    <li><a href="#."> WoodenBazaar</a></li>
                                    <li><a href="#."> GreenWoods</a></li>
                                    <li><a href="#."> Hot-n-Fire </a></li>
                                </ul>
                            --}}
                            <!-- SIDE BACR BANER -->
                            <div class="side-bnr margin-top-50"> <img class="img-responsive"
                                    src="{{asset('/mpAssets/images/sidebar-bnr.jpg')}}" alt="">
                                <div class="position-center-center"> <span class="price"><small>$</small>299</span>
                                    <div class="bnr-text">look
                                        hot
                                        with
                                        style</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection