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
            <div class="col-12 mb-4">
                <div class="hero align-items-center bg-success text-white">
                    <div class="hero-inner text-center">
                        <h2>{{ number_format($Balance['balanceAmount'],0,',','.') }} IDR</h2>
                        <p class="lead">Minimal Withdraw is 10.000 IDR, This balance will transfer to your Number BANK
                            [<b class="text-danger">{{ $Balance['shop']['nomorRekening'] }}</b>] <b
                                class="text-uppercase">{{ $Balance['shop']['bank'] }}</b>.</p>
                        <div class="mt-4">
                            <form action="{{ route('seller.balance.req.wd') }}" method="post">
                                @csrf
                                <input type="number" class="form-control" name="valueWD" id="valueWD"
                                    placeholder="set value you want withdraw">
                                <button type="submit"
                                    class="btn btn-info btn-lg btn-icon icon-left mt-3 text-uppercase"><i
                                        class="fas fa-money-check "></i>withdraw
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Simple Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach ($LogWD as $index => $logWd)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ number_format($logWd['wdAmount'],0,',','.') }} IDR</td>
                                        <td>
                                            {{ $logWd['created_at'] }}
                                        </td>
                                        <td>
                                            @if ($logWd['statusWD']==0)
                                            <button class="btn btn-danger text-uppercase">Waiting Confirm</button>
                                            @endif
                                            @if ($logWd['statusWD']==1)
                                            <button class="btn btn-warning text-uppercase">Confirm</button>
                                            @endif
                                            @if ($logWd['statusWD']==2)
                                            <button class="btn btn-success text-uppercase">Done Proses</button>
                                            @endif
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1 <span
                                            class="sr-only">(current)</span></a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

@endsection