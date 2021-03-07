@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="chart-page padding-top-100 padding-bottom-100">
            <div class="container">
                <!-- Payments Steps -->
                <div class="shopping-cart">
                    <!-- SHOPPING INFORMATION -->
                    <div class="cart-ship-info">
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="col-sm-12">
                                    <h6>YOUR Shipping List</h6>
                                    @foreach ($Shipping as $shipping)
                                    <div class="order-place">
                                        <div class="order-detail">
                                            <p><b>{{ $shipping['nameShipping'] }}</b></p>
                                        </div>
                                        <div class="pay-meth">
                                            <ul>
                                                <li>
                                                    <div class="radio">
                                                        <input type="radio" name="useShipping[]"
                                                            onclick="chooseShipping('{{ $shipping['id'] }}')"
                                                            id="useShipping{{ $shipping['id'] }}"
                                                            value="{{ $shipping['id'] }}">
                                                        <label for="useShipping{{ $shipping['id'] }}"> Use This Shipping
                                                            Address </label>
                                                    </div>
                                                    <p>{{ $shipping['address'] }},{{ $shipping['kab'] }},{{ $shipping['kec'] }},{{ $shipping['kel'] }}
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <!-- ESTIMATE SHIPPING & TAX -->
                                <div class="col-sm-12">
                                    <!-- SHIPPING info -->
                                    <h6 class=" margin-top-50">Add Shipping List</h6>
                                    <form action="{{ route('shipping.add') }}" method="POST">
                                        @csrf
                                        <ul class="row">
                                            <li class="col-md-6">
                                                <label> Shipping Name
                                                    <input type="text" name="shippingName" placeholder="">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label> *FIRST NAME
                                                    <input type="text" name="fname" placeholder="">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label> *LAST NAME
                                                    <input type="text" name="lname" placeholder="">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>*ADDRESS
                                                    <input type="text" name="address" placeholder="">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>*Kabupaten
                                                    <input type="text" name="kab" placeholder="">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>*Kecamatan
                                                    <input type="text" name="kec" placeholder="">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>Kelurahan
                                                    <input type="text" name="kel" placeholder="">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label> *PHONE
                                                    <input type="text" name="phone" placeholder="">
                                                </label>
                                            </li>
                                        </ul>
                                        <li class="col-md-6">
                                            <button type="submit" class="btn">SUBMIT</button>
                                        </li>
                                    </form>
                                </div>
                            </div>


                            <!-- SUB TOTAL -->
                            <div class="col-sm-5">
                                <h6>YOUR ORDER</h6>
                                <div class="order-place">
                                    <form action="{{ route('checkout.proses') }}" method="POST">
                                        @csrf
                                        <div class="order-detail">

                                            <?php $totalCost = 0 ?>
                                            @foreach ($itemCart as $itemCart)
                                            <p>{{ $itemCart['charthasitem']['nameItem'] }}
                                                <span>{{ number_format($itemCart['charthasitem']['priceItem']*$itemCart['qty_item'],0,',','.')}}
                                                    IDR</span></p>
                                            <?php $totalCost += $itemCart['charthasitem']['priceItem']*$itemCart['qty_item'] ?>
                                            <input type="hidden" id="itemchart[]" name="itemchart[]"
                                                value="{{ $itemCart['id'] }}">
                                            @endforeach
                                            <p id="feeTransport"><b>Fee Transport</b><span>20.000 IDR*
                                                    {{ $countseller }}</span></p>
                                            <!-- SUB TOTAL -->
                                            <p class="all-total">TOTAL COST <span> <?php
                                                echo number_format((20000*$countseller)+$totalCost,0,',','.')
                                                ?>_IDR</span>
                                            </p>
                                            <input type="hidden" value="{{ (20000*$countseller)+$totalCost }}"
                                                name="amountPay" id="amountPay">
                                        </div>
                                        <input type="hidden" id="idShipping" name="idShipping">
                                        <div class="pay-meth">
                                            <ul>
                                                <li>
                                                    <div class="radio">
                                                        <input type="radio" name="paymentMethod" id="paymentMethod"
                                                            value="{{ $bankMarket['id'] }}" checked>
                                                        <label for="radio1"> DIRECT BANK TRANSFER </label>
                                                    </div>
                                                    <p style="color: black;" class="alert alert-danger">BANK
                                                        {{ $bankMarket['nameBank'] }}
                                                        <b>(REKBER)</b> :
                                                        {{ $bankMarket['numberBank'] }} An:
                                                        {{ $bankMarket['accountBank'] }}</p>
                                                    <p>Pembayaran Dengan Cara Ini, Adalah Paling Aman Anda Pembeli Dan
                                                        Penjual Bisa Melakukan Kesepakatan Sebelum Ketemuan Untuk Cek
                                                        Fisik Item/Barang Yang Anda Beli</p>
                                                </li>
                                                <li>
                                                    <div class="radio">
                                                        <input type="radio" name="paymentMethod" id="paymentMethod"
                                                            value="2">
                                                        <label for="radio2"> CASH ON DELIVERY</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input id="TnC" name="TnC" class="styled" type="checkbox">
                                                        <label for="checkbox3-4"> I’VE READ AND ACCEPT THE <span
                                                                class="color"> TERMS & CONDITIONS </span> </label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button class="btn  btn-dark pull-right margin-top-30">PLACE ORDER</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        function chooseShipping(idShipping){
            //alert(idShipping)
            document.getElementById('idShipping').value = idShipping;
        }
    </script>
    @endsection