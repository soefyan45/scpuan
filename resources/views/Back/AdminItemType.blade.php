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
                <div class="col-md-4 col-xs-12 col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Create Type Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.itemtypes.store') }}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="categoryName">Type Item</label>
                                    <div class="input-group">
                                        @csrf
                                        <input id="typeItemName" name="typeItemName" type="text" class="form-control input-lg {{ $errors->has('typeItemName') ? ' is-invalid' : '' }}" placeholder="Jual" required>
                                        @if ($errors->has('typeItemName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('typeItemName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button id="submitCategory" class="btn btn-primary rounded">Sumbit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Category </h4><br>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ItemType as $index => $itemType)
                                    <tr>
                                        <th scope="row">{{$index++}}</th>
                                        <td>{{$itemType['nameItemType']}}</td>
                                        <td>{{$itemType['slugNamaItemType']}}</td>
                                        <td>
                                            @if($itemType['statusNamaItemType']==1)
                                                <button class="btn btn-sm btn-info">Active</button>
                                            @else
                                                <button class="btn btn-sm btn-warning">Disable</button>
                                            @endif
                                        </td>
                                        <td class="mx-auto">
                                            <button class="btn btn-sm btn-warning px-2 px-2" data-toggle="modal" data-target="#editTypeItem" onclick="EditDataType('{{$itemType['id']}}','{{$itemType['nameItemType']}}','{{$itemType['slugNamaItemType']}}','{{$itemType['statusNamaItemType']}}')" >Edit</button>
                                            <button class="btn btn-sm btn-danger px-2 px-2" data-toggle="modal" data-target="#dellTypeItem" onclick="dellDataType('{{$itemType['id']}}','{{$itemType['nameItemType']}}')">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" tabindex="-1" role="dialog" id="editTypeItem">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditCategory">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-change-url" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="categoryName">Item Type</label>
                                <div class="input-group">
                                    @csrf
                                    <input id="idItemType" name="idItemType" hidden>
                                    <input id="nameItemType" name="nameItemType" type="text" class="form-control input-lg {{ $errors->has('nameItemType') ? ' is-invalid' : '' }}" placeholder="Jual" required>
                                    @if ($errors->has('nameItemType'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nameItemType') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="slugNamaItemType">Slug Item Type</label>
                                <input disabled id="slugNamaItemType" name="slugNamaItemType" type="text" class="form-control{{ $errors->has('slugNamaItemType') ? ' is-invalid' : '' }}">
                                @if ($errors->has('slugNamaItemType'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('slugNamaItemType') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="statusNamaItemType">Status Item Type</label>
                                <select id="statusNamaItemType" name="statusNamaItemType" class="form-control{{ $errors->has('statusNamaItemType') ? ' is-invalid' : '' }}">
                                    <option value="0">Disable</option>
                                    <option value="1">Active</option>
                                </select>
                                @if ($errors->has('statusNamaItemType'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('statusNamaItemType') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <button id="submitCategory" type="submit" class="btn btn-primary rounded">Sumbit</button>
                        </form>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="dellTypeItem">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditCategory">Delete Type Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="WarningDelete"></p>
                        <form id="form-action-dell" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden id="idDellTypeItem" name="idDellTypeItem" class="form-control">
                            <button id="submitCategory" type="submit" class="btn btn-danger rounded">Delete</button>
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
        function EditDataType(id,nameTypeItem,slugTypeItem,statusTypeItem) {
            //alert(statusCategory);
            var url_post = '{{route('admin')}}';
            document.getElementById("idItemType").value             = id;
            document.getElementById("nameItemType").value           = nameTypeItem;
            document.getElementById("slugNamaItemType").value       = slugTypeItem;
            document.getElementById("statusNamaItemType").value     = statusTypeItem;
            document.getElementById("labelEditCategory").innerHTML  = 'Type item <b>"'+nameTypeItem+'"</b>';
            document.getElementById("form-change-url").action       = url_post+'/itemtypes/edit/'+id;
        }
        function dellDataType(id,nameTypeItem){
            var url_post = '{{route('admin')}}';
            document.getElementById("idDellTypeItem").value         = id;
            document.getElementById("WarningDelete").innerHTML      = "Are u sure delete this <b>"+nameTypeItem+"</b> !!!";
            document.getElementById("form-action-dell").action      = url_post+'/itemtypes/dell/'+id;
        }
    </script>

@endsection