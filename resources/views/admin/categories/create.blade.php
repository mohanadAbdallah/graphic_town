@extends('layouts.admin')

@section('content')


            <div class="card-body">
                    <div class="form-group w-50">

                    </div>
                    </div>
            <!-- /.card-body -->


            <form role="form" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="card-body">
                <div class="form-group">
                    <label for="title_ar"> Category Title "AR" </label>
                    <input class="form-control input-group-sm" id="title_ar" name="title_ar" placeholder="Enter the Category">

                @if($errors->any())

                            <ul >
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                    @endif

                </div>
                <div class="form-group">
                    <label for="title_en"> Category Title "EN" </label>
                    <input class="form-control input-group-sm" id="title_en" name="title_en" placeholder="Enter the Category">

                    @if($errors->any())

                        <ul >
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image"/>
                    <label class="custom-file-label" for="image">Upload Category image :</label>
                </div>

            </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>


  @endsection
