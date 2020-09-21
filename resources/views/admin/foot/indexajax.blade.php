 @foreach($data as $k=>$v)
            <tr >
                <td></td>
                <td>{{$v->foot_id}}</td>
                <td>{{$v->f_name}}</td>
                <td>
                    {{$v->f_url}}
                </td>
                
               
                <td class="text-center">
                    <button type="button" class="btn bg-olive btn-xs del" foot_id="{{$v->foot_id}}" >删除</button>
                    <button type="button" class="btn bg-olive btn-xs" data-toggle="modal" data-target="#editModal"><a href="{{url('/foot/update/'.$v->foot_id)}}">编辑</a></button>
                </td>
            </tr>
            @endforeach
              <tr>
                <td>{{$data->appends(['f_name'=>$f_name])->links()}}</td>
            </tr>
            
            