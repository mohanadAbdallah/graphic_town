@extends('layouts.admin')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <form method="POST" action="{{route('categories.update', $categories->id)}}">

        @csrf
        @method('PATCH')

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="card-body">
            <div class="form-group w-50">
                <label for="title_ar"> Enter New Category Title "AR" </label>
                <input class="form-control input-group-sm" id="title_ar" name="title_ar" value="{{$categories->title_ar}}">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group w-50">
                <label for="title_en"> Enter New Category Title "EN" </label>
                <input class="form-control input-group-sm" id="title_en" name="title_en" value="{{$categories->title_en  }}" value="">
            </div>
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


@endsection
