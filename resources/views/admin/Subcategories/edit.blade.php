@extends('layouts.admin')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">categories</a></li>
                        <li class="breadcrumb-item active">Edit categories</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <form method="post" action="{{route('subcategory.update',$subcategory->id)}}" >
     @method('PUT')
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="card-body">
            <span>Edit Sub Category </span>

            <div class="form-group">

            </div>

            <div class="form-group mt-4">

                <input type='hidden' id='category_id' name='category_id' value="{{$subcategory->category_id}}">

                <label for="subcategorytitle_ar"> Edit Sub-Category </label>
                <input class="form-control input-group-sm" id="subcategorytitle_ar"  name="subcategorytitle_ar" value="{{$subcategory->subcategoryname_ar}}" >

                <label for="subcategorytitle_en"> Edit Sub-Category </label>
                <input class="form-control input-group-sm" id="subcategorytitle_en"  name="subcategorytitle_en" value="{{$subcategory->subcategoryname_en}}">

                @error('subcategorytitle_ar')
                <div class="error text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image"/>
                <label class="custom-file-label" for="image">Upload Sub-Category image :</label>
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


@endsection
