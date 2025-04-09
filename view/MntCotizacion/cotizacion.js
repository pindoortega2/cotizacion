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
    //Detecta el cambio y llena los campos de contacto, correo y empresa
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

    // Detectar cambio en el select tipo de empresa
    $("#emp_id").select2({
        placeholder: "Seleccionar Empresa",
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
            url: "../../controllers/empresaC.php?op=buscar_empresa", // Ruta al controlador
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
                    results: data.map(function (empresa) {
                        return {
                            id: empresa.id, // ID de la empresa
                            text: empresa.em_nombre // Nombre completo de la empresa
                        };
                    })
                };
            },
            cache: true // Habilitar caché para mejorar el rendimiento
        }
    });

    // Detectar cambio en el select de servicios
    // $("#id_servicio").select2({
    //     placeholder: "Seleccionar Empresa",
    //     minimumInputLength: 2, // Número mínimo de caracteres antes de realizar la búsqueda
    
    //     language: {
    //         inputTooShort: function () {
    //             return "Por favor, ingrese al menos 2 caracteres para buscar"; // Mensaje cuando el texto es muy corto
    //         },
    //         noResults: function () {
    //             return "No se encontraron resultados"; // Mensaje cuando no hay resultados
    //         },
    //         searching: function () {
    //             return "Buscando..."; // Mensaje mientras se realiza la búsqueda
    //         }
    //     },
    
    //     ajax: {
    //         url: "../../controllers/serviciosC.php?op=buscar_servicios", // Ruta al controlador
    //         type: "POST",
    //         dataType: "json",
    //         delay: 250, // Retraso en milisegundos antes de enviar la solicitud
    //         data: function (params) {
    //             return {
    //                 search: params.term // Término de búsqueda ingresado por el usuario
    //             };
    //         },
    //         processResults: function (data) {
    //             // Formatear los resultados para Select2
    //             return {
    //                 results: data.map(function (servicios) {
    //                     return {
    //                         id: servicios.id, // ID de la empresa
    //                         text: servicios.ser_nombre // Nombre completo de la empresa
    //                     };
    //                 })
    //             };
    //         },
    //         cache: true // Habilitar caché para mejorar el rendimiento
    //     }
    // });

    // Cargar servicios y generar checkboxes dinámicamente
    // function cargarServicios() {
    //     $.ajax({
    //         url: "../../controllers/serviciosC.php?op=buscar_servicios", // Ruta al controlador
    //         type: "POST",
    //         dataType: "json",
    //         success: function (data) {
    //             // Limpiar el contenedor de servicios
    //             $("#servicios-container").empty();

    //             if (data.length > 0) {
    //                 // Generar un checkbox por cada servicio
    //                 data.forEach(function (servicio) {
    //                     const checkbox = `
    //                         <div class="form-check">                                
    //                             <input class="form-check-input" type="checkbox" id="servicio_${servicio.id}" name="servicios[]" value="${servicio.id}">
    //                             <label class="form-check-label" for="servicio_${servicio.id}">
    //                                 ${servicio.ser_nombre}
    //                             </label>
    //                         </div>
    //                     `;
    //                     $("#servicios-container").append(checkbox);
    //                 });

    //                 // Agregar evento para mostrar el select si se selecciona "DPO"
    //                 $(".form-check-input").on("change", function () {
    //                     if ($(this).val() === "2" && $(this).is(":checked")) {
    //                         $("#dpo-options-container").show(); // Mostrar el select
    //                     } else if ($(this).val() === "2" && !$(this).is(":checked")) {
    //                         $("#dpo-options-container").hide(); // Ocultar el select
    //                         $("#dpo-options").val(""); // Reiniciar el valor del select
    //                     }
    //                 });


    //             } else {
    //                 // Mostrar mensaje si no hay servicios
    //                 $("#servicios-container").html("<p>No se encontraron servicios.</p>");
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error("Error al cargar los servicios:", error);
    //             $("#servicios-container").html("<p>Error al cargar los servicios.</p>");
    //         }
    //     });
    // }
    // Llamar a la función para cargar los servicios al cargar la página
    // cargarServicios();


    function cargarServicios() {
        $.ajax({
            url: "../../controllers/serviciosC.php?op=buscar_servicios", // Ruta al controlador
            type: "POST",
            dataType: "json",
            success: function (data) {
                // Limpiar el contenedor de servicios
                $("#servicios-container").empty();

                if (data.length > 0) {
                    // Generar un checkbox por cada servicio
                    data.forEach(function (servicio) {
                        const checkbox = `
                            <div class="form-check">                                
                                <input class="form-check-input" type="checkbox" id="servicio_${servicio.id}" name="servicios[]" value="${servicio.id}">
                                <label class="form-check-label" for="servicio_${servicio.id}">
                                    ${servicio.ser_nombre}
                                </label>
                            </div>
                        `;
                        $("#servicios-container").append(checkbox);
                    });

                    // Agregar evento para mostrar el select si se selecciona "DPO"
                    $(".form-check-input").on("change", function () {

                        const servicioId = $(this).val(); // Obtener el ID del servicio seleccionado

                        if ($(this).val() === "2" && $(this).is(":checked")) {
                            $("#dpo-options-container").show(); // Mostrar el select
                            cargarPreciosDPO(); // Cargar precios para DPO
                        } else if ($(this).val() === "2" && !$(this).is(":checked")) {
                            $("#dpo-options-container").hide(); // Ocultar el select
                            $("#dpo-options").html('<option value="">Seleccione un precio</option>'); // Reiniciar las opciones del select
                        }

                        // Mostrar el input de precio para Entrenamiento práctico PDP (id = 5)
                        if (servicioId === "5" && $(this).is(":checked")) {
                            cargarPrecioPDP();
                        } else if (servicioId === "5" && !$(this).is(":checked")) {
                            $("#pdp-price-container").hide();
                            $("#pdp-price").val(""); // Limpiar el valor del input
                        }

                        
                    });
                } else {
                    // Mostrar mensaje si no hay servicios
                    $("#servicios-container").html("<p>No se encontraron servicios.</p>");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al cargar los servicios:", error);
                $("#servicios-container").html("<p>Error al cargar los servicios.</p>");
            }
        });
    }

    // Llamar a la función para cargar los servicios al cargar la página
    cargarServicios();

    // Función para cargar los precios de DPO
    function cargarPreciosDPO() {
        $.ajax({
            url: "../../controllers/serviciosC.php?op=precios_dpo", // Ruta al controlador para obtener precios
            type: "POST",
            dataType: "json",
            success: function (data) {
                // Limpiar las opciones del select
                $("#dpo-options").empty();
                $("#dpo-options").append('<option value="">Seleccione un precio</option>');

                if (data.length > 0) {
                    // Agregar cada precio como una opción en el select
                    data.forEach(function (precio) {
                        const option = `<option value="${precio.id}">${precio.precio} / mensual</option>`;
                        $("#dpo-options").append(option);
                    });
                } else {
                    $("#dpo-options").append('<option value="">No hay precios disponibles</option>');
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al cargar los precios de DPO:", error);
            }
        });
    }



    // Función para cargar el precio del Entrenamiento práctico PDP
    function cargarPrecioPDP() {
        $.ajax({
            url: "../../controllers/serviciosC.php?op=precio_pdp", // Ruta al controlador para obtener el precio
            type: "POST",
            dataType: "json",
            success: function (data) {
                if (data && data.precio) {
                    $("#pdp-price-container").show(); // Mostrar el input
                    $("#pdp-price").val(data.precio); // Establecer el precio en el input
                } else {
                    console.error("No se encontró el precio para el Entrenamiento práctico PDP.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al cargar el precio del Entrenamiento práctico PDP:", error);
            }
        });
    }

    // Detectar cambio en el select de precios DPO
    $("#dpo-options").on("change", function () {
        const selectedOption = $(this).find("option:selected"); // Obtener la opción seleccionada
        const selectedValue = selectedOption.val(); // Obtener el valor de la opción seleccionada
        const selectedText = selectedOption.text(); // Obtener el texto de la opción seleccionada

        // Verificar si se seleccionó una opción válida
        if (selectedValue) {
            // Crear dinámicamente un input con el valor seleccionado
            const inputHtml = `
                <div class="form-group col-md-12">
                    <label for="dpo-price-input">Precio seleccionado</label>
                    <input type="text" class="form-control" id="dpo-price-input" name="dpo-price-input" value="${selectedText}" readonly>
                </div>
            `;

            // Agregar el input al contenedor
            $("#dpo-input-container").html(inputHtml);
        } else {
            // Si no se selecciona una opción válida, limpiar el contenedor
            $("#dpo-input-container").empty();
        }
    });


    


  




    function calcularTotal() {
    let total = 0;

    // Sumar el valor del servicio Entrenamiento práctico PDP (id = 5) si está seleccionado
    if ($("#pdp-price-container").is(":visible")) {
        const pdpPrice = parseFloat($("#pdp-price").val()) || 0;
        total += pdpPrice;
    }

    // Sumar el valor seleccionado en el select de DPO
    const dpoOptionPrice = parseFloat($("#dpo-options").find("option:selected").text().replace(/[^0-9.]/g, "")) || 0;
    total += dpoOptionPrice;

    // Sumar los valores de todos los checkboxes seleccionados (excepto PDP)
    $(".form-check-input:checked").each(function () {
        const checkboxValue = parseFloat($(this).data("price")) || 0; // Asegúrate de que cada checkbox tenga un atributo `data-price` con el precio
        total += checkboxValue;
    });

    // Si no hay valores seleccionados, establecer el total en 0
    if (total === 0) {
        $("#total").val("0.00");
    } else {
        // Actualizar el campo total con el valor calculado
        $("#total").val(total.toFixed(2)); // Mostrar el total con 2 decimales
    }
}

// Detectar cambios en el select de precios DPO y recalcular el total
$("#dpo-options").on("change", function () {
    calcularTotal();
});

// Detectar cambios en los checkboxes y recalcular el total
$(".form-check-input").on("change", function () {
    const servicioId = $(this).val();

    // Si se selecciona el servicio Entrenamiento práctico PDP (id = 5)
    if (servicioId === "5" && $(this).is(":checked")) {
        // Mostrar el precio del servicio PDP
        cargarPrecioPDP();
    } else if (servicioId === "5" && !$(this).is(":checked")) {
        // Ocultar el precio del servicio PDP y recalcular el total
        $("#pdp-price-container").hide();
        $("#pdp-price").val("");
        calcularTotal();
    } else {
        // Recalcular el total para otros checkboxes
        calcularTotal();
    }
});

// Función para cargar el precio del Entrenamiento práctico PDP
function cargarPrecioPDP() {
    $.ajax({
        url: "../../controllers/serviciosC.php?op=precio_pdp", // Ruta al controlador para obtener el precio
        type: "POST",
        dataType: "json",
        success: function (data) {
            if (data && data.precio) {
                $("#pdp-price-container").show(); // Mostrar el input
                $("#pdp-price").val(data.precio); // Establecer el precio en el input
                calcularTotal(); // Recalcular el total
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al cargar el precio del Entrenamiento práctico PDP:", error);
        }
    });
}








    $("#prod_id").change(function(){
        $("#prod_id option:selected").each(function(){
            prod_id = $(this).val();

            $.post("../../controller/producto.php?op=mostrar",{prod_id:prod_id},function(data){
                data=JSON.parse(data);
                $('#cotd_precio').val(data.prod_precio);
            });
        })
    });

});