@extends('layouts.marketApp')
@section('_contentMp')
<!-- Wrap -->
<div id="wrap">
    <!-- header -->
    @include('layouts.headerNav')
    <div id="content">

        <!-- History -->
        <section class="history-block padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <div class="contact-form">
                        <h5>Please insert your valid data</h5>
                        <div class="row">
                            <!--======= ADDRESS INFO  =========-->
                            <div class="col-md-4">
                                <div class="contact-info">
                                    <h6><b>Your Profile</b></h6>
                                    @if ($User['userhasprofile']==null)
                                    <p>Please Insert Your Valid Data On Right Side !!!</p>
                                    @endif
                                    @if ($User['userhasprofile']!=null)
                                    <ul>
                                        <li> <i class="icon-map-pin"></i>{{ $User['userhasprofile']['address'] }}<br>
                                            {{ $User['userhasprofile']['address1'] }}.</li>
                                        <li> <i class="icon-envelope"></i> <a href="mailto:{{ $User['email'] }}"
                                                target="_top">{{ $User['email'] }}</a> </li>
                                        <li>
                                            <i class="icon-city"></i>{{ $User['userhasprofile']['prov'] }},
                                            <i class="icon-city"></i>{{ $User['userhasprofile']['kota'] }},
                                            <i class="icon-city"></i>{{ $User['userhasprofile']['kec'] }},
                                            <i class="icon-city"></i>{{ $User['userhasprofile']['desa'] }}
                                        </li>
                                        <li>
                                            <button class="btn" data-toggle="modal"
                                                data-target="#reqProfileSeller">Become Seller</button>
                                        </li>
                                    </ul>
                                    @endif
                                    <ul>
                                        <button class="btn" data-toggle="modal" data-target="#changePassword">Change
                                            Password</button>
                                    </ul>


                                </div>
                            </div>
                            <div class="col-md-8">

                                <!--======= Success Msg =========-->
                                <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank
                                    You. Your Message has been Submitted</div>
                                <!--======= FORM  =========-->
                                <form action="{{ route('post.account.info') }}" id="contact_form" class="contact-form"
                                    method="POST">
                                    @csrf
                                    <ul class="row">
                                        <li class="col-sm-6">
                                            <label>Name *
                                                <input type="text" class="form-control" name="name" id="name" required
                                                    placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>Address *
                                                <input type="text" class="form-control" name="address" id="address"
                                                    required placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>Address1 *
                                                <input type="text" class="form-control" name="address1" id="address1"
                                                    required placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>Prov *
                                                <input type="text" class="form-control" name="prov" id="prov" required
                                                    placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>City *
                                                <input type="text" class="form-control" name="kota" id="kota" required
                                                    placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>Kec *
                                                <input class="form-control" name="kec" id="kec" rows="5" required
                                                    placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>Desa *
                                                <input class="form-control" name="desa" id="desa" rows="5" required
                                                    placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-sm-6">
                                            <label>Posta Code *
                                                <input class="form-control" name="postal" id="postal" rows="5" required
                                                    placeholder="">
                                        </li>
                                        <li class="col-sm-6">
                                            <button type="submit" class="btn" id="btn_submit">Sumbit</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Shipping List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Irwansyah Saputra</td>
                                                <td>2017-01-09</td>
                                                <td>
                                                    <div class="badge badge-success">Active</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Hasan Basri</td>
                                                <td>2017-01-09</td>
                                                <td>
                                                    <div class="badge badge-success">Active</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Kusnadi</td>
                                                <td>2017-01-11</td>
                                                <td>
                                                    <div class="badge badge-danger">Not Active</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Rizal Fakhri</td>
                                                <td>2017-01-11</td>
                                                <td>
                                                    <div class="badge badge-success">Active</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="news-letter padding-top-150 padding-bottom-150">
            <div class="container">
                <div class="heading light-head text-center margin-bottom-30">
                    <h4>NEWSLETTER</h4>
                    <span>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu
                        posuere odi </span>
                </div>
                <form>
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit">SEND ME</button>
                </form>
            </div>
        </section>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="reqProfileSeller">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Request Profile As Seller !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Request Profile As Seller, You Can Sell Your Handycrafts Or Your Product To Get Profit</p>
                    <form action="{{ route('account.become.seller') }}" method="post">
                        @csrf
                        <button id="submitCategory" type="submit" class="mt-1 btn btn-info rounded">Confirm</button>
                    </form>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
    @endsection