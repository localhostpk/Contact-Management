@if($members)
   @foreach($members as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->getRoleNames()->first()}}</td>
                  <td>{{optional($data->cityAdmin)->name}}</td>
                  <td>{{$data->members->count()}}</td>
                           <td>@if($data->qrcode)
                    {{route('add.usercontact',$data->qrcode->qr_code_string)}}
                    @endif
                    </td>
                  <td>
                    
                      <a  class="btn btn-success" href="{{route('generate.qr_code.user',$data->id)}}">Generate Link & QRCode</a>
                    @if($data->qrcode)
                         <a  class="btn btn-success" href="{{route('qr_code.view',$data->qrcode->qr_code_string)}}">View QRCode</a>
                    @endif
                    <a class="btn btn-primary" href="{{route('edit.user',$data->id)}}">Edit</a>
              <a class="btn btn-danger" href="{{route('destroy.user',$data->id)}}">Delete</a>
            </td>
            
                </tr>
                @if($data->members)
            @include('admin.user.index',['members'=>$data->members])
            @endif
       @endforeach
       @endif