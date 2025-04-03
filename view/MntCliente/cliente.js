var tabla;

function init(){
    $("#mnt_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault(); //este bloquea el evento submit del formulario o previene el doble click en el boton guardar del formulario
    var formData = new FormData($("#mnt_form")[0]);
    $.ajax({
        url: "../../controllers/clienteC.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){ 

            console.log(datos);

            if (datos.trim() === "ok"){
                
                $('#mnt_form')[0].reset();

                /* TODO:Ocultar Modal */
                $("#modalcliente").modal('hide');
                $('#lista_cliente').DataTable().ajax.reload();                

                swal({
                    title: "Empresa!",
                    text: "Registro Guardado.",
                    icon: "success",
                    confirmButtonClass: "btn-success"
                });            
            }else{
                
                // Obtener el valor del campo "Nombre de Empresa"
                var nombreEmpresa = $('#cli_empresa').val();
                
                swal({
                    title: "Empresa!",
                    text: "La empresa " + nombreEmpresa + " ya existe.",
                    icon: "warning",
                    confirmButtonClass: "btn-danger"
                });
            }
        }
    });
}

function editar(cat_id){
    $('#mdltitulo').html('Editar Registro');

    $.ajax({
        url: "../../controller/categoria.php?op=mostrar",
        data: { cat_id: cat_id },
        type: "POST",
        dataType: "json",
        beforeSend: function() {
            //TODO: Aquí puedes mostrar el modal de carga
            $('#mdlcarga').modal('show');
        },
        success: function(data) {
            setTimeout(function() {
                //TODO: Aquí puedes ocultar el modal de carga y actualizar los valores
                $('#mdlcarga').modal('hide');
                $('#cat_id').val(data.cat_id);
                $('#cat_nom').val(data.cat_nom);
                $('#cat_descrip').val(data.cat_descrip);

                $('#mdlmnt').modal('show');
            }, 2000);
        },
        error: function() {
            //TODO: Aquí puedes ocultar el modal de carga y mostrar un mensaje de error
            $('#mdlcarga').modal('hide');
        }
    });
}

function eliminar(id_cliente){
    swal({    

        title: 'Eliminar al Cliente',
        text: 'Esta seguro de eliminar al cliente!',
        icon: 'error',
        buttons: {
            cancel: {
            text: 'Cancelar',
            value: null,
            visible: true,
            className: 'btn btn-default',
            closeModal: true,
            },
            confirm: {
            text: 'Eliminar',
            value: true,
            visible: true,
            className: 'btn btn-danger',
            closeModal: true
            }
        }
    }).then((isConfirm) => {

        if (isConfirm) {
            
            $.ajax({
                url: "../../controllers/clienteC.php?op=eliminar",
                type: "POST",
                data: { id_cliente: id_cliente },
                beforeSend: function() {

                    //TODO: Mostrar el modal de espera aquí
                    $('#mdlcarga').modal('show');

                },

                success: function(data) {

                    //TODO: Ocultar el modal de espera aquí
                    setTimeout(function() {

                        //TODO: Ocultar el modal de espera aquí
                        $('#mdlcarga').modal('hide');

                        swal({
                            title: "Cotizador!",
                            text: "Registro Eliminado.",
                            icon: "success",
                            confirmButtonClass: "btn-success"
                        });

                        //TODO: Manejar la respuesta del servidor aquí
                    }, 2000);
                    //TODO: Manejar la respuesta del servidor aquí
                },

                error: function(jqXHR, textStatus, errorThrown) {

                    // Ocultar el modal de espera aquí
                    $('#mdlcarga').modal('hide');
                    //TODO: Manejar el error aquí
                
                }
            });

            $('#lista_cliente').DataTable().ajax.reload();
        }
    });
}

$(document).ready(function(){
    tabla = $('#lista_cliente').DataTable({
        serverSide: true, // Habilitar procesamiento del lado del servidor
        processing: true, // Mostrar indicador de carga
        responsive: true, // Habilitar respuesta para pantallas pequeñas
        destroy: true, // Permitir destruir la tabla anterior
        ajax: {
            url: '../../controllers/clienteC.php?op=listar',
            type: 'POST'
        },
        columns: [
            { 
                data: null, // Columna para el índice
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; // Calcular el número de ítem
                },
                className: "text-center" // Centrar el contenido
            },
            { data: 'cli_nombre' }, // Nombre del cliente
            { data: 'cli_apellido' }, // Apellido del cliente
            { data: 'cli_correo' }, // Correo del cliente
            { data: 'cli_contacto' }, // Contacto del cliente
            { data: 'cli_direccion' }, // Dirección del cliente
            { data: 'cli_empresa' }, // Empresa del cliente
            { data: 'created_at' }, // Empresa del cliente
            { 
                data: null, 
                render: function(data, type, row) {
                    return '<button class="btn btn-warning btn-sm">Editar</button>';
                }
            },
            { 
                data: null, 
                render: function(data, type, row) {
                    return '<button class="btn btn-danger btn-sm">Eliminar</button>';
                }
            }
        ],
        pageLength: 10, // Número de registros por página
        lengthMenu: [10, 25, 50, 100], // Opciones de paginación
        order: [[1, 'asc']], // Ordenar por la segunda columna (Nombre del cliente)
        language: {
            processing: "Procesando...",
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 a 0 de 0 registros",
            infoFiltered: "(filtrado de _MAX_ registros en total)",
            search: "Buscar:",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    });
});

$(document).on("click","#btnnuevo", function(){

    $('#mnt_form')[0].reset();
    $('#mdltitulo').html('Nuevo Cliente');
    $('#modalcliente').modal('show');
});

init();