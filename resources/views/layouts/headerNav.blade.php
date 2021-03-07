<header>
    <div class="sticky">
        <div class="container">
            <!-- Logo -->
            <div class="logo"> <a href="{{ route('index') }}"><img class="img-responsive" style="width: 100px;"
                        src="{{asset('/mpAssets/images/logo.png')}}" alt=""></a> </div>
            <nav class="navbar ownmenu">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle
                            navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span>
                    </button>
                </div>

                <!-- NAV -->
                <div class="collapse navbar-collapse" id="nav-open-btn">
                    <ul class="nav">
                        <li class="active"> <a href="{{ route('index') }}">Home</a>
                        </li>
                        <!-- MEGA MENU -->
                        <li class="dropdown megamenu"> <a href="#." class="dropdown-toggle"
                                data-toggle="dropdown">store</a>
                            <div class="dropdown-menu">
                                <div class="row">
                                    <!-- Shop Pages -->
                                    <div class="col-md-3">
                                        <h6>Category</h6>
                                        <ul>
                                            @foreach ($Category as $category)
                                            <li> <a
                                                    href="{{ route('item.category',$category['slugCategory']) }}">{{ $category['nameCategory'] }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- TOp Rate Products -->
                                    <div class="col-md-4">
                                        <h6>TOp Rate Products</h6>
                                        <div class="top-rated">
                                            <ul>
                                                @foreach ($Item as $item)
                                                <li>
                                                    <div class="media-left">
                                                        <div class="cart-img"> <a
                                                                {{-- href="{{ route('detail.barang',[$item['shopofitem']['slugShop'],$item['slugNameItem']]) }}"> --}}
                                                                href="{{ route('detail.barang',[$item['itemuser']['usergetshop']['slugShop'],$item['slugNameItem']]) }}">
                                                                <img class="media-object img-responsive"
                                                                    src="{{asset($item['itemhasimages']['0']['imgItems'])}}"
                                                                    alt="..."> </a>
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">
                                                            {{substr($item['nameItem'], 0, 30)}}...
                                                        </h6>
                                                        <div class="stars"> <i class="fa fa-star"></i> <i
                                                                class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        </div>
                                                        <span
                                                            class="price">{{ number_format($item['priceItem'],0,',','.') }}
                                                            IDR</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- New Arrival -->
                                    {{-- $Latest --}}
                                    <div class="col-md-5">
                                        <h5>{{substr($Latest['nameItem'], 0, 30)}}<span>(Best Collection)</span></h5>
                                        <img width="100px;" class="nav-img"
                                            src="{{asset($Latest['itemhasimages']['0']['imgItems'])}}" alt="">
                                        <p>{{substr($Latest['descriptionItem'], 0, 30)}}</p>
                                        <a href="#." class="btn btn-small btn-round">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li> <a href="{{ route('about') }}">About </a> </li>
                        <li> <a href="{{ route('contact') }}"> contact</a> </li>
                    </ul>
                </div>
                <!-- Nav Right -->
                <div class="nav-right">
                    <ul class="navbar-right">
                        @auth
                        <!-- USER INFO -->
                        <li class="dropdown user-acc"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                role="button"><i class="icon-user"></i> </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <h6>HELLO! {{ Auth::user()['name'] }}</h6>
                                </li>
                                <li><a href="{{ route('invoice.list') }}">MY INVOICE</a></li>
                                <li><a href="{{ route('order.list') }}">MY ORDER</a></li>
                                <li><a href="{{ route('shoping.cart') }}">MY CART</a></li>
                                <li><a href="{{ route('account.info') }}">ACCOUNT INFO</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn teal" style="width: 100%;" type="submit">LOG OUT</button>
                                    </form>

                                </li>
                            </ul>
                        </li>
                        <!-- USER BASKET -->
                        <li class="dropdown user-basket"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="true"><i
                                    class="icon-basket-loaded"></i> <b id="countChart"></b></a>
                            <ul class="dropdown-menu">
                                <ul id="listChart">
                                    {{-- @foreach (\App\Http\Controllers\Market\MarketController::getListCart() as $CartItem)
                                    <li>
                                        <div class='media-left'>
                                            <div class='cart-img'><a href='#'> <img class='media-object img-responsive'
                                                        src='{{ asset($CartItem['charthasitem']['itemhasimages'][0]['imgItems']) }}'
                                                        alt='...'></a></div>
                                        </div>
                                        <div class='media-body'>
                                            <h6 class='media-heading'>{{ $CartItem['charthasitem']['nameItem'] }}</h6>
                                            <span class='price'>IDR
                                                {{ number_format($CartItem['charthasitem']['priceItem'],0,',','.') }}
                                            </span> <span class='qty'>{{ $CartItem['qty_item'] }} Qty</span>
                                        </div>
                                    </li>

                                    @endforeach --}}
                                </ul>
                                <li class="margin-0">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            {{-- <a href="{{ route('shoping.cart') }}" class="btn">VIEW
                                                CART</a> --}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="user-acc"> <a href="{{ route('user.login') }}" role="button"><i
                                    class="icon-user"></i> </a>
                        </li>
                        <!-- USER BASKET -->
                        <li class="user-basket"> <a href="{{ route('user.login') }}" role="button" aria-haspopup="true"
                                aria-expanded="true"><i class="icon-basket-loaded"></i> <b id="countChart"></b></a>
                        </li>
                        @endauth
                        <!-- SEARCH BAR -->
                        <li class="dropdown"> <a href="javascript:void(0);" class="search-open"><i
                                    class=" icon-magnifier"></i></a>
                            <div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
                                <div class="search-overlay"></div>
                                <div class="position-center-center">
                                    <div class="search">
                                        <form action="{{ route('search') }}" method="get">
                                            <input type="search" id="search" name="search" placeholder="Search Shop">
                                            <button type="submit"><i class="icon-check"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
