
@extends('layouts.admin')

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('content')



    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-1">
                    <div class="col-sm-2">
                        <a class="btn btn-success rounded-pill user_create"  href="javascript:void(0)" >Create Agent</a>
                    </div>
                    <div class="col-sm-9">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Agents</li>
                        </ol>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <table  class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>status</th>
                    <th>Last Seen</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
                @foreach($data as $agent)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td><a href="javascript:void(0)" class="user_show text-bold text-dark" show-id="{{$agent->id}}">{{$agent->name}}</a></td>
                        <td>{{$agent->email}}</td>
                        <td>
                            @if(Cache::has('is_online' . $agent->id))
                                <label class="badge badge-success">Online</label>

                            @else
                                <label class="badge badge-secondary">Offline</label>
                            @endif
                        </td>

                        <td>
                            @if($agent->last_seen != null)
                                {{ \Carbon\Carbon::parse($agent->last_seen)->diffForHumans() }}
                            @else
                                <code class="text-secondary">No seen</code>
                            @endif</td>

                        <td>
                            @if(!empty($agent->getRoleNames()))
                                @foreach($agent->getRoleNames() as $v)
                                    <label class="badge badge-primary">{{ $v }}</label>
                                @endforeach
                            @endif </td>
                        <td>
                              <a href="{{route('users.edit',$agent->id)}}" class="btn btn-info ">Edit</a>
                              <a href="javascript:void(0)" class="user_show btn btn-warning" show-id="{{$agent->id}}">Show</a>
                              <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger " >Delete</a>
                              <form action="{{ route('users.destroy', $agent->id)}}" method="post">
                                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                                  @method('DELETE')
                              </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {!! $data->render() !!}

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
        user_show_fun();
        user_create_fun();


        function user_show_fun() {

            $('body').on('click', '.user_show', function (e) {
                e.preventDefault();
                var id = $(this).attr('show-id');

                $.ajax({
                    type: 'GET',
                    url: "/admin/users/" + id,

                    success: function (response) {
                        console.log(response);
                        $('.content').html('');
                        $('.content').append(response.user_show)
                    },

                });

            });
        }
        function user_create_fun() {

            $('body').on('click', '.user_create', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'GET',
                    url: "/admin/users/create",

                    success: function (response) {
                        console.log(response);
                        $('.content').html('');
                        $('.content').append(response.user_create)
                    },

                });

            });
        }

    });

</script>
