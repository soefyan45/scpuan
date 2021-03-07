@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
            <div class="container">
                <!-- Payments Steps -->
                @if (count($ItemCart)==0)
                <div class="text-center">

                    <h2 class="text-center"><b>Empty Cart Lets Happy Shopping</b></h2>
                    <br><a href="/" class="btn text-center">Happy Shopping</a>
                </div>
                @endif


                @if (count($ItemCart)!=0)
                <div class="shopping-cart text-center">
                    <div class="cart-head">
                        <ul class="row">
                            <!-- PRODUCTS -->
                            <li class="col-sm-2 text-left">
                                <h6>PRODUCTS</h6>
                            </li>
                            <!-- NAME -->
                            <li class="col-sm-4 text-left">
                                <h6>NAME</h6>
                            </li>
                            <!-- PRICE -->
                            <li class="col-sm-2">
                                <h6>PRICE</h6>
                            </li>
                            <!-- QTY -->
                            <li class="col-sm-1">
                                <h6>QTY</h6>
                            </li>

                            <!-- TOTAL PRICE -->
                            <li class="col-sm-2">
                                <h6>TOTAL</h6>
                            </li>
                            <li class="col-sm-1"> </li>
                        </ul>
                    </div>
                    @foreach ($ItemCart as $itemCart)
                    <ul class="row cart-details">
                        <li class="col-sm-6">
                            <div class="media">
                                <!-- Media Image -->
                                <div class="media-left media-middle"><a
                                        href="{{ route('detail.barang',[$itemCart['shopofitem']['slugShop'],$itemCart['charthasitem']['slugNameItem']]) }}"
                                        class="item-img"> <img class="media-object"
                                            src="{{asset($itemCart['charthasitem']['itemhasimages'][0]['imgItems'])}}"
                                            alt="">
                                    </a></div>
                                <!-- Item Name -->
                                <div class="media-body">
                                    <div class="position-center-center">
                                        <h5>{{ $itemCart['charthasitem']['nameItem'] }}</h5>
                                        <p><b>{{ $itemCart['charthasitem']['shopofitem']['nameShop'] }}</b></p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- PRICE -->
                        <li class="col-sm-2">
                            <div class="position-center-center"> <span
                                    class="price">{{ number_format($itemCart['charthasitem']['priceItem'],0,',','.')}}
                                    <small>IDR</small></span> </div>
                        </li>

                        <!-- QTY -->
                        <li class="col-sm-1">
                            <div class="position-center-center">
                                <div class="quinty">
                                    <!-- QTY -->
                                    <b>{{ $itemCart['qty_item'] }}</b>
                                </div>
                            </div>
                        </li>
                        <!-- TOTAL PRICE -->
                        <li class="col-sm-2">
                            <div class="position-center-center"> <span
                                    class="price">{{ number_format($itemCart['charthasitem']['priceItem']*$itemCart['qty_item'],0,',','.')}}<small>IDR</small></span>
                            </div>
                        </li>
                        <!-- REMOVE -->
                        <li class="col-sm-1">
                            <div class="position-center-center"> <a href="{{ route('shoping.cart.del',[$itemCart['id']]) }}"><i class="icon-close"></i></a> </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
                @endif


            </div>
        </section>
        <!--======= PAGES INNER =========-->
        <section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
            <div class="container">
                <!-- SHOPPING INFORMATION -->
                <div class="cart-ship-info margin-top-0">
                    <div class="row">
                        <!-- DISCOUNT CODE -->
                        <div class="col-sm-7">
                            <h6>DISCOUNT CODE</h6>
                            <form>
                                <input type="text" value="" placeholder="ENTER YOUR CODE IF YOU HAVE ONE">
                                <button type="submit" class="btn btn-small btn-dark">APPLY CODE</button>
                            </form>
                            <form
                                style="background: 0%;padding-block-start: 0px;padding-block-end: 0px;margin: 0px;margin-block-end: 0px;margin-block-start: 0px;padding-left: 0px;padding-right: 0px;border-top-width: 0px;"
                                action="{{ route('check.out') }}" method="GET">
                                @foreach ($ItemCart as $itemCart)
                                <input type="text" name="idChart[]" value="{{ $itemCart['id'] }}"
                                    style="display: none;">
                                @endforeach
                                <div class="coupn-btn">
                                    <a href="/" class="btn">continue shopping</a>
                                    <button class="btn">Next</button>
                                </div>
                            </form>

                        </div>
                        <!-- SUB TOTAL -->
                        <div class="col-sm-5">
                            <h6>Total</h6>
                            <div class="grand-total">
                                <div class="order-detail">
                                    <?php $totalCost = 0 ?>
                                    @foreach ($ItemCart as $itemCart)
                                    <p>{{ $itemCart['charthasitem']['nameItem'] }}
                                        <span>{{ number_format($itemCart['charthasitem']['priceItem']*$itemCart['qty_item'],0,',','.')}}IDR
                                        </span>
                                    </p>
                                    <?php $totalCost += $itemCart['charthasitem']['priceItem']*$itemCart['qty_item'] ?>

                                    @endforeach
                                    <!-- SUB TOTAL -->
                                    <p class="all-total">TOTAL COST <span>
                                            <?php
                                        echo number_format($totalCost,0,',','.')
                                        ?>_IDR</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        var data = document.getElementById('Gt').value;
        alert(data);
        for(i=0; i<data.length; i++){
                //sv += data[i];
                alert(data[i]);
            }
    </script>
    @endsection