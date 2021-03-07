@extends('Back.AppBackend')
@section('title','Admin Marketplace')
@section('siteName','Marketplace')
@section('_containerOfContents')
<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>{{ $Shop['nameShop'] }}</h1> <b>Result</b>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-barcode"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Item</h4>
                        </div>
                        <div class="card-body">
                            {{ count($Shop['hasitem']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-hdd"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Item Sold</h4>
                        </div>
                        <div class="card-body">
                            @php
                            $itemSold = 0;
                            @endphp
                            @foreach ($Shop['haslogseller'] as $shop)
                            @if ($shop['status_order']==3)
                            @php
                            $itemSold +=$shop['qty_itemcart']
                            @endphp
                            @endif
                            @endforeach
                            <?= $itemSold ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Active Balance</h4>
                        </div>
                        <div class="card-body">
                            {{ number_format($Shop['hasbalance']['balanceAmount'],0,',','.') }} IDR
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total WD</h4>
                        </div>
                        <div class="card-body">
                            @php
                            $totalWD = 0;
                            @endphp
                            @foreach ($Shop['haslogbalance'] as $shop)
                            @if ($shop['debit']==1)
                            @php
                            $totalWD +=$shop['amount']
                            @endphp
                            @endif
                            @endforeach
                            <?= number_format($totalWD,0,',','.') ?> IDR
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>List Items</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price/Item</th>
                                        <th>QTY</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($Shop['hasitem'] as $index => $item)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $item['nameItem'] }}</td>
                                        <td>{{ $item['priceItem'] }}</td>
                                        <td>{{ $item['qtyItem'] }}</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td><a href="#" class="btn btn-info">Detail</a></td>
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
            <div class="col-12 col-md-6 col-lg-6">
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
                                        <th>Amount</th>
                                        <th>Type Logs</th>
                                    </tr>
                                    @foreach ($Shop['haslogbalance'] as $index => $logBalance)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>{{ $logBalance['amount'] }}</td>
                                        <td>
                                            @if ($logBalance['debit']==1)
                                            <button class="btn btn-warning btn-small">Debit</button>
                                            @endif
                                            @if ($logBalance['kredit']==1)
                                            <button class="btn btn-success btn-small">Kredit</button>
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