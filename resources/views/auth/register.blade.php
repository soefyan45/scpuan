@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="chart-page padding-top-30 padding-bottom-40">
            <div class="container">

                <!-- Payments Steps -->
                <div class="shopping-cart">
                    <!-- SHOPPING INFORMATION -->
                    <div class="cart-ship-info">
                        <div class="row">
                            <!-- ESTIMATE SHIPPING & TAX -->
                            <div class="col-sm-8">
                                <h6>REGISTER ACCOUNT</h6>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-12 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-12">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <h6>Have Account</h6>
                                <ul class="login-with">
                                    <li>
                                        <a href="login"><i class="fa fa-user"></i>Login</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- About -->
        @include('layouts.about')
    </div>
    @endsection