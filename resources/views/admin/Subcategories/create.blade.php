@extends('layouts.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">

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

<div class="card">

        <form method="post" id="subcategoryForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

              <div class="card-body">
                  <div class="form-group mt-4">
                      <input type='hidden' id='category_id' name='category_id' value="{{$category->id}}">
                <label for="subcategorytitle_ar"> Sub-Category Name "AR" </label>
                      <input class="form-control input-group-sm" id="subcategorytitle_ar"  name="subcategorytitle_ar" placeholder='Enter the name of sub-category "AR" ' >

                @error('subcategorytitle_ar')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
                <label for="subcategorytitle_en"> Sub-Category Name "EN" </label>
                <input class="form-control input-group-sm" id="subcategorytitle_en"  name="subcategorytitle_en" placeholder='Enter the name of sub-category "EN" ' >
                @error('subcategorytitle_en')
                <div class="error text-danger">{{ $message }}</div>
                @enderror


            </div>
                  <div class=" mb-3 custom-file">
                      <label class="custom-file-label" for="image">Upload product image :</label>

                      <input type="file" class="custom-file-input" id="image" name="image"/>
                  </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function (){
        $('#subcategoryForm').on('submit',function (e){
            e.preventDefault();
            var data = new FormData(this);

            $.ajax({
               type:'POST',
                url:'{{route('subcategory.store')}}',
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                success:function (response){
                    console.log(response)
                   alert("data Saved");
                    location.reload()
                },
                error:function (error){
                    console.log(error)
                    alert("Data Not Saved");
                }
            });
        });
    });

</script>

