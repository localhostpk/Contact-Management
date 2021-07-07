
 @foreach($users as $user)
 @if($user->contacts)
<ul>

        @foreach($user->contacts as $contact)
        <li>User Name :{{$user->name}} <br> Role:{{$user->getRoleNames()->first()}} <br> Contact Name :{{$contact->name}}<br></li>

        @endforeach
            @include('admin.contact.sub_tree_view',['members'=>$user->members])
          </ul>
         
        @endif 
           
        
         
@endforeach

