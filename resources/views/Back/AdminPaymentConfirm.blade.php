@extends('Back.AppBackend')
@section('title','Admin Marketplace')
@section('siteName','Marketplace')
@section('_containerOfContents')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                @include('Back.Partial.Alert')
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>List Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Shipping to</th>
                                        <th>Payment Method</th>
                                        <th>Status Payment</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($Trx as $index => $trx)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $trx['trxuser']['name'] }}</td>
                                        <td>{{ $trx['shippingid']['nameShipping'] }}</td>
                                        <td>{{ $trx['paymentmethod']['nameBank'] }}</td>
                                        <td>
                                            @if ($trx['statusPaidOff']==0)
                                            <button class="btn btn-sm btn-danger">UnPaid</button>
                                            @else
                                            <button class="btn btn-sm btn-success">Paid</button>
                                            @endif
                                        </td>
                                        <td><button class="btn btn-info" data-toggle="modal"
                                                data-target="#confirmPayment"
                                                onclick="confirmPay('{{ $trx['id'] }}','{{ $trx['paymentmethod']['nameBank'] }}','{{ $trx['amountPay'] }}')">Action</button>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="confirmPayment">
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
                    <form id="form-action-dell" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="display: none;">
                            <label>id Payment</label>
                            <input type="text" id="idPayment" name="idPayment" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Payment Method</label>
                            <input type="text" id="methodPayment" name="methodPayment" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" id="amountPayment" name="amountPayment" class="form-control" readonly>
                        </div>
                        <p class="alert alert-danger">Make sure before you confirm this payment !!! check your
                            transaction history </p>

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
    function confirmPay(idPayment,method,amount){
        document.getElementById('idPayment').value      = idPayment;
        document.getElementById('methodPayment').value  = method;
        document.getElementById('amountPayment').value  = amount;
    }
</script>

@endsection