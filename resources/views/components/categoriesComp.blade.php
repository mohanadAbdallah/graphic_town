
@foreach($categories as $cat)

    <tr>
        <th>{{++$i}}</th>
        <th>{{$cat->title_ar}}</th>
        <th></th>
        <th></th>
        <th>
            @if($cat->image)
                <img src="{{Storage::url($cat->image)}}" class="object-cover w-full h-full rounded-full" alt="img" style="max-width:60px;max-height: 100px; border-radius: 7px;">
        @endif
        <td>{{$cat->user->name}}</td>
        <td></td>
        <th></th>
        <td>
            <button class="btn btn-warning rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">Take action </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li role="presentation"><a class="dropdown-item edit_cat" href="javascript:void(0)" edit_cat_id="{{$cat->id}}">Edit</a></li>
                <li role="presentation"><a class="dropdown-item add_subcategories" href="javascript:void(0)" add-id="{{$cat->id}}">Add Sub-Category</a></li>
                <li class="presentation"><a class="dropdown-item delete" href="javascript:void(0)" delete-id="{{$cat->id}}" >Delete</a></li>
{{--                <li class="presentation"><a class="dropdown-item " href="{{route('active_cat',$cat->id)}}">inActive</a></li>--}}
            </ul>
        </td>


    @foreach($cat->SupCategory as $sub_cat)
        <tr style="margin-left:100px;">
            <th></th>
            <th>#{{++$i }}</th>
            <td></td>

            <td>{{$sub_cat->subcategoryname_ar}}</td>
            <td>
                @if($sub_cat->image)
                    <img src="{{Storage::url($sub_cat->image)}}"  alt="img" style="max-width:60px;max-height: 50px; margin-left: 120px; border-radius: 7px;">
                @endif
            </td>
            <td></td>
            <td></td>
            <td>
                <button class="btn btn-warning rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">
                    Take action
                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="breadcrumb-item"><a class="dropdown-item" href="{{route('subcategory.edit',$sub_cat->id)}} ">Edit</a></li>
                    <li role="presentation">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                        <form action="{{ route('subcategory.destroy',$sub_cat->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @method('DELETE')
                        </form>
                    </li>
                </ul>

            </td>

            <td>
            </td>
        </tr>

        {!! $categories->render() !!}

        @endforeach
        </tr>

@endforeach
