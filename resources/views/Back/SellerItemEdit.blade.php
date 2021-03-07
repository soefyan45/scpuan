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
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Add Item</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.Item.update',$detailItem['id']) }}" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="form-label" for="itemTitle">Item Title</label>
                                <div class="input-group">
                                    @csrf
                                    <input type="number" id="item_id" name="item_id" value="{{ $detailItem['id'] }}"
                                        hidden>
                                    <input id="itemTitle" name="itemTitle" type="text"
                                        class="form-control input-lg {{ $errors->has('itemTitle') ? ' is-invalid' : '' }}"
                                        value="{{ $detailItem['nameItem'] }}" placeholder="Name Item" required>
                                    @if ($errors->has('itemTitle'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('itemTitle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="priceItem">Price Item</label>
                                    <input type="text" required
                                        class="form-control {{ $errors->has('priceItem') ? ' is-invalid' : '' }}"
                                        value="{{ $detailItem['priceItem'] }}" id="priceItem" name="priceItem"
                                        placeholder="Price Of Item">
                                    @if ($errors->has('priceItem'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('priceItem') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qtyItem">Qty Item</label>
                                    <input type="text" required
                                        class="form-control {{ $errors->has('qtyItem') ? ' is-invalid' : '' }}"
                                        value="{{ $detailItem['qtyItem'] }}" id="qtyItem" name="qtyItem"
                                        placeholder="Qty Item">
                                    @if ($errors->has('qtyItem'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('qtyItem') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="categoryItem">Category Item</label>
                                    <select required
                                        class="form-control {{ $errors->has('categoryItem') ? ' is-invalid' : '' }}"
                                        id="categoryItem" name="categoryItem" placeholder="Category">
                                        <option>Pilih Category</option>
                                        @foreach ($Category as $category)
                                        <option value="{{ $category['id'] }}"
                                            @if($detailItem['categoryitem_id']==$category['id']) selected @endif>
                                            {{ $category['nameCategory'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('categoryItem'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoryItem') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="typeItem">Type Item</label>
                                    <select type="text" required
                                        class="form-control {{ $errors->has('typeItem') ? ' is-invalid' : '' }}"
                                        id="typeItem" name="typeItem" placeholder="Type Item">
                                        <option>Pilih Type Item</option>
                                        @foreach ($itemType as $itemType)
                                        <option value="{{ $itemType['id'] }}"
                                            @if($detailItem['itemtype_id']==$itemType['id']) selected @endif>
                                            {{ $itemType['nameItemType'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('typeItem'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('typeItem') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="itemDesc">Item Description</label>
                                <div class="input-group">
                                    <textarea id="itemDesc" name="itemDesc" type="text"
                                        class="form-control input-lg {{ $errors->has('itemDesc') ? ' is-invalid' : '' }}"
                                        required>{{ $detailItem['descriptionItem'] }}</textarea>
                                    @if ($errors->has('itemDesc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('itemDesc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div id="preview" class="d-inline-flex">
                                @foreach($detailItem['itemhasimages'] as $itemImg)
                                <div style="height: 100;" id="imgEx{{ $itemImg['id'] }}">
                                    <button type="button" class="close" aria-label="Close"
                                        onclick="dellImgItem('{{ $itemImg['id'] }}');">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <img height="100" title="{{$detailItem['nameItem']}}" value={{ $itemImg['id'] }}
                                        src="{{$itemImg['imgItems']}}" class="rounded mx-1 my-2">
                                    <input type="number" id="idImgItem" name="idImgItem[]" class="form-control"
                                        value="{{ $itemImg['id'] }}" hidden>
                                </div>
                                @endforeach
                            </div>
                            <input type="number" id="actionDellItem" name="actionDellItem" value="1"
                                class="form-control">
                            <div id="imgDell">

                            </div>
                            <div class="form-group custom-file">
                                <label class="custom-file-label" for="imgItem">Image Item</label>
                                <input id="imgItem" name="imgItem[]" type="file"
                                    class="custom-file-input{{ $errors->has('imgItem') ? ' is-invalid' : '' }}" multiple
                                    data-show-upload="true" data-show-caption="true">
                                @if ($errors->has('imgItem'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imgItem') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="itemColor">Item Color</label>
                                <div class="input-group">
                                    <div class="form-group">
                                        <label class="form-label">Chosee Color</label>
                                        <div class="row gutters-xs">
                                            @foreach ($ItemColor as $itemColor)
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="color[]" type="checkbox" value="{{ $itemColor['id'] }}"
                                                        class="colorinput-input" @foreach ($detailItem['itemhascolor']
                                                        as $itemhasColor)
                                                        @if($itemColor['id']==$itemhasColor['itemcolor_id']) checked
                                                        @endif @endforeach>
                                                    <span class="colorinput-color"
                                                        style="background-color:{{ $itemColor['colorCode'] }};"></span>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($errors->has('itemColor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('itemColor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button id="submitCategory" class="btn btn-primary rounded">Sumbit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
<script src="{{asset('/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('/assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{asset('/assets/js/scripts.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script>
    function previewImages() {
        var preview = document.querySelector('#preview');
        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
        }
        function readAndPreview(file) {
            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...
            var reader = new FileReader();
            reader.addEventListener("load", function() {
                var image = new Image();
                image.height = 100;
                image.title  = file.name;
                image.src    = this.result;
                image.className    = 'rounded mx-1 my-2';
                preview.appendChild(image);
            });
            reader.readAsDataURL(file);
        }
    }
    document.querySelector('#imgItem').addEventListener("change", previewImages);
    function dellImgItem(ValidImg){
        //alert('data ini '+IdImg);
        var idImg = 'imgEx'+ValidImg;
        //alert(idImg);
        document.getElementById(idImg).remove();
        document.getElementById("actionDellItem").value = 0;
        $("#imgDell").append("<input type='number' id='idDellImgItem' name='idDellImgItem[]' value='"+ValidImg+"' class='form-control' hidden>")
    }
</script>

@endsection