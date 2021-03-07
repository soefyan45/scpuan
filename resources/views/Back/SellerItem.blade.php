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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List Item</h4>
                        <div class="card-header-form">
                            <div class="flex" style="display: flex;">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <a href="{{ route('seller.Item.add') }}" class="btn btn-sm btn-info ml-2">Add Item</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Name Item</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Photo</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($Item as $item)
                                    <tr>
                                        <td>{{ $item['nameItem'] }}</td>
                                        <td>{{ $item['itemtypes']['nameItemType'] }}</td>
                                        <td>{{ $item['itemcategories']['nameCategory'] }}</td>
                                        <td>{{ $item['priceItem'] }}</td>
                                        <td>
                                            <div class="gallery d-inline-flex p-2">
                                                <div class="gallery-item gallery-more"
                                                    data-image="{{ $item['itemhasimages'][0]['imgItems'] }}"
                                                    data-title="Image 8" href="assets/img/avatar/avatar-1.png"
                                                    title="Image 8"
                                                    style="background-image: url(&quot;assets/img/news/img02.jpg&quot;);">
                                                    <div>+{{ count($item['itemhasimages']) }}</div>
                                                </div>

                                            </div>
                                        </td>
                                        <td>{{ $item['qtyItem'] }}</td>
                                        <td>
                                            <a href="{{ route('seller.Item.edit',$item['id']) }}"
                                                class="btn btn-warning">Edit</a>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#dellItemSale"
                                                onclick="dellThis('{{ $item['id'] }}');">Dell</button>
                                            <a href="#" class="btn btn-icon icon-left btn-info"><i
                                                    class="fas fa-eye"></i> See</a>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="dellItemSale">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labelEditCategory">Delete Item Sale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 style="color: brown;">Are you sure want delete this item</h5>
                    <form action="{{ route('seller.Item.dell') }}" method="post">
                        @csrf
                        <input id="idDellItem" name="idDellItem" class="form-control" hidden>
                        <button id="submitCategory" type="submit" class="btn btn-primary rounded">Yes i'am sure
                            !!!</button>
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
<script>
    function dellThis(idWantDell){
        //alert('hello')
        document.getElementById('idDellItem').value = idWantDell;
    }
</script>

@endsection