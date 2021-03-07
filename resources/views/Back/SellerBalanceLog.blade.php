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
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header text-uppercase">
                        <h4>Total Log balance</h4>
                        <div class="card-header-action">
                            {{--
                                <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">Filter</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i>
                                        Electronic</a>
                                    <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> T-shirt</a>
                                    <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i> Hat</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">View All</a>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="summary">
                            <div class="summary-info" style="background-color: rgb(162, 252, 162)">
                                @php
                                $totalBalanceLog = 0;
                                $totalWithdrawLog = 0;
                                @endphp
                                @foreach ($LogBalance as $logBalance)
                                @if ($logBalance['kredit']==1)
                                @php
                                $totalBalanceLog += $logBalance['amount']
                                @endphp
                                @endif
                                @if ($logBalance['debit']==1)
                                @php
                                $totalWithdrawLog += $logBalance['amount']
                                @endphp

                                @endif

                                @endforeach
                                <h4>{{ number_format($totalBalanceLog,0,',','.') }} IDR</h4>
                                <div class="text-muted">Total Log Balance</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Log Balance</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Created At</th>
                                    </tr>
                                    @foreach ($LogBalance as $index => $logBalance)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>
                                            @if ($logBalance['kredit']==1)
                                            <button class="btn btn-success text-uppercase">Kredit</button>
                                            @endif
                                            @if ($logBalance['debit']==1)
                                            <button class="btn btn-info text-uppercase">Debit</button>
                                            @endif
                                        </td>
                                        <td>{{ number_format($logBalance['amount'],0,',','.') }}</td>
                                        <td>
                                            {{ $logBalance['created_at'] }}
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