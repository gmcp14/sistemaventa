
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="exampleModalLabel1">Escribe la nueva contraseña</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">&times;</span></button>
             </div>
             <div class="modal-body">
                 <form  id="frmpassword" onsubmit="return cambio_password()">
                      <input type="text" id="id_usuario" name="id_usuario" hidden>
                     <div class="form-group">
                         <label for="password" class="control-label">Contraseña nueva</label>
                         <input type="text" class="form-control" id="password" name="password">
                     </div>

                 
             </div>
             <div class="modal-footer">
                 <button  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                 <button  class="btn btn-primary">Actualizar Contraseña</button>
             </div>
             </form>
         </div>
     </div>
 </div>