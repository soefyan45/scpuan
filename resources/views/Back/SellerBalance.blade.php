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
                        <h4>active balance</h4>
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
                                <h4>{{ number_format($Balance['balanceAmount'],0,',','.') }} IDR</h4>
                                <div class="text-muted">Sold 3 items on 2 customers</div>
                                <div class="d-block mt-2">
                                    <a href="{{ route('seller.balance.wd') }}"
                                        class="btn btn-info text-capitalize">WITHDRAW</a>
                                    <a href="{{ route('seller.balance.log') }}"
                                        class="btn btn-warning btn-icon icon-left text-uppercase">
                                        <i class="fas fa-money-check"></i>Log Balance
                                    </a>
                                </div>
                            </div>
                            <div class="summary-item">
                                <h6>Last Item Sold <span class="text-muted">(3 newest items)</span></h6>
                                <ul class="list-unstyled list-unstyled-border">
                                    @foreach ($LogSeller as $logSeller)
                                    <li class="media">
                                        <a href="#">
                                            <img class="mr-3 rounded" width="50"
                                                src="{{ asset($logSeller['logorderhasitem']['itemhasimages'][0]['imgItems']) }}"
                                                alt="product">
                                        </a>
                                        <div class="media-body">
                                            <div class="media-right">
                                                {{ number_format($logSeller['price_order'],0,',','.') }} IDR</div>
                                            <div class="media-title"><a
                                                    href="#">{{ $logSeller['logorderhasitem']['nameItem'] }}</a>
                                            </div>
                                            <div class="text-muted text-small">Order by <a
                                                    href="">{{ $logSeller['orderby']['name'] }}</a>
                                                <div class="bullet"></div>
                                                {{Carbon\Carbon::parse($logSeller['created_at'])->translatedFormat('D d F Y') }}
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{--
                    <div class="card">
                    <div class="card-header">
                        <h4 class="d-inline">Tasks</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cbx-1">
                                    <label class="custom-control-label" for="cbx-1"></label>
                                </div>
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-4.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                                    <h6 class="media-title"><a href="#">Redesign header</a></h6>
                                    <div class="text-small text-muted">Alfa Zulkarnain <div class="bullet"></div> <span
                                            class="text-primary">Now</span></div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cbx-2" checked="">
                                    <label class="custom-control-label" for="cbx-2"></label>
                                </div>
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-5.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
                                    <h6 class="media-title"><a href="#">Add a new component</a></h6>
                                    <div class="text-small text-muted">Serj Tankian <div class="bullet"></div> 4 Min
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cbx-3">
                                    <label class="custom-control-label" for="cbx-3"></label>
                                </div>
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-2.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="badge badge-pill badge-warning mb-1 float-right">Progress</div>
                                    <h6 class="media-title"><a href="#">Fix modal window</a></h6>
                                    <div class="text-small text-muted">Ujang Maman <div class="bullet"></div> 8 Min
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cbx-4">
                                    <label class="custom-control-label" for="cbx-4"></label>
                                </div>
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
                                    <h6 class="media-title"><a href="#">Remove unwanted classes</a></h6>
                                    <div class="text-small text-muted">Farhan A Mujib <div class="bullet"></div> 21 Min
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                --}}
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