@if($members)
<ul>
   @foreach($members as $data)

    
        <li>{{$data->name}}<br>{{$data->getRoleNames()->first()}}</li>

                
                @if($data->members)
            @include('admin.user.sub_tree_view',['members'=>$data->members])
            @endif
       @endforeach
   </ul>
@endif