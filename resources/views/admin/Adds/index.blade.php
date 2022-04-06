@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-2">
                    <a href="javascript:void(0)" class="btn btn-success rounded-pill create_adds">ADD NEW</a>
                </div>
                <div class="col-sm-9">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Advertisements</li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content" >

        <div class="container-fluid">

            <table class="table table-striped table-hover "  >
                <thead>
                <tr class="" style="background-color: #1a1e21;color: #f1f1f1">
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th >Image</th>
                    <th scope="col" colspan="2" width="1%"  >Action</th>
                </tr>
                </thead>

                <tbody id="AddsTable">

                </tbody>

            </table>

        </div>
    </section>


        {{--start  create-Adds modal--}}
        <div class="modal " id="create_adds" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" style="margin-left: 400px;">

                <div class="modal-content">
                    <div class="modal-header" style="background-color: #1a1e21;color: #f1f1f1;font-family:Segoe UI">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="">Add New Advertisements</h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: #f1f1f1" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="addsform" class="needs-validation" enctype="multipart/form-data" method="post"  novalidate>
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="modal-body mb-4">

                            <div class="row">

                                <div class="col-md-6 ms-auto">
                                        <div class="mb-3">
                                            <label for="title_ar"> Title In Arabic : </label>
                                            <input class="form-control input-group-sm" id="title_ar" name="title_ar" placeholder="Enter Name In Arabic">
                                            <span class="text-danger error-text title_ar_error"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="title_en"> Title In English :</label>
                                            <input class="form-control input-group-sm" id="title_en" name="title_en" placeholder="Enter Name In English">
                                            <span class="text-danger error-text title_en_error"></span>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description_ar"> Description In Arabic :</label>
                                            <input class="form-control input-group-sm" id="description_ar" name="description_ar" placeholder="Enter Name In English">
                                            <span class="text-danger error-text description_ar_error"></span>
                                        </div>
                                </div>

                                <div class="col-md-6 ms-auto">
                                            <div class="mb-3">
                                                <label for="description_en"> Description In English :</label>
                                                <input class="form-control input-group-sm" id="description_en" name="description_en" placeholder="Enter Name In English">
                                                <span class="text-danger error-text description_en_error"></span>
                                            </div>
                                            <div class=" mb-3 custom-file">
                                                <label for="formFileMultiple" class="form-label">Choose Advertisement image</label>
                                                <input class="form-control" type="file" name="image"  id="formFileMultiple" multiple>
                                                <span class="text-danger error-text image_error"></span>
                                            </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary create_adds_btn">Insert</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{--End add-subcategory modal--}}

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

        fetchAdds();

        function fetchAdds(){
            $.ajax({
                type:'GET',
                url:"/fetch-Adds",
                success:function (response) {
                    console.log(response);
                    $('#AddsTable').append(response.AddsComp)
                },

            });

        };

        $('body').on('click', '.create_adds', function (e) {
            e.preventDefault();
            $('#create_adds').modal('show');

        });
        $('#addsform').on('submit',function (e){
            e.preventDefault();
            var data = new FormData(this);

            $.ajax({

                type:'POST',
                url: '{{route('adds.store')}}',
                data:data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function (){
                    $(document).find('span.error-text').text('');
                },
                success:function (response){

                    if(response.status==0){
                        $.each(response.error,function (prefix,val){
                            $('span.'+prefix+'_error').text(val[0]);

                        });
                    }else{
                        $('#addsform')[0].reset();
                        $('#create_adds').modal('hide');
                        $('#AddsTable').html('');
                        fetchAdds();
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
