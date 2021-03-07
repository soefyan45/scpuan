@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!--======= HOME MAIN SLIDER =========-->
    <section class="home-slider">
        <!-- SLIDE Start -->
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('/mpAssets/images/slide-bg-1.jpg')}}" alt="slider"
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption font-playfair sfb tp-resizeme" data-x="left" data-hoffset="0"
                            data-y="center" data-voffset="-200" data-speed="800" data-start="500"
                            data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                            data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 7; font-size:18px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;">
                            The Latest Product from Malayu eCommerce</div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfl font-extra-bold tp-resizeme" data-x="left" data-hoffset="0"
                            data-y="center" data-voffset="-120" data-speed="800" data-start="800"
                            data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                            data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 6; font-size:80px; color:#2d3a4b; text-transform:uppercase; white-space: nowrap;">
                            <small class="font-regular">$</small>299 </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme" data-x="left" data-hoffset="0"
                            data-y="center" data-voffset="0" data-speed="800" data-start="800"
                            data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                            data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 6; font-size:120px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                            featured </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme" data-x="left" data-hoffset="0"
                            data-y="center" data-voffset="110" data-speed="800" data-start="1300"
                            data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                            data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 6; font-size:120px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                            cycle </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption lfb tp-resizeme" data-x="left" data-hoffset="0" data-y="center"
                            data-voffset="240" data-speed="800" data-start="2200" data-easing="Power3.easeInOut"
                            data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" data-scrolloffset="0"
                            style="z-index: 8;"><a href="#." class="btn">SHOP NOW</a> </div>
                    </li>

                    <!-- SLIDE  -->
                    <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                        <!-- MAIN IMAGE -->
                        <img src="{{asset('/mpAssets/images/slide-bg-2.jpg')}}" alt="slider"
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption font-playfair sfb tp-resizeme" data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="-150" data-speed="800" data-start="500"
                            data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                            data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 7; font-size:18px; color:#fff; max-width: auto; max-height: auto; white-space: nowrap;">
                            The Latest Product from PAVSHOP</div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-regular tp-resizeme letter-space-4" data-x="center"
                            data-hoffset="0" data-y="center" data-voffset="-50" data-speed="800" data-start="800"
                            data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                            data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 6; font-size:78px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                            look beautiful </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4" data-x="center"
                            data-hoffset="0" data-y="center" data-voffset="60" data-speed="800" data-start="1300"
                            data-easing="Power3.easeInOut" data-splitin="chars" data-splitout="none"
                            data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 6; font-size:140px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                            this season </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption sfb font-extra-bold tp-resizeme" data-x="center" data-hoffset="120"
                            data-y="center" data-voffset="200" data-speed="800" data-start="2200"
                            data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none"
                            data-elementdelay="0.07" data-endelementdelay="0.1" data-endspeed="300"
                            style="z-index: 6; font-size:60px; color:#fff; text-transform:uppercase; white-space: nowrap;">
                            <small class="font-regular">$</small> 299 </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption lfb tp-scrollbelowslider tp-resizeme" data-x="center" data-hoffset="-120"
                            data-y="center" data-voffset="200" data-speed="800" data-start="2200"
                            data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1"
                            data-endspeed="300" data-scrolloffset="0" style="z-index: 8;"><a href="#." class="btn">BUY
                                NOW</a> </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">

        <!-- New Arrival -->
        <section class="padding-top-100 padding-bottom-100">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4>Item Populer</h4>
                    <span>Marketplace Melayu Pekanbaru yang menyediakan kebutuhan kebudayaan melayu untuk acara adat dan
                        pentas seni</span>
                </div>
            </div>

            <!-- New Arrival -->
            <div class="arrival-block">

                <!-- Item -->
                @foreach ($ItemSeller as $item)
                <div class="item">
                    <!-- Images -->
                    <img class="img-1" src="{{asset($item['itemhasimages'][0]['imgItems'])}}" height="478px;"
                        width="512px;" alt=""> <img class="img-2"
                        src="{{ asset($item['itemhasimages'][0]['imgItems']) }}" height="478px;" width="512px;" alt="">
                    <!-- Overlay  -->
                    <div class="overlay">
                        <!-- Price -->
                        <span class="price"><small>IDR</small>{{ number_format($item['priceItem'],0,',','.') }}</span>
                        <div class="position-center-center"> <a
                                href="{{ asset($item['itemhasimages'][0]['imgItems']) }}" data-lighter><i
                                    class="icon-magnifier"></i></a> </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name">
                        {{-- usergetshop --}}
                        <a href="{{ route('detail.barang',[$item['itemuser']['usergetshop']['slugShop'],$item['slugNameItem']]) }}">{{ $item['nameItem'] }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Popular Products -->
        <section class="padding-top-50 padding-bottom-150">
            <div class="container">

                <!-- Main Heading -->
                <div class="heading text-center">
                    <h4>Category Products</h4>
                    <span>Temukan kebutuhan anda dengan mudah, </span>
                </div>

                <!-- Popular Item Slide -->
                <div class="papular-block block-slide">

                    <!-- Item -->
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

        <!-- Knowledge Share -->
        {{-- include('Layouts.knowledge') --}}
        <!-- About -->
        @include('layouts.about')
        @include('layouts.newsLetter')
    </div>
    @endsection
