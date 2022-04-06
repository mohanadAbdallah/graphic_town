@extends('layouts.admin')

@section('content')
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('adds.index')}}">Advertisements</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

    <form method="post" action="{{route('adds.update', $adds->id)}}">

        @csrf
        @method('PATCH')

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="card-body">
            <div class="form-group">
                <label for="AgentAdding">Name In Arabic :  </label>
                <input class="form-control input-group-sm" id="name-ar" name="name-ar" value="{{$adds->title_ar}}">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Name In English : </label>
                <input class="form-control input-group-sm" id="name-en" name="name-en" value="{{$adds->title_en}}">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Address :  </label>
                <input class="form-control input-group-sm" id="Address" name="Address" value="{{$adds->description}}">
            </div>
            <div class="form-group">
                <label for="AgentAdding">Phone Number :  </label>
                <input class="form-control input-group-sm" id="phone_number" name="phone_number" value="{{$adds->image}}">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Password :</label>
                <input class="form-control input-group-sm" type="password" id="name-en" name="Password">
            </div>
            <div class="form-group">
                <label for="AgentAdding"> Re-Password : </label>
                <input class="form-control input-group-sm" type="password" id="name-en" name="Password">
            </div>

        </div>

        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


@endsection
