$("#info_medico").on('submit', function(e){
    e.preventDefault();
    var valor = true;
    //Definimos el botón que activa la función
    var boton = "btn-save-medic";
    //Extraemos las variable según los valores del campo consultado
    var dni_medico = $('#dni_medico').val();
    var nombre_medico = $('#nombre_medico').val();
    var apellidos_medico = $('#apellidos_medico').val();
    var direccion_medico = $('#direccion_medico').val();
    var email_medico = $('#email_medico').val();
    var id_especialidad = $('#id_especialidad').val();

    //Validamos si los campos a usar no se encuentran vacios
    valor = validar_campo_vacio('dni_medico', dni_medico, valor);
    valor = validar_campo_vacio('nombre_medico', nombre_medico, valor);
    valor = validar_campo_vacio('apellidos_medico', apellidos_medico, valor);
    valor = validar_campo_vacio('id_especialidad', id_especialidad, valor);
    //Si var valor no ha cambiado de valor, procedemos a hacer la llamada de ajax
    if(valor){
        //Cadena donde enviaremos los parametros por POST
        $.ajax({
            type: "POST",
            url: urlweb + "api/Medicos/save_medic",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            dataType: 'json',
            beforeSend: function () {
                cambiar_estado_boton(boton, 'Guardando...', true);
            },
            success:function (r) {
                cambiar_estado_boton(boton, "<i class=\"fa fa-save fa-sm text-white-50\"></i> Guardar", false);
                switch (r.result.code) {
                    case 1:
                        respuesta('¡Informacion Guardada Correctamente! Recargando...', 'success');

                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                        break;
                    case 2:
                        respuesta('Error al guardar información', 'error');
                        break;

                    default:
                        respuesta('¡Algo catastrofico ha ocurrido!', 'error');
                        break;
                }
            }
        });
    }
});