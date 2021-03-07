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
                            <h4>Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="categoryName">Name Category</label>
                                    <div class="input-group">
                                        @csrf
                                        <input id="categoryName" name="categoryName" type="text" class="form-control input-lg {{ $errors->has('categoryName') ? ' is-invalid' : '' }}" placeholder="Baju" required>
                                        @if ($errors->has('categoryName'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('categoryName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group custom-file">
                                    <input type="file" class="custom-file-input{{ $errors->has('imgCategory') ? ' is-invalid' : '' }}" id="imgCategory" name="imgCategory">
                                    <label class="custom-file-label" for="customFile">Image Category</label>
                                    @if ($errors->has('imgCategory'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('imgCategory') }}</strong>
                                        </span>
                                    @endif
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
                                    <th scope="col">Pict</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Category as $index => $cat)
                                    <tr>
                                        <th scope="row">{{$index++}}</th>
                                        <td>{{$cat['nameCategory']}}</td>
                                        <td>{{$cat['slugCategory']}}</td>
                                        <td><img src="{{asset($cat['imgCategory'])}}" alt="profile Pic" height="40" width="60"></td>
                                        <td>
                                            @if($cat['statusCategory']==1)
                                                <button class="btn btn-sm btn-info">Active</button>
                                            @else
                                                <button class="btn btn-sm btn-warning">Disable</button>
                                            @endif
                                        </td>
                                        <td class="mx-auto">
                                            <button class="btn btn-sm btn-warning px-2 px-2" data-toggle="modal" data-target="#edit" onclick="EditDataCat('{{$cat['id']}}','{{$cat['nameCategory']}}','{{$cat['slugCategory']}}','{{$cat['statusCategory']}}')" >Edit</button>
                                            <button class="btn btn-sm btn-danger px-2 px-2" data-toggle="modal" data-target="#dellCategoryItem" onclick="dellDataCat('{{$cat['id']}}','{{$cat['nameCategory']}}')">Delete</button>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="edit">
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
                                <label class="form-label" for="categoryName">Category</label>
                                <div class="input-group">
                                    @csrf
                                    <input id="idCategory" name="idCategory" hidden>
                                    <input id="categoryNameEdit" name="categoryNameEdit" type="text" class="form-control input-lg {{ $errors->has('categoryNameEdit') ? ' is-invalid' : '' }}" placeholder="Laravel" required>
                                    @if ($errors->has('categoryNameEdit'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('categoryNameEdit') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group custom-file">
                                <input type="file" class="custom-file-input{{ $errors->has('pictCategoryEdit') ? ' is-invalid' : '' }}" id="pictCategoryEdit" name="pictCategoryEdit">
                                <label class="custom-file-label" for="customFile">picture category</label>
                                @if ($errors->has('pictCategoryEdit'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pictCategoryEdit') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="slugCategory">Slug Category</label>
                                <input disabled id="slugCategoryEdit" name="slugCategoryEdit" type="text" class="form-control{{ $errors->has('slugCategoryEdit') ? ' is-invalid' : '' }}">
                                @if ($errors->has('slugCategoryEdit'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('slugCategoryEdit') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="statusCategoryEdit">Status Category</label>
                                <select id="statusCategoryEdit" name="statusCategoryEdit" class="form-control{{ $errors->has('statusCategoryEdit') ? ' is-invalid' : '' }}">
                                    <option value="0">Disable</option>
                                    <option value="1">Active</option>
                                </select>
                                @if ($errors->has('statusCategoryEdit'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('statusCategoryEdit') }}</strong>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="dellCategoryItem">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditCategory">Delete Page</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="WarningDelete"></p>
                        <form id="form-action-dell" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden id="idDellCategory" name="idDellCategory" class="form-control">
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
        function EditDataCat(id,nameCategory,slugCategory,statusCategory) {
            //alert(statusCategory);
            var url_post = '{{route('admin')}}';
            document.getElementById("idCategory").value = id;
            document.getElementById("categoryNameEdit").value       = nameCategory;
            document.getElementById("slugCategoryEdit").value       = slugCategory;
            document.getElementById("statusCategoryEdit").value     = statusCategory;
            document.getElementById("labelEditCategory").innerHTML  = 'Category <b>"'+nameCategory+'"</b>';
            document.getElementById("form-change-url").action       = url_post+'/category/edit/'+id;
        }
        function dellDataCat(id,nameCategory){
            var url_post = '{{route('admin')}}';
            document.getElementById("idDellCategory").value         = id;
            document.getElementById("WarningDelete").innerHTML      = "Are u sure delete this <b>"+nameCategory+"</b> !!!";
            document.getElementById("form-action-dell").action      = url_post+'/category/dell/'+id;
        }
    </script>

@endsection