@extends('layouts.admin')

@section('content')


    <div class="card-body">
        <div class="form-group w-50">

        </div>
    </div>
    <!-- /.card-body -->


    <form role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="card-body">
            <div class="form-group">
                <label for="name_ar"> Product Name In Arabic</label>
                <input class="form-control input-group-sm" id="product_ar_name" name="product_ar_name" placeholder="Enter the product Name In Arabic">
                @if($errors->any())

                    <ul >
                        @error('product_ar_name')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                    </ul>

                @endif
            </div>
            <div class="form-group">
                <label for="name_en"> Product Name In English</label>
                <input class="form-control input-group-sm" id="product_en_name" name="product_en_name" placeholder="Enter the product Name In English">
                @if($errors->any())

                    <ul >
                        @error('product_en_name')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                    </ul>

                @endif
            </div>
            <div class="form-group">
                <label for="description_ar"> Product Description In Arabic</label>
                <input class="form-control input-group-sm" id="product_ar_description" name="product_ar_description" placeholder="Enter the Description Name In Arabic">
                @if($errors->any())

                    <ul >
                        @error('product_ar_description')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                    </ul>

                @endif
            </div>
            <div class="form-group">
                <label for="description_ar"> Product Description In English</label>
                <input class="form-control input-group-sm" id="product_en_description" name="product_en_description" placeholder="Enter the product Description In English">
                @if($errors->any())

                    <ul >
                        @error('product_en_description')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                    </ul>

                @endif
            </div>
            <div class="form-group">
                <div class="form-group">

                    <label for="category">Choose Category</label>
                        <select class="category_id browser-default custom-select" name="category" id="category_id">
                            <option selected>Select category</option>

                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{old('category_id') == $item->id ? 'selected' : ''}}>{{ $item->title_ar }}</option>
                            @endforeach
                        </select>
                    @if($errors->any())

                        <ul >
                            @error('category')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror
                        </ul>

                    @endif

                </div>
                <div class="form-group">

                    <label for="subcategory_id">Choose Sub_Category</label>
                    <select class="subcategory browser-default custom-select" name="subcategory_id" id="subcategory_id">
                        <option value="">First Select category </option>
                    </select>
                    @if($errors->any())

                        <ul >
                            @error('subcategory_id')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror
                        </ul>

                    @endif

                </div>
                <div class="form-group">
                    <label for="category">Choose product image</label>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image"/>
                        <label class="custom-file-label" for="image">Upload Sub-Category image :</label>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <label for="size"> Product size</label>
                <input class="form-control input-group-sm" id="size" name="size" placeholder="Enter the product size">
                @if($errors->any())

                    <ul >
                        @error('size')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                    </ul>

                @endif
            </div>
            <div class="form-group">
                <label for="price"> Product price</label>
                <input class="form-control input-group-sm" id="price" name="price" placeholder="Enter the product price">
                @if($errors->any())

                    <ul >
                        @error('price')
                        <li class="text-danger">{{ $message }}</li>
                        @enderror
                    </ul>

                @endif
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Insert</button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('select[name="category"]').on("change", function (e) {
            var category_id = $(this).val();
            $('#subcategory_id').html('<option value="">Firstly, Choose Category</option>');
            $.ajax({
                type: 'get',
                dataType: "json",
                url: '{{url('admin/subcategories')}}/' + category_id,
                data: {'subcategory_id': '{{old('subcategory_id') ?? ''}}'},
                cache: "false",
                success: function (data) {
                    $('#subcategory_id').html(data.options);

                }, error: function (data) {
                    if (category_id === '') {
                        $('#subcategory_id').html('<option value="">Firstly, Choose Category</option>');
                    } else {
                        $('#subcategory_id').html('<option value="">There is no sub categories</option>');
                    }
                }
            });
            return false;
        });
        $('select[name="category"]').change();

    </script>

@endsection
