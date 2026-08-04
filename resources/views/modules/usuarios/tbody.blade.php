 @foreach($items as $item)
 <tr class="text-center">
     <td>{{$item->email}}</td>
     <td>{{$item->name}}</td>
     <td>{{$item->rol}}</td>
     <td>
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cambiar_password">
            <i class=" fas fa-key"></i>
        </a>
    </td>
     <td class=" text-white">
        <div class="form-check form-switch">
             <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>

         </div>
         
         <div class="form-check form-switch">
             <input class="form-check-input" type="checkbox" id="{{$item->id}}"
             {{ $item->activo ? 'checked' : ''}}>

         </div>
         
     </td>


     <td>
         <a href="{{route('usuarios.edit', $item->id)}}" class="btn btn-warning btn-sm"><i
                 class=" fas fa-pen-square"></i>
         </a>

     </td>
 </tr>
 @endforeach