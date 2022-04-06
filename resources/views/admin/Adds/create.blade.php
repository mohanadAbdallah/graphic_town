@extends('layouts.admin')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('adds.index')}}">Advertisements</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

   <div class="card">
           <h4 class="card-header">Add New Advertisements</h4>
       <form role="form" action="{{route('adds.store')}}" method="post" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="_token" value="{{ csrf_token() }}" />

           <div class="card-body mx-sm-2" style="margin-left: 50px;">
               <div class="form-group">
                   <label for="title_ar"> Title In Arabic : </label>
                   <input class="form-control input-group-sm" id="title_ar" name="title_ar" placeholder="Enter Name In Arabic">
               </div>
               <div class="form-group">
                   <label for="title_en"> Title In English :</label>
                   <input class="form-control input-group-sm" id="title_en" name="title_en" placeholder="Enter Name In English">
               </div>
               <div class="form-group">
                   <label for="description_ar"> Description In Arabic :</label>
                   <input class="form-control input-group-sm" id="description_ar" name="description_ar" placeholder="Enter Name In English">
               </div><div class="form-group">
                   <label for="description_en"> Description In English :</label>
                   <input class="form-control input-group-sm" id="description_en" name="description_en" placeholder="Enter Name In English">
               </div>

               <div class="custom-file">
                   <input type="file" class="custom-file-input" id="image" name="image"/>
                   <label class="custom-file-label" for="image">Upload Advertisement image :</label>
               </div>

           </div>

           <div class="card-footer">
               <button type="submit" class="btn btn-primary">Insert</button>
           </div>
       </form>
   </div>



@endsection
