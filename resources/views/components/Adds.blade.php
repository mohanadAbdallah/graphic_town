<?php $count =1 ?>

@foreach($advertisement as $adds)
    <tr>
        <td>{{$count}}</td>
        <td>{{$adds->title_ar}}</td>
        <td>{{$adds->description_ar}}</td>
        <td>
            @if($adds->image)
                <img src="{{Storage::url($adds->image)}}"   alt="img" style="max-height:100px;max-width:50px;border-radius: 7px;">
            @endif
        </td>
        <td>
            <button class="btn btn-warning rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">
                Take action
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="breadcrumb-item"><a class="dropdown-item" href="{{route('adds.edit',$adds->id)}}">Edit</a></li>
                <li role="presentation">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">Delete</a>
                    <form action="{{ route('adds.destroy',$adds->id)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @method('DELETE')
                    </form>
                </li>
            </ul>

        </td>

        <?php $count++ ?>
    </tr>
@endforeach
