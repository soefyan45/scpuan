@extends('Back.AppBackend')
@section('title','Seller Marketplace')
@section('siteName','Seller')
@section('_containerOfContents')
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                @include('Back.Partial.Alert')
            </div>
            <div class="col-12">
                <div class="hero text-white hero-bg-image hero-bg-parallax"
                    style="background-image: url('{{ asset('assets/img/marketplace.jpg') }}');">
                    <div class="hero-inner">
                        <h2>Welcome, {{ Auth::user()['name'] }}</h2>
                        @if ($ShopSeller==null)
                        <p class="lead">You Don't Have a Shop !</p>
                        <div class="mt-4">
                            <button class="btn btn-outline-white btn-lg btn-icon icon-left" style="color: black;"
                                data-toggle="modal" data-target="#settupShop"><i class="fa fa-shopping-basket"></i>
                                Setup Your Shop
                                !!!</button>
                        </div>
                        @else
                        @if ($ShopSeller['verified']==0)
                        <div class="mt-4">
                            <button class="btn btn-warning btn-lg btn-icon icon-left" style="color: black;"
                                data-toggle="modal" data-target="#prosesVerifi"><i class="fa fa-shopping-basket"></i>
                                waiting for validation !!!</button>
                        </div>
                        @endif
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-12" @if ($ShopSeller!=null) @else style="display: none" @endif>
                <div class="card">
                    <div class="card-header">
                        <h4>Shop</h4>
                    </div>
                    <div class="card-body author-box card-primary">
                        <div class="author-box-left">
                            <img alt="image" src="{{ asset('assets/images/logo.png') }}"
                                class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                            {{--
                            <a href="#" class="btn btn-primary mt-3 follow-btn"
                                data-follow-action="alert('follow clicked');"
                                data-unfollow-action="alert('unfollow clicked');">Follow
                            </a>
                            --}}

                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">{{ $ShopSeller['nameShop'] }}</a>
                            </div>
                            <div class="author-box-job">Shop</div>
                            <div class="author-box-description">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Shop Name</th>
                                            <th scope="col">Bank | Rekening</th>
                                            <th scope="col">Handphone</th>
                                            <th scope="col">Total Item</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ $ShopSeller['nameShop'] }}</th>
                                            <td>{{ $ShopSeller['bank'] }}|{{ $ShopSeller['nomorRekening'] }}</td>
                                            <td>{{ $ShopSeller['handPhone'] }}</td>
                                            <td>{{ $Item }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-toggle="modal"
                                                    data-target="#detailShop">Detail</button>
                                                <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editShop">Edit</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="w-100 d-sm-none"></div>
                            <div class="float-right mt-sm-0 mt-3">
                                <button class="btn btn-sm btn-success">View Shop</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="settupShop">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Settup Your Shop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 style="color: brown;">Settup Your Detail Shop !!!</h5>
                    <form action="{{ route('seller.shop.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="shopName">Shop Name</label>
                            <input type="text" required
                                class="form-control {{ $errors->has('shopName') ? ' is-invalid' : '' }}" id="shopName"
                                name="shopName" placeholder="Name Of Shop">
                            @if ($errors->has('shopName'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('shopName') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="bank">Bank</label>
                                <select class="form-control {{ $errors->has('bank') ? ' is-invalid' : '' }}" id="bank"
                                    name="bank" placeholder="Bank">
                                    <option value="bca">BCA</option>
                                    <option value="bni">BNI</option>
                                    <option value="bri">BRI</option>
                                    <option value="mandiri">Mandiri</option>
                                </select>
                                @if ($errors->has('bank'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bank') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-8">
                                <label for="rekening">Rekening</label>
                                <input type="text" required
                                    class="form-control {{ $errors->has('rekening') ? ' is-invalid' : '' }}"
                                    id="rekening" name="rekening" placeholder="rekening">
                                @if ($errors->has('rekening'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('rekening') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address1">Address 1</label>
                            <input type="text" required
                                class="form-control {{ $errors->has('address1') ? ' is-invalid' : '' }}" id="address1"
                                name="address1" placeholder="Address 1">
                            @if ($errors->has('address1'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address1') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" required
                                class="form-control {{ $errors->has('address2') ? ' is-invalid' : '' }}" id="address2"
                                name="address2" placeholder="Address 1">
                            @if ($errors->has('address2'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address2') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="handphone">Handphone</label>
                                <input type="text" required
                                    class="form-control {{ $errors->has('handphone') ? ' is-invalid' : '' }}"
                                    id="handphone" name="handphone" placeholder="Handphone">
                                @if ($errors->has('handphone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('handphone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" required
                                    class="form-control {{ $errors->has('kabupaten') ? ' is-invalid' : '' }}"
                                    id="kabupaten" name="kabupaten" placeholder="Kabupaten">
                                @if ($errors->has('kabupaten'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kabupaten') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" required
                                    class="form-control {{ $errors->has('kecamatan') ? ' is-invalid' : '' }}"
                                    id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                                @if ($errors->has('kecamatan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kecamatan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="keluarahan">Keluarahan</label>
                                <input type="text" required
                                    class="form-control {{ $errors->has('keluarahan') ? ' is-invalid' : '' }}"
                                    id="keluarahan" name="keluarahan" placeholder="Kelurahan">
                                @if ($errors->has('keluarahan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('keluarahan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <button id="submitCategory" type="submit" class="btn btn-primary rounded">Create</button>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="editShop">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Settup Your Shop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 style="color: brown;">Settup Your Detail Shop !!!</h5>
                    <form action="{{ route('seller.shop.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="shopName">Shop Name</label>
                            <input type="text" required
                                class="form-control {{ $errors->has('shopName') ? ' is-invalid' : '' }}" id="shopName"
                                name="shopName" placeholder="Name Of Shop" value="{{ $ShopSeller['nameShop'] }}">
                            @if ($errors->has('shopName'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('shopName') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="bank">Bank</label>
                                <select class="form-control {{ $errors->has('bank') ? ' is-invalid' : '' }}" id="bank"
                                    name="bank" placeholder="Bank">
                                    <option @if ($ShopSeller['bank']=='bca' ) selected @endif value="bca">
                                        BCA</option>
                                    <option @if ($ShopSeller['bank']=='bni' ) selected @endif value="bni">
                                        BNI</option>
                                    <option @if ($ShopSeller['bank']=='bri' ) selected @endif value="bri">
                                        BRI</option>
                                    <option @if ($ShopSeller['bank']=='mandiri' ) selected @endif value="mandiri">
                                        Mandiri
                                    </option>
                                </select>
                                @if ($errors->has('bank'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bank') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-8">
                                <label for="rekening">Rekening</label>
                                <input type="text" required value="{{ $ShopSeller['nomorRekening'] }}"
                                    class="form-control {{ $errors->has('rekening') ? ' is-invalid' : '' }}"
                                    id="rekening" name="rekening" placeholder="rekening">
                                @if ($errors->has('rekening'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('rekening') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address1">Address 1</label>
                            <input type="text" required value="{{ $ShopSeller['addressShop'] }}"
                                class="form-control {{ $errors->has('address1') ? ' is-invalid' : '' }}" id="address1"
                                name="address1" placeholder="Address 1">
                            @if ($errors->has('address1'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address1') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address2">Address 2</label>
                            <input type="text" required value="{{ $ShopSeller['addressShop1'] }}"
                                class="form-control {{ $errors->has('address2') ? ' is-invalid' : '' }}" id="address2"
                                name="address2" placeholder="Address 1">
                            @if ($errors->has('address2'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address2') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="handphone">Handphone</label>
                                <input type="text" required value="{{ $ShopSeller['handPhone'] }}"
                                    class="form-control {{ $errors->has('handphone') ? ' is-invalid' : '' }}"
                                    id="handphone" name="handphone" placeholder="Handphone">
                                @if ($errors->has('handphone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('handphone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" required value="{{ $ShopSeller['kabupatenShop'] }}"
                                    class="form-control {{ $errors->has('kabupaten') ? ' is-invalid' : '' }}"
                                    id="kabupaten" name="kabupaten" placeholder="Kabupaten">
                                @if ($errors->has('kabupaten'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kabupaten') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" required value="{{ $ShopSeller['kecamatanShop'] }}"
                                    class="form-control {{ $errors->has('kecamatan') ? ' is-invalid' : '' }}"
                                    id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                                @if ($errors->has('kecamatan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('kecamatan') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="keluarahan">Keluarahan</label>
                                <input type="text" required value="{{ $ShopSeller['kelurahanShop'] }}"
                                    class="form-control {{ $errors->has('keluarahan') ? ' is-invalid' : '' }}"
                                    id="keluarahan" name="keluarahan" placeholder="Kelurahan">
                                @if ($errors->has('keluarahan'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('keluarahan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <button id="submitCategory" type="submit" class="btn btn-primary rounded">Create</button>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="detailShop">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Detail Your Shop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Name Shop</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['nameShop'] }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['addressShop'] }}</td>
                                </tr>
                                <tr>
                                    <th>Address1</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['addressShop'] }}</td>
                                </tr>
                                <tr>
                                    <th>Handphone</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['handPhone'] }}</td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['kabupatenShop'] }}</td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['kecamatanShop'] }}</td>
                                </tr>
                                <tr>
                                    <th>Keluarahan</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['kelurahanShop'] }}</td>
                                </tr>
                                <tr>
                                    <th>Bank</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['bank'] }}</td>
                                </tr>
                                <tr>
                                    <th>Rekening</th>
                                    <th>:</th>
                                    <td>{{ $ShopSeller['nomorRekening'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="prosesVerifi">
        <div class="modal-dialog modal-lg" role="document">
            <div class="hero align-items-center bg-warning text-white">
                <div class="hero-inner text-center">
                    <h2>congratulations</h2>
                    <p class="lead">Your shop settup in proses verified.</p>
                    <div class="mt-4">
                    </div>
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
@endsection