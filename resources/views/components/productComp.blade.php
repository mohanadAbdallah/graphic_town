<?php $count=1 ?>
@foreach($products as $product)
    <tbody>
    <tr class="table-secondary">
        <th>{{$count}}</th>
        <th>{{$product->product_ar_name}}</th>
        <th>{{$product->product_ar_description}}</th>
        <td>
            @if($product->image)
                <img src="{{Storage::url($product->image)}}"  alt="img" style="width:60px;border-radius: 7px;">
            @endif
        </td>
        <th>{{$product->size}}</th>
        <th>{{$product->price}}</th>
        <td>
            <button class="btn btn-success rounded-pill dropdown-toggle" type="button" name="action" id="dropdownmenue1" data-toggle="dropdown">Take action </button>
            <ul class="dropdown-menu post" aria-labelledby="dropdownMenuButton1">
                <li role="presentation">
                    <a href="javascript:void(0)" class="btn btn-info dropdown-item edit"  product_id="{{ $product->id }}">Edit</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" class="btn btn-danger dropdown-item delete" product_id="{{ $product->id }}">Delete</a>
                </li>
            </ul>
        </td>
        <?php $count++ ?>
    </tr>
    </tbody>
@endforeach

