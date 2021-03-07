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
                        <h4>List Shop</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>Shop Name</th>
                                        <th>Akun</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($ShopSeller as $shopSeller)
                                    <tr>
                                        <td>{{ $shopSeller['nameShop'] }}</td>
                                        <td>{{ $shopSeller['account']['name'] }}</td>
                                        <td>{{ $shopSeller['account']['email'] }}</td>
                                        <td>
                                            @if ($shopSeller['verified']==0)
                                            <div class="badge badge-danger">Not Yet Verified</div>
                                            @else
                                            <div class="badge badge-success">Verified</div>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-info" data-toggle="modal" data-target="#detailShop"
                                                onclick="actionShop('{{ $shopSeller['id'] }}',
                                                    '{{ $shopSeller['nameShop'] }}',
                                                    '{{ $shopSeller['addressShop'] }}',
                                                    '{{ $shopSeller['addressShop1'] }}',
                                                    '{{ $shopSeller['handPhone'] }}',
                                                    '{{ $shopSeller['kabupatenShop'] }}',
                                                    '{{ $shopSeller['kecamatanShop'] }}',
                                                    '{{ $shopSeller['kelurahanShop'] }}',
                                                    '{{ $shopSeller['bank'] }}',
                                                    '{{ $shopSeller['nomorRekening'] }}',
                                                    '{{ $shopSeller['verified'] }}',
                                                )">Detail</button>
                                            <a href="{{ route('admin.sellershop.result',$shopSeller['slugShop']) }}"
                                                class="btn btn-dark">Result</a>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="detailShop">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Verified This Shop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="WarningDelete"></p>
                    <div id="verified" style="display: none;">
                        <form id="form-action-dell" action="{{ route('admin.sellershop.verified') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="number" hidden id="idShop" name="idShop" class="form-control">
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="submit" class="btn btn-info">Verified</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Name Shop</th>
                                    <th>:</th>
                                    <td id="thisNameShop"></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <th>:</th>
                                    <td id="thisAddress"></td>
                                </tr>
                                <tr>
                                    <th>Address1</th>
                                    <th>:</th>
                                    <td id="thisAddress1"></td>
                                </tr>
                                <tr>
                                    <th>Handphone</th>
                                    <th>:</th>
                                    <td id="thisPhone"></td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <th>:</th>
                                    <td id="thisKabupaten"></td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>:</th>
                                    <td id="thisKecamatan"></td>
                                </tr>
                                <tr>
                                    <th>Keluarahan</th>
                                    <th>:</th>
                                    <td id="thisKelurahan"></td>
                                </tr>
                                <tr>
                                    <th>Bank</th>
                                    <th>:</th>
                                    <td id="thisBank"></td>
                                </tr>
                                <tr>
                                    <th>Rekening</th>
                                    <th>:</th>
                                    <td id="thisRekening"></td>
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
<script>
    function actionShop(id,shop,addressShop,addressShop1,handPhone,kabupatenShop,kecamatanShop,kelurahanShop,bank,rekening,verified) {
            //alert(statusCategory);
            //alert(id);
            if(verified==0){
                document.getElementById("verified").style.display = 'block';
            }
            document.getElementById("idShop").value   = id;
            document.getElementById("thisNameShop").innerHTML   = shop;
            document.getElementById("thisAddress").innerHTML    = addressShop;
            document.getElementById("thisAddress1").innerHTML   = addressShop1;
            document.getElementById("thisPhone").innerHTML      = handPhone;
            document.getElementById("thisKabupaten").innerHTML  = kabupatenShop;
            document.getElementById("thisKecamatan").innerHTML  = kecamatanShop;
            document.getElementById("thisKelurahan").innerHTML  = kelurahanShop;
            document.getElementById("thisBank").innerHTML       = bank;
            document.getElementById("thisRekening").innerHTML   = rekening;
        }
</script>

@endsection