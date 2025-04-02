<div class="modal fade" id="modalcliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mdltitulo">Servicios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                <form id="mnt_form" method="POST">

                    <fieldset>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="cli_nombre" name="cli_nombre" placeholder="Ingrese el Nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="cli_apellido" name="cli_apellido" placeholder="Ingrese el Apellido" required>
                        </div>

                        <div class="form-group">
                            <label for="empresa">Nombre de la Empresa</label>
                            <input type="text" class="form-control" id="cli_empresa" name="cli_empresa" placeholder="Ingrese el nombre de la empresa" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="cli_correo" name="cli_correo" placeholder="Ingrese el correo" required>
                        </div>


                        <div class="form-group">
                            <label for="contacto">Contacto</label>
                            <input type="text" class="form-control" id="cli_contacto" name="cli_contacto" placeholder="Ingrese el contacto" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="cli_direccion" name="cli_direccion" placeholder="Ingrese la dirección" required>
                        </div>

                    </fieldset>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="action" value="add" class="btn btn-success">Guardar</button>
                    </div>

                </form>

            </div>
            
        </div>
    </div>
</div>
<!-- #modal-without-animation -->