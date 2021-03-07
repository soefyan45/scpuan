@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="chart-page padding-top-100 padding-bottom-100">
            <div class="container">

                <!-- Payments Steps -->
                <div class="shopping-cart">

                    <!-- SHOPPING INFORMATION -->
                    <div class="cart-ship-info">
                        <div class="row">

                            <!-- ESTIMATE SHIPPING & TAX -->
                            <div class="col-sm-7">
                                <h6>LOGIN YOUR ACCOUNT</h6>
                                <form method="POST" action="{{ route('login') }}">
                                    <ul class="row">
                                        @csrf

                                        <!-- Name -->
                                        <li class="col-md-12">
                                            <label> EMAIL
                                                <input id="email" type="email"
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    name="email" value="{{ old('email') }}" required autofocus>
                                            </label>
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </li>
                                        <!-- LAST NAME -->
                                        <li class="col-md-12">
                                            <label> PASSWORD
                                                <input id="password" type="password"
                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    name="password" required>
                                            </label>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </li>

                                        <!-- LOGIN -->
                                        <li class="col-md-4">
                                            <button type="submit" class="btn">
                                                {{ __('Login') }}
                                            </button>
                                        </li>

                                        <!-- CREATE AN ACCOUNT -->

                                        <!-- FORGET PASS -->
                                        <li class="col-md-4">
                                            <div class="checkbox margin-0 margin-top-20 text-right">
                                                <a href="register">Forget Password</a>
                                            </div>
                                        </li>
                                    </ul>
                                </form>

                            </div>

                            <!-- SUB TOTAL -->
                            <div class="col-sm-5">
                                <h6>Dont Have Account</h6>
                                <ul class="login-with">
                                    <li>
                                        <a href="register"><i class="fa fa-user"></i>Register</a>
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