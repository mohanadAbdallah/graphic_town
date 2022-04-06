@extends('layouts.admin')
@section('content')
    <?php $count =1 ?>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">categories</a></li>
                        <li class="breadcrumb-item active">Sub-categories</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">


        <div class="container-fluid">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                @foreach($categories->SupCategory as $subcat)

                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$subcat->subcategoryname}}</td>


                        <td>
                            <a href="{{route('categories.edit',$subcat->id)}}" class="btn btn-info ">Edit</a>
                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger ">Delete</a>


                            <form action="{{ route('categories.destroy', $subcat->id)}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @method('DELETE')
                            </form>
                        </td>
                        <?php $count++ ?>
                    </tr>
                @endforeach


            </table>              <a href="{{route('categories.create')}}" class="btn btn-primary">Add New Category</a>


        </div>

    </section>
@endsection

