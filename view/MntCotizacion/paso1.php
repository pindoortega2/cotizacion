<div class="panel panel-inverse">
    <div class="panel-heading">
        <h4 class="panel-title">Tabla</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            
        </div>
    </div>
    <div class="panel-body">
        
        <form>

            <input type="hidden" id="nombre_user" name="nombre_user" value="<?php echo $_SESSION["use_nombre"] ." ". $_SESSION["use_apellido"] ?>" class="form-control" disabled>

            <div class="row row-space-10">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Elegir Cliente</label>
                        <select class="form-control" id="cli_id" name="cli_id">
                            
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre de la empresa</label>
                        <input type="text" class="form-control" id="cli_empresa" name="cli_empresa" placeholder="Digital World" disabled>
                    </div>
                </div>
            </div>


            <div class="row row-space-10">

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Ruc</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="1724589001" disabled>
                    </div>
                </div>    

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Contacto</label>
                        <input type="text" class="form-control" id="cli_contacto" name="cli_contacto" placeholder="0997785425" disabled>
                    </div>
                </div>
                

            </div>


            
            <div class="form-group">
                <label for="exampleFormControlInput1">Correo</label>
                <input type="email" class="form-control" id="cli_correo" name="cli_correo" placeholder="name@example.com" disabled>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end">
                <div class="btn-group mr-2 sw-btn-group g-2" role="group">
                    <button class="btn btn-danger sw-btn-prev disabled" type="button">Cancelar</button>
                    <button class="btn btn-primary sw-btn-next" type="button">Next</button>
                </div>
            </div>

        </form>

    </div>
</div>