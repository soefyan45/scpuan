@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="chart-page padding-bottom-50">
            <div class="container">
                <!-- Payments Steps -->
                <div class="shopping-cart">
                    <!-- SHOPPING INFORMATION -->
                    <div class="cart-ship-info">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="invoice">
                                    <div class="invoice-print">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="invoice-title">
                                                    <h2>Invoice</h2>
                                                    <div class="invoice-number">Order #{{ $TrxLog['id'] }}</div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <address>
                                                            <strong>Billed To:</strong><br>
                                                            {{ $itemCart[0]['charthasuser']['name'] }}<br>
                                                            {{ $itemCart[0]['charthasuser']['email'] }}
                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 text-md-right">
                                                        <address>
                                                            <strong>Shipped To:</strong><br>
                                                            {{ $itemCart[0]['cartpayout']['shippingid']['fname'] }}
                                                            {{ $itemCart[0]['cartpayout']['shippingid']['lname'] }}<br>
                                                            {{ $itemCart[0]['cartpayout']['shippingid']['address'] }}<br>
                                                            {{ $itemCart[0]['cartpayout']['shippingid']['kel'] }}
                                                            {{ $itemCart[0]['cartpayout']['shippingid']['kec'] }}<br>
                                                            {{ $itemCart[0]['cartpayout']['shippingid']['kab'] }},Riau,
                                                            Indonesia<br>
                                                            {{ $itemCart[0]['cartpayout']['shippingid']['phone'] }}

                                                        </address>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <address>
                                                            <strong>Payment Method:</strong><br>
                                                            {{ $itemCart[0]['cartpayout']['paymentmethod']['nameBank'] }}<br>
                                                            {{ $itemCart[0]['cartpayout']['paymentmethod']['accountBank'] }}<br>
                                                            {{ $itemCart[0]['cartpayout']['paymentmethod']['numberBank'] }}<br>
                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 text-md-right">
                                                        <address>
                                                            <strong>Order Date:</strong><br>
                                                            {{Carbon\Carbon::parse($TrxLog['created_at'])->translatedFormat('d F Y') }}
                                                            <br><br>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="section-title">Order Summary</div>
                                                <p class="section-lead">All items here cannot be deleted.</p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-md">
                                                        <tbody>

                                                            <tr>
                                                                <th data-width="40" style="width: 40px;">#</th>
                                                                <th>Item</th>
                                                                <th class="text-center">Price</th>
                                                                <th class="text-center">Shop Name</th>
                                                                <th class="text-center">Quantity</th>
                                                                <th class="text-right">Totals</th>
                                                            </tr>
                                                            <?php $totalCost = 0 ?>
                                                            @foreach ($itemCart as $index => $itemcart)
                                                            <tr>
                                                                <td>{{ $index++ }}</td>
                                                                <td>{{ $itemcart['charthasitem']['nameItem'] }}</td>
                                                                <td class="text-center">
                                                                    {{ number_format($itemcart['charthasitem']['priceItem'],0,',','.') }}<small>IDR</small>
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $itemcart['shopofitem']['nameShop'] }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $itemcart['qty_item'] }}
                                                                </td>
                                                                <td class="text-right">
                                                                    {{ number_format($itemcart['charthasitem']['priceItem']*$itemcart['qty_item'],0,',','.') }}<small>IDR</small>
                                                                </td>
                                                                <?php $totalCost = $totalCost+$itemcart['charthasitem']['priceItem']*$itemcart['qty_item'];?>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-8">
                                                        <div class="section-title">Payment Method</div>
                                                        <p class="section-lead">The payment method that we provide is to
                                                            make it easier for you to pay invoices.</p>
                                                        <div class="images">
                                                            <img src="{{ asset('assets/images/bni-logo.png') }}"
                                                                style="width: 85px;" alt="BNI">
                                                        </div>
                                                        @if ($TrxLog['statusPaidOff']==1)
                                                        <div class="images">
                                                            <img src="{{ asset('assets/images/paid-logo.png') }}"
                                                                style="width: 85px; heidht:100px;" alt="BNI">
                                                        </div>
                                                        @else
                                                        <div class="images">
                                                            <img src="{{ asset('assets/images/unpaid-logo.png') }}"
                                                                style="width: 85px; heidht:100px;" alt="BNI">
                                                        </div>
                                                        @endif

                                                    </div>
                                                    <div class="col-lg-4 text-right">
                                                        <div class="invoice-detail-item">
                                                            <div class="invoice-detail-name">Subtotal</div>
                                                            <div class="invoice-detail-value">
                                                                {{ number_format($totalCost,0,',','.') }}<small>IDR</small>
                                                            </div>
                                                        </div>
                                                        <div class="invoice-detail-item">
                                                            <div class="invoice-detail-name">Shipping</div>
                                                            <div class="invoice-detail-value">
                                                                {{ number_format(20000,0,',','.') }}<small>IDR*{{ $countseller }}</small>
                                                            </div>
                                                        </div>
                                                        <hr class="mt-2 mb-2">
                                                        <div class="invoice-detail-item">
                                                            <div class="invoice-detail-name">Total</div>
                                                            <div class="invoice-detail-value invoice-detail-value-lg">
                                                                {{ number_format($TrxLog['amountPay'],0,',','.') }}<small>IDR</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-md-right">
                                        <div class="float-lg-left mb-lg-0 mb-3">
                                            <button class="btn btn-primary btn-icon icon-left">
                                                Process Payment
                                            </button>
                                            <button class="btn btn-warning btn-icon icon-left">
                                                Print
                                            </button>
                                        </div>

                                    </div>
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