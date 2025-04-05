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
        
        <div class="row row-space-10">

            <div class="col-md-6">

                <div class="form-group m-b-10 p-t-5">
                    <label for="exampleFormControlSelect1">Elegir el Tipo de Empresa</label>
                    <select class="form-control" id="emp_id" name="emp_id">
                        
                    </select>
                </div>

                <div class="form-group m-b-10 p-t-5">
                    <label for="exampleFormControlSelect1">Elegir Servicios</label>
                    <div id="servicios-container" style="background-color:rgb(245, 245, 245); padding: 12px; border-radius: 8px;">                
                        <!-- Aquí se generarán los checkboxes dinámicamente -->
                    </div>
                </div>

            </div>

            <!-- <div class="col-md-6">
                <div class="form-group m-b-10 p-t-5">
                    <label for="exampleFormControlSelect1">Elegir Servicios</label>
                    <select class="form-control" id="id_servicio" name="id_servicio">
                            
                    </select>
                </div>
            </div> -->

            <div class="col-md-6">

                <div class="row row-space-10">

                    <div class="col-md-6">                    
                        <label for="dpo-options">Valor</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>

                    <div class="col-md-6">
                        <label for="dpo-options">Total</label>
                        <input type="text" class="form-control" name="" id="">
                    </div>
                
                </div>  
            </div>

            <!-- Contenedor oculto para el select adicional -->
            <div class="col-md-12" id="dpo-options-container" style="display: none;">
                <div class="form-group m-b-10 p-t-5">
                    <label for="dpo-options">Servicios con Precio Fijo</label>
                    <select class="form-control" id="dpo-options" name="dpo-options">
                        <option value="">Seleccione una opción</option>
                        <option value="opcion1">150 USD mensual</option>
                        <option value="opcion2">250 USD mensual</option>
                        <option value="opcion3">500 USD mensual</option>
                    </select>
                </div>
            </div>

        </div>

    </div>
</div>