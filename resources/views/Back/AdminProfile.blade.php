@extends('Back.AppBackend')
@section('title','Admin Marketplace')
@section('siteName','Marketplace')
@section('_containerOfContents')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('Back.Partial.Alert')
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title text-capitalize">Hi, {{ $User['userhasprofile']['nameUser'] }} !!!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <button class="btn btn-info btn-sm" data-toggle='modal'
                                        data-target='#changePassword'>Change Password</button>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name text-capitalize">{{ $User['userhasprofile']['nameUser'] }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="text-capitalize">{{ Auth::user()['name'] }}</div>
                                </div>
                            </div>
                            {{ $User['userhasprofile']['nameUser'] }} is a superuser name in <b>Aplication
                                MPMelayu/MarkerPlace Melayu</b>.
                        </div>
                        <div class="card-footer text-center" style="display: none;">
                            <div class="font-weight-bold mb-2">Follow Ujang On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="{{ route('admin.post.profile') }}" method="post" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name Profile</label>
                                        <input type="text" class="form-control" id="nameProfile" name="nameProfile"
                                            value="{{ $User['userhasprofile']['nameUser'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the Name Profle
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $User['email'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>
                                            Address
                                        </label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $User['userhasprofile']['address'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the address
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>
                                            Address1
                                        </label>
                                        <input type="text" class="form-control" id="address1" name="address1"
                                            value="{{ $User['userhasprofile']['address1'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the detail address1
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>
                                            Prov
                                        </label>
                                        <input type="text" class="form-control" id="prov" name="prov"
                                            value="{{ $User['userhasprofile']['prov'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the detail prov
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>
                                            Kota
                                        </label>
                                        <input type="text" class="form-control" id="kota" name="kota"
                                            value="{{ $User['userhasprofile']['kota'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the detail kota
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>
                                            Kec
                                        </label>
                                        <input type="text" class="form-control" id="kec" name="kec"
                                            value="{{ $User['userhasprofile']['kec'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the detail kec
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>
                                            Desa
                                        </label>
                                        <input type="text" class="form-control" id="desa" name="desa"
                                            value="{{ $User['userhasprofile']['desa'] }}" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the detail address
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>
                                            Desa
                                        </label>
                                        <input type="text" class="form-control" value="ujang@maman.com" required="">
                                        <div class="invalid-feedback">
                                            Please fill in the detail address
                                        </div>
                                    </div>
                                </div>
                                {{--
                                    <div class="row">
                                    <div class="form-group mb-0 col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                id="newsletter">
                                            <label class="custom-control-label" for="newsletter">Subscribe to
                                                newsletter</label>
                                            <div class="text-muted form-text">
                                                You will get new information about products, offers and promotions
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                --}}
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="changePassword">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Change Your Password</p>
                    <form action="{{ route('account.change.password') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" id="oldPassword" name="oldPassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="newPassword" name="newPassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
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

@endsection