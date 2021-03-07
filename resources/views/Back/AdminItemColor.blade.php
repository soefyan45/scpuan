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
                            <h4>Create Color Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.coloritem.store') }}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="colorItemName">Name Color Item</label>
                                    <div class="input-group">
                                        @csrf
                                        <input id="colorItemName" name="colorItemName" type="text" class="form-control input-lg {{ $errors->has('colorItemName') ? ' is-invalid' : '' }}" placeholder="Merah" required>
                                        @if ($errors->has('colorItemName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('colorItemName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="categoryName">Code Color Item</label>
                                    <div class="input-group">
                                        @csrf
                                        <input id="colorItemCode" name="colorItemCode" type="color" class="form-control input-lg {{ $errors->has('colorItemCode') ? ' is-invalid' : '' }}" placeholder="Merah" required>
                                        @if ($errors->has('colorItemCode'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('colorItemCode') }}</strong>
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
                                    <th scope="col">Color</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($ColorItem as $index => $colorItem)
                                    <tr>
                                        <th scope="row">{{$index++}}</th>
                                        <td>{{$colorItem['colorItems']}}</td>
                                        <td>{{$colorItem['slugColorItems']}}</td>
                                        <td><button class="btn btn-sm" style="background-color: {{$colorItem['colorCode']}}"></button></td>
                                        <td>
                                            @if($colorItem['statusColorItems']==1)
                                                <button class="btn btn-sm btn-info">Active</button>
                                            @else
                                                <button class="btn btn-sm btn-warning">Disable</button>
                                            @endif
                                        </td>
                                        <td class="mx-auto">
                                            <button class="btn btn-sm btn-warning px-2 px-2" data-toggle="modal" data-target="#editColorItem" onclick="EditDataColor('{{$colorItem['id']}}','{{$colorItem['colorItems']}}','{{$colorItem['slugColorItems']}}','{{$colorItem['statusColorItems']}}','{{$colorItem['colorCode']}}')" >Edit</button>
                                            <button class="btn btn-sm btn-danger px-2 px-2" data-toggle="modal" data-target="#dellTypeItem" onclick="dellDataType('{{$colorItem['id']}}','{{$colorItem['colorItems']}}')">Delete</button>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="editColorItem">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditColorItem">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-change-url" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="colorItemNameEdit">Item Type</label>
                                <div class="input-group">
                                    @csrf
                                    <input id="idItemColor" name="idItemColor" hidden>
                                    <input id="colorItemNameEdit" name="colorItemNameEdit" type="text" class="form-control input-lg {{ $errors->has('colorItemNameEdit') ? ' is-invalid' : '' }}" placeholder="Hitam" required>
                                    @if ($errors->has('colorItemNameEdit'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('colorItemNameEdit') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="slugcolorItemName">Slug Item Type</label>
                                <input disabled id="slugcolorItemName" name="slugcolorItemName" type="text" class="form-control{{ $errors->has('slugcolorItemName') ? ' is-invalid' : '' }}">
                                @if ($errors->has('slugcolorItemName'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('slugcolorItemName') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="colorItemCodeEdit">Code Color Item</label>
                                <div class="input-group">
                                    @csrf
                                    <input id="colorItemCodeEdit" name="colorItemCodeEdit" type="color" class="form-control input-lg {{ $errors->has('colorItemCodeEdit') ? ' is-invalid' : '' }}" placeholder="Merah" required>
                                    @if ($errors->has('colorItemCodeEdit'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('colorItemCodeEdit') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="statuscolorItemName">Status Item Type</label>
                                <select id="statuscolorItemName" name="statuscolorItemName" class="form-control{{ $errors->has('statuscolorItemName') ? ' is-invalid' : '' }}">
                                    <option value="0">Disable</option>
                                    <option value="1">Active</option>
                                </select>
                                @if ($errors->has('statuscolorItemName'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('statuscolorItemName') }}</strong>
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
                        <h5 class="modal-title" id="labelEditCategory">Delete Color Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="WarningDelete"></p>
                        <form id="form-action-dell" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden id="idDellColorItem" name="idDellColorItem" class="form-control">
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
    <!-- Template JS File -->
    <script src="{{asset('/assets/js/scripts.js')}}"></script>
    <script src="{{asset('/assets/js/custom.js')}}"></script>
    <script>
        function EditDataColor(id,nameTypeItem,slugTypeItem,statusTypeItem,colorCode) {
            //alert(statusCategory);
            var url_post = '{{route('admin')}}';
            document.getElementById("idItemColor").value             = id;
            document.getElementById("colorItemNameEdit").value       = nameTypeItem;
            document.getElementById("slugcolorItemName").value       = slugTypeItem;
            document.getElementById("colorItemCodeEdit").value       = colorCode;
            document.getElementById("statuscolorItemName").value     = statusTypeItem;
            document.getElementById("labelEditColorItem").innerHTML  = 'Color item <b>"'+nameTypeItem+'"</b>';
            document.getElementById("form-change-url").action       = url_post+'/coloritem/edit/'+id;
        }
        function dellDataType(id,nameColorItem){
            var url_post = '{{route('admin')}}';
            document.getElementById("idDellColorItem").value         = id;
            document.getElementById("WarningDelete").innerHTML      = "Are u sure delete this Color<b>"+nameColorItem+"</b> !!!";
            document.getElementById("form-action-dell").action      = url_post+'/coloritem/dell/'+id;
        }
    </script>

@endsection