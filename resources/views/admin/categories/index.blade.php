@extends('layouts.admin')

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-2">
                    <a class="btn btn-success rounded-pill" id="createcategory" href="javascript:void(0)" >Create Category</a>
                </div>
                <div class="col-sm-9">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">categories</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
        <section class="content">

            <div class="container-fluid">
                <div id="alerts"></div>

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th scope="col">Title "AR"</th>
                        <th></th>
                        <th></th>
                        <th>image</th>
                        <th>agents</th>
                        <th scope="col" colspan="3" width="1%"  ></th>
                    </tr>
                    </thead>
                    <tbody class="categories">

                    </tbody>
                </table>

            </div>

           {{--start create category modal--}}

            <div class="modal " id="createCategory" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" style="margin-left: 400px;">

                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #1a1e21;color: #f1f1f1;font-family:Segoe UI">
                            <h5 class="modal-title" id="exampleModalCenterTitle" style="">Create Category</h5>
                            <button type="button" class="close" data-dismiss="modal" style="color: #f1f1f1" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                <form id="addform" class="needs-validation" enctype="multipart/form-data" method="post" action="{{route('categories.store')}}" novalidate>
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="modal-body mb-4">

                                <div class="row mb-3">
                                        <div class="col-md-9 ms-auto">
                                            <div class="mb-3">

                                     <input type="text" class="form-control" id="title_ar" name="title_ar" placeholder='Category Name "AR" ' required>
                                           <span class="text-danger error-text title_ar_error"></span>
                               </div>
                               <div class="mb-3">
                                     <input type="text" class="form-control" id="title_en" name="title_en" placeholder='Category Name "EN" 'required>
                                             <span class="text-danger error-text title_en_error"></span>

                               </div>
                                            <div class=" mb-3 custom-file">
                                                <label for="formFileMultiple" class="form-label">Choose Product image</label>
                                                <input class="form-control" type="file" name="image"  id="formFileMultiple" multiple>
                                                <span class="text-danger error-text image_error"></span>
                                            </div>

                                        </div>

                                  </div>

                            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary add_category_btn">Insert</button>
                    </div>
                        </form>

                    </div>
                </div>
            </div>
            {{--End create category modal--}}

            {{--start  add-subcategory modal--}}
            <div class="modal " id="add_subcategories" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" style="margin-left: 400px;">

                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #1a1e21;color: #f1f1f1;font-family:Segoe UI">
                            <h5 class="modal-title" id="exampleModalCenterTitle" style="">Add Sub-Category</h5>
                            <button type="button" class="close" data-dismiss="modal" style="color: #f1f1f1" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form id="addsubform" class="needs-validation" enctype="multipart/form-data" method="post"  novalidate>
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="modal-body mb-4">

                                <div class="row mb-3">
                                    <div class="col-md-9 ms-auto">
                                        <div class="mb-3">
                                            <input type='text' id='category_id' name='category_id'>
                                            <input type="text" class="form-control" id="subcategorytitle_ar" name="subcategorytitle_ar" placeholder='Category Name "AR" ' required>
                                            <span class="text-danger error-text subcategorytitle_ar_error"></span>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="subcategorytitle_en" name="subcategorytitle_en" placeholder='Category Name "EN" 'required>
                                            <span class="text-danger error-text subcategorytitle_en_error"></span>

                                        </div>
                                        <div class=" mb-3 custom-file">
                                            <label for="formFileMultiple" class="form-label">Choose subCategory image</label>
                                            <input class="form-control" type="file" name="image"  id="formFileMultiple" multiple>
                                            <span class="text-danger error-text image_error"></span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary add_subcategory_btn">Insert</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{--End add-subcategory modal--}}

            {{--start Edit category modal--}}
            <div class="modal " id="editCategory" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" style="margin-left: 400px;">

                    <div class="modal-content">
                        <div class="modal-header" style="">
                            <h5 class="modal-title" id="exampleModalCenterTitle" style="">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" style="" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form id="editform" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="cat_id" id="cat_id" value="">
                                <div class="row mb-3">
                                    <div class="col-md-9 ms-auto">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="edit_title_ar" name="title_ar" placeholder='Category Name "AR" '>
                                            <span class="text-danger error-text title_ar_error"></span>

                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="edit_title_en" name="title_en" placeholder='Category Name "EN" '>
                                            <span class="text-danger error-text title_en_error"></span>

                                        </div>


                                        <div class=" mb-3 custom-file">
                                            <label for="formFileMultiple" class="form-label">Choose Product image</label>
                                            <input class="form-control" type="file" name="image"  id="formFileMultiple" multiple>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary add_category_btn">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            {{--End Edit category modal--}}

        <!-- START Delete Modal -->
            <div class="modal" id="DeleteCategory" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="delete_category_id">
                            <h4>Are you sure ? want to delete this product ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary delete_category_btn">Yes Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Delete Modal -->
            {!! $categories->render() !!}

        </section>

@endsection

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        fetchCategory();


        $('body').on('click', '.add_subcategories', function (e) {
            e.preventDefault();
            var add_id= $('.add_subcategories').attr('add-id');
            $('#add_subcategories').modal('show');

        $.ajax({
            type:'GET',
            url:"/admin/subcategories/"+add_id,
            success:function (response){
                if(response.status==404){
                    alert(response.message);
                    $('#add_subcategories').modal('hide');

                }else {
                    $('#category_id').val(add_id);
                }
            },
        });
        });
        function fetchCategory(){
            $.ajax({
                type:'GET',
                url:"/fetch-category",
                success:function (response) {
                    console.log(response);
                    $('.categories').append(response.categoryComp)
                },

            });

        };


        $('body').on('click', '#createcategory', function (e) {
        e.preventDefault();
            $('#createCategory').modal('show');

    });


        $('#addform').submit(function(e) {
        e.preventDefault();
            var data = new FormData(this);

        $.ajax({

            type:$(this).attr('method'),
            url: $(this).attr('action'),
            data:data,
            contentType: false,
            processData: false,
            beforeSend:function (){
                $(document).find('span.error-text').text('');
                $(document).find('.add_category_btn').text('inserting...');

            },
            success:function (data){
               if(data.status==0){
                   $.each(data.error,function (prefix,val){
                       $('span.'+prefix+'_error').text(val[0]);
                   });
               }else {
                   $('#addform')[0].reset();
                   $('.categories').html('');
                   $('#createCategory').modal('hide');
                   fetchCategory();
                   alertSuccess("New Category Added Successfully.");
                   $(document).find('.add_category_btn').text('insert');


               }

            },
            error:function (error){
                console.log(error)
                alert("Data Not Saved");
            }

        });
    });
        $('body').on('click', '.delete', function (e) {
            e.preventDefault();
            var id = $(this).attr('delete-id');

            $('#delete_category_id').val(id);
            $('#DeleteCategory').modal('show');

        });
        $('#DeleteCategory').on('click','.delete_category_btn',function (e){
            e.preventDefault();

            var category_id=$('#delete_category_id').val();

            $.ajax({
                type:"delete",
                url: "{{ url('admin/categories') }}/"+category_id,
                dataType: 'json',
                beforeSend:function (){
                    $(document).find('.delete_category_btn').text('Deleting...');

                },
                success: function(res){
                    $('#DeleteCategory').modal('hide');
                    $('.categories').html('');
                    fetchCategory();
                    $(document).find('.delete_category_btn').text('Yes Delete');
                    alertDanger("Category was deleted.");
                },
                error:function (error){
                    console.log(error)
                    alert("Data Not Saved");
                }
            });

        });

        $('body').on('click', '.edit_cat', function (e) {
            e.preventDefault();
            var id = $(this).attr('edit_cat_id');
            $('#cat_id').val(id);
            $('#editCategory').modal('show');

            $.ajax({
                type:'GET',
                url:"/admin/categories/"+id+"/edit",
                success:function (response){
                    if(response.status==404){
                        alert(response.message);
                        $('#editCategory').modal('hide');

                    }
                    else {
                        $('#edit_title_ar').val(response.categories.title_ar);
                        $('#edit_title_en').val(response.categories.title_en);
                        $('#cat_id').val(id);
                    }
                },
            });
        });

        $('#editform').submit(function(e) {
            e.preventDefault();

            var id=$('#cat_id').val();
            let data = new FormData($('#editform')[0]);
            $.ajax({
                type:'POST',
                data:data,
                url:"/update-category/"+id,
                contentType: false,
                processData: false,
                beforeSend:function (){
                    $(document).find('span.error-text').text('');
                },
                success:function (response){
                    if(response.status==0){
                        $.each(data.error,function (prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else if (response.status==404){
                        alert(response.message);

                    }else if(response.status==200){
                        $('#addform')[0].reset();

                        $('#editCategory').modal('hide');

                        $('.categories').html('');
                        fetchCategory();
                        alertSuccess(" Category was Edited Successfully.")
                    }
                },
                error:function (error){
                    console.log(error)
                    alert("Data Not Saved");
                }

            });

        });

    });

</script>

