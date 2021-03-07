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
                                        <th>Shop Name</th>
                                        <th>Amount Withdraw</th>
                                        <th>Bank Account</th>
                                        <th>Account Number</th>
                                        <th>Request at</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($LogWD as $index => $logWD)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $logWD['users']['name'] }}</td>
                                        <td>{{ $logWD['hasshop']['nameShop'] }}</td>
                                        <td>{{ number_format($logWD['wdAmount'],0,',','.') }} IDR</td>
                                        <td>{{ $logWD['accountBank'] }}</td>
                                        <td>{{ $logWD['nameBank'] }}</td>
                                        <td>{{ $logWD['created_at'] }}</td>
                                        <td>
                                            @if ($logWD['statusWD']==0)
                                            <button class="btn btn-dark btn-small">Waiting Confirm</button>
                                            @endif
                                            @if ($logWD['statusWD']==1)
                                            <button class="btn btn-warning btn-small">Confirm</button>
                                            @endif
                                            @if ($logWD['statusWD']==2)
                                            <button class="btn btn-success btn-small">Done</button>
                                            @endif
                                        </td>
                                        <td><button class="btn btn-info btn-small" data-toggle="modal"
                                                data-target="#confirmWithdraw"
                                                onclick="confirmWd('{{ $logWD['id'] }}','{{ $logWD['nameBank'] }}','{{ $logWD['accountBank'] }}','{{ number_format($logWD['wdAmount'],0,',','.') }}')">Action</button>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="confirmWithdraw">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Confirm Withdraw</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="WarningDelete"></p>
                    <form id="form-action-dell" action="{{route('admin.proses.withdraw.post')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="display: none;">
                            <label>id Payment</label>
                            <input type="text" id="idWd" name="idWd" class="form-control">
                        </div>
                        <label>Bank</label>
                        <input type="text" id="bankwd" name="bankwd" class="form-control" readonly>
                        <label>Account Number</label>
                        <input type="text" id="accountNumber" name="accountNumber" class="form-control" readonly>
                        <label>Amount</label>
                        <input type="text" id="amountWd" name="amountWd" class="form-control mb-2" readonly>

                        <p class="alert alert-danger text-capitalize">
                            Make Sure To Confirm & Proses This Withdraw
                        </p>

                        <button id="submitCategory" type="submit" class="mt-1 btn btn-info rounded">Confirm & Flag As
                            Done</button>
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
    function confirmWd(idWD,bank,account,amount){
        //alert(amount);
        document.getElementById('idWd').value           = idWD;
        document.getElementById('bankwd').value         = bank;
        document.getElementById('accountNumber').value  = account;
        document.getElementById('amountWd').value       = amount;
    }
</script>

@endsection