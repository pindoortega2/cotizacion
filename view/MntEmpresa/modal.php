<div class="modal fade" id="modalempresa">
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
                            <input type="text" class="form-control" id="em_nombre" name="em_nombre" placeholder="Ingrese el tipo de empresa" required>
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