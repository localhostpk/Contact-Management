@if($members)
@foreach($members as $member)
@if($member->contacts)
@foreach($member->contacts as $data)
         <tr> 
           <td class="table-success">{{$data->id}}</td>
            <td class="table-success">{{$data->user_id}}</td>
           <td>{{$data->name}}</td>
           <td>{{$data->email}}</td>
            <td>{{$data->phone_no}}</td>
            <td>{{$data->contry}}</td>
            <td>{{$data->city}}</td>
            <td>{{$data->address}}</td>
            <td><a class="btn btn-primary" href="{{route('edit.contact',$data->id)}}">Edit</a>
              <br><a class="btn btn-danger" href="{{route('destroy.contact',$data->id)}}">Delete</a>
            </td>
         </tr>
         @endforeach
         @endif
   @include('admin.contact.index',['members'=>$member->members])
 @endforeach 
@endif