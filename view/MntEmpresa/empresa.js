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
        url: "../../controllers/empresaC.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){ 

            console.log(datos);

            if (datos.trim() === "ok"){
                
                $('#mnt_form')[0].reset();

                /* TODO:Ocultar Modal */
                $("#modalempresa").modal('hide');
                $('#lista_empresa').DataTable().ajax.reload();                

                swal({
                    title: "Empresa!",
                    text: "Registro Guardado.",
                    icon: "success",
                    confirmButtonClass: "btn-success"
                });            
            }else{
                swal({
                    title: "Empresa!",
                    text: "Registro Duplicado.",
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

function eliminar(id){
    swal({
        title: 'Eliminar El Servicio',
        text: 'Esta seguro de eliminar el servicio!',
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
                url: "../../controllers/serviciosC.php?op=eliminar",
                type: "POST",
                data: { id: id },
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

            $('#lista_data').DataTable().ajax.reload();
        }
    });
}

$(document).ready(function(){
    tabla=$('#lista_empresa').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        "lengthChange": true,
        "lengthMenu": [ [10, 25, 50, 100], [10, 25, 50, 100] ], // Opciones de cantidad de registros
        colReorder: true,
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controllers/empresaC.php?op=listar',
            type : "post",
            dataType : "json",						
            // error: function(e){
            //     console.log(e.responseText);	
            // }            
        },

        "columns": [
                { "data": 0 }, // Número del ítem
                { "data": 1 }, // Nombre de la empresa
                { "data": 2 }, // Botón de editar
                { "data": 3 }  // Botón de eliminar
            ],

        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10, // Número de registros por defecto
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
});

$(document).on("click","#btnnuevo", function(){

    $('#mnt_form')[0].reset();
    $('#mdltitulo').html('Nuevo Registro');
    $('#modalempresa').modal('show');
});

init();