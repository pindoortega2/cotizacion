// $("#cli_id").select2({ placeholder: "Seleccionar" });
$("#cli_id").select2({
    placeholder: "Seleccionar cliente",
    minimumInputLength: 2, // Número mínimo de caracteres antes de realizar la búsqueda

    language: {
        inputTooShort: function () {
            return "Por favor, ingrese al menos 2 caracteres para buscar"; // Mensaje cuando el texto es muy corto
        },
        noResults: function () {
            return "No se encontraron resultados"; // Mensaje cuando no hay resultados
        },
        searching: function () {
            return "Buscando..."; // Mensaje mientras se realiza la búsqueda
        }
    },

    ajax: {
        url: "../../controllers/clienteC.php?op=buscar_cliente", // Ruta al controlador
        type: "POST",
        dataType: "json",
        delay: 250, // Retraso en milisegundos antes de enviar la solicitud
        data: function (params) {
            return {
                search: params.term // Término de búsqueda ingresado por el usuario
            };
        },
        processResults: function (data) {
            // Formatear los resultados para Select2
            return {
                results: data.map(function (cliente) {
                    return {
                        id: cliente.id_cliente, // ID del cliente
                        text: cliente.cli_nombre + " " + cliente.cli_apellido // Nombre completo del cliente
                    };
                })
            };
        },
        cache: true // Habilitar caché para mejorar el rendimiento
    }
});


/* TODO: Llenar Combo Cliente*/
// $.post("../../controllers/clienteC.php?op=combo",function(data, status){
//     $('#cli_id').html(data);
// });

$(document).ready(function () {
    // Detectar cambio en el select de clientes
    $('#cli_id').on('change', function () {
        var clienteId = $(this).val(); // Obtener el ID del cliente seleccionado


        if (clienteId) {
            // Realizar la solicitud AJAX para obtener los datos del cliente
            $.ajax({
                url: "../../controllers/clienteC.php?op=obtener_cliente", // Ruta al controlador
                type: "POST",
                data: { id_cliente: clienteId }, // Enviar el ID del cliente al servidor
                dataType: "json",
                success: function (data) {
                    if (data) {
                        // Llenar los campos con los datos del cliente
                        $('#cli_contacto[name="cli_contacto"]').val(data.cli_contacto); // Campo de contacto
                        $('#cli_correo[name="cli_correo"]').val(data.cli_correo); // Campo de correo
                        $('#cli_empresa[name="cli_empresa"]').val(data.cli_empresa); // Campo de empresa
                    } else {
                        console.log("No se encontraron datos para el cliente seleccionado.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error al obtener los datos del cliente:", error);
                }
            });
        } else {
            // Si no se selecciona un cliente, limpiar los campos
            $('#cli_contacto[name="contacto"]').val('');
            $('#cli_correo[name="correo"]').val('');
        }
    });
});