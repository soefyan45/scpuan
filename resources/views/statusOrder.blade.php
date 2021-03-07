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
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">Status Order.</p>
                    <b>Shipping To: </b>{{ $TrxOrder[0]['shippingid']['nameShipping'] }}
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
                                    <th class="text-right">Status Order</th>
                                </tr>
                                <?php $total = 0; ?>
                                @php
                                $countShop = 0;
                                $dataShop = '';
                                @endphp
                                @foreach ($TrxOrder[0]['trxorder'] as $index => $trxOrder)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $trxOrder['logorderhasitem']['nameItem'] }}</td>
                                    <td class="text-center">
                                        {{ number_format($trxOrder['price_order'],0,',','.') }}<small>IDR</small>
                                    </td>
                                    <td class="text-center">
                                        {{ $trxOrder['logorderhasitem']['shopofitem']['nameShop'] }}
                                    </td>
                                    <td class="text-center">
                                        {{ $trxOrder['qty_itemcart'] }}
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($trxOrder['price_order']*$trxOrder['qty_itemcart'],0,',','.') }}<small>IDR</small>
                                    </td>
                                    @php
                                    $total += $trxOrder['price_order']*$trxOrder['qty_itemcart'];
                                    $countShop = $trxOrder->distinct('shop_seller_id')->count();
                                    @endphp
                                    <td class="text-right">
                                        @if ($trxOrder['status_order']==0)
                                        <button class="btn btn-success btn-small"
                                            style="background-color: rgb(245, 67, 82);">Waithing Proses</button>
                                        @endif
                                        @if ($trxOrder['status_order']==1)
                                        <button class="btn btn-success btn-small"
                                            style="background-color: rgb(243, 182, 125);">Confirm Proses</button>
                                        @endif
                                        @if ($trxOrder['status_order']==2)
                                        <button class="btn btn-success btn-small" data-toggle='modal'
                                            data-target='#confirmAcceptOrder'
                                            onclick="acceptItemOrder('{{ $trxOrder['id'] }}')"
                                            style="background-color: rgb(125, 147, 243);">Proses</button>
                                        @endif
                                        @if ($trxOrder['status_order']==3)
                                        <button class="btn btn-success btn-small"
                                            style="background-color: rgb(125, 243, 204);">Done</button>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">
                            <div class="section-title">Check Status Your Order</div>
                            <p class="section-lead">You Can Check Your Order By Periode.</p>
                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Subtotal</div>
                                <div class="invoice-detail-value">
                                    {{ number_format($total,0,',','.') }}<small>IDR</small>
                                </div>
                            </div>
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Shipping</div>
                                <div class="invoice-detail-value">
                                    20.000<small>IDR*{{ $countShop }}</small>
                                </div>
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">
                                    76.980<small>IDR</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="confirmAcceptOrder">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Confirm Accept Item Order !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Make Sure You Has Accept This Item From Order </p>
                    <form action="{{ route('order.select.accept.item') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="display: none;">
                            <label>id</label>
                            <input type="text" id="idOrderAccept" name="idOrderAccept" class="form-control">
                        </div><br>
                        <button id="submitCategory" type="submit" class="btn btn-sm">Confirm</button>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-sm" data-dismiss="modal" width='25px;'
                        style="background-color: rgb(231, 69, 69)">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function acceptItemOrder(id){
            document.getElementById('idOrderAccept').value = id;
        }
    </script>
    @endsection