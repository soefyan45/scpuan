@extends('Back.AppBackend')
@section('title','Admin Marketplace')
@section('siteName','Marketplace')
@section('_containerOfContents')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                @include('Back.Partial.Alert')
                @if($Log[0]['status_order']==2)
                <div class="alert alert-warning">
                    You Must Proses This Order In 3day's
                </div>
                @endif
                @if($Log[0]['status_order']==3)
                <div class="alert alert-info">
                    This List Order Has Done !!!
                </div>
                @endif
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Order {{ $Log[0]['trx']['shippingid']['nameShipping'] }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('assets/images/done.png') }}" style="width: 170px; heidht:200px;"
                                    alt="Paid">
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Shipping To:</strong><br>
                                    {{ $Log[0]['trx']['shippingid']['nameShipping'] }}<br>
                                    {{ $Log[0]['trx']['shippingid']['address'] }},
                                    {{ $Log[0]['trx']['shippingid']['kel'] }}<br>
                                    {{ $Log[0]['trx']['shippingid']['kec'] }}<br>
                                    {{ $Log[0]['trx']['shippingid']['kab'] }},Riau,
                                    Indonesia<br>
                                    Phone : {{ $Log[0]['trx']['shippingid']['phone'] }}

                                </address>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tbody>
                                    <tr style="background-color: aquamarine;">
                                        <th>#</th>
                                        <th>Item Name</th>
                                        <th>Shipping to</th>
                                        <th>Qty Order</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                    <?php $total = 0 ?>
                                    @foreach ($Log as $index => $orderLog)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $orderLog['logorderhasitem']['nameItem'] }}</td>
                                        <td>{{ $orderLog['trx']['shippingid']['nameShipping'] }}</td>
                                        <td>{{ $orderLog['qty_itemcart'] }}</td>
                                        <td class="text-right">
                                            <b>{{ number_format($orderLog['price_order'],0,',','.') }}</b><small>
                                                IDR</small>
                                        </td>
                                        <td class="text-right">
                                            <b>{{ number_format($orderLog['price_order']*$orderLog['qty_itemcart'],0,',','.') }}</b><small>
                                                IDR</small>
                                        </td>
                                        <input type="hidden" id="nameItem[]"
                                            value="{{ $orderLog['logorderhasitem']['nameItem'] }}">
                                        <?php $total += $orderLog['price_order']*$orderLog['qty_itemcart'] ?>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-center" colspan="5" style="background-color:#c0cec6;">
                                            <b> Fee Transport</b>
                                        </td>
                                        <td class="text-right" style="background-color:#96b6a4;">
                                            <b> 20.000 </b>IDR
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center text-white" colspan="5"
                                            style="background-color:#e97391;">
                                            <b> Total </b>
                                        </td>
                                        <td class="text-right text-white" style="background-color:#ca3258;">
                                            <b>{{ number_format($total+20000,0,',','.') }} </b>IDR
                                        </td>
                                    </tr>
                                </tbody>

                            </table>


                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="section-title">Info Order</div>
                                <p class="section-lead">This Order Can Proses If Status Payment Is Paid.</p>
                                <div class="images">
                                    @if ($Log[0]['trx']['statusPaidOff']==0)
                                    <img src="{{ asset('assets/images/unpaid-logo.png') }}"
                                        style="width: 85px; heidht:100px;" alt="UnPaid">
                                    @else
                                    <img src="{{ asset('assets/images/paid-logo.png') }}"
                                        style="width: 85px; heidht:100px;" alt="Paid">
                                    @endif

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button data-toggle='modal' data-target='#confirmProsesOrder'
                                    class="btn btn-info float-right mt-5"
                                    onclick="confirmProses('{{ $Log[0]['trx_log_id']}}','{{ $Log[0]['trx']['shippingid']['nameShipping'] }}','{{ $Log[0]['trx']['shippingid']['fname'] }}','{{ $Log[0]['trx']['shippingid']['lname'] }}','{{ $Log[0]['trx']['shippingid']['address'] }}','{{ $Log[0]['trx']['shippingid']['kab'] }}','{{ $Log[0]['trx']['shippingid']['kec'] }}','{{ $Log[0]['trx']['shippingid']['kel'] }}','{{ $Log[0]['trx']['shippingid']['phone'] }}')">Confirm
                                    Proses
                                </button>
                                <button data-toggle='modal' data-target='#claimBalance'
                                    class="btn btn-success float-right mt-5 mr-2"
                                    onclick="claimBalanace('{{ $Log[0]['trx_log_id']}}')">
                                    Claim Balance
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="confirmProsesOrder">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Confirm Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="WarningDelete"></p>
                    <form action="{{ route('seller.select.post.order') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="display: none;">
                            <label>id Payment</label>
                            <input type="text" id="idOrder" name="idOrder" class="form-control">
                        </div><br>
                        Shipping to : <b id="nameShipp"></b>
                        <b>Detail Shipping</b><br>
                        <table style="width:100%; border:1px solid black">
                            <tr style="border:1px solid black">
                                <th>Name</th>
                                <td id="fullname"></td>
                            </tr>
                            <tr style="border:1px solid black">
                                <th>Address</th>
                                <td id="address"></td>
                            </tr>
                            <tr style="border:1px solid black">
                                <th>Kabupaten</th>
                                <td id="kab"></td>
                            </tr>
                            <tr style="border:1px solid black">
                                <th>Kecamatan</th>
                                <td id="kec"></td>
                            </tr>
                            <tr style="border:1px solid black">
                                <th>Kelurahan</th>
                                <td id="kel"></td>
                            </tr>
                            <tr style="border:1px solid black">
                                <th>Phone</th>
                                <td id="phone"></td>
                            </tr>
                        </table><br>
                        <button id="submitCategory" type="submit" class="mt-1 btn btn-info rounded">Confirm</button>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="claimBalance">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Claim Balance After Done This Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>You Only Can Claim Your Balance After Item Flag Done By Buyers !!!</p>
                    <form action="{{ route('seller.claim.balance') }}" method="post">
                        @csrf
                        <div class="form-group" style="display: none;">
                            <label>id Payment</label>
                            <input type="text" id="idOrderDone" name="idOrderDone" class="form-control">
                        </div>
                        <button id="submitCategory" type="submit" class="mt-1 btn btn-info rounded">Confirm</button>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- General JS Scripts -->
<script src="{{asset('/assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('/assets/modules/popper.js')}}"></script>
<script src="{{asset('/assets/modules/tooltip.js')}}"></script>
<script src="{{asset('/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('/assets/js/stisla.js')}}"></script>
<script src="{{asset('/assets/js/autoNumeric.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
<script src="{{asset('/assets/modules/chart.min.js')}}"></script>
<script src="{{asset('/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('/assets/js/scripts.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script type="text/javascript">
    function confirmProses(id,nameShipping,fname,lname,address,kab,kec,kel,phone){
        //var nameItem = document.getElementById('nameItem[]').value;
        //alert(nameItem)
        //console.log(id)
        document.getElementById('idOrder').value        = id;
        document.getElementById('nameShipp').innerHTML  = ': '+nameShipping;
        document.getElementById('fullname').innerHTML   = ': '+fname+" "+lname;
        document.getElementById('address').innerHTML    = ': '+address;
        document.getElementById('kab').innerHTML        = ': '+kab;
        document.getElementById('kec').innerHTML        = ': '+kec;
        document.getElementById('kel').innerHTML        = ': '+kel;
        document.getElementById('phone').innerHTML      = ': '+phone;
    }
    function claimBalanace(id){
        document.getElementById('idOrderDone').value        = id;
    }
</script>
@endsection