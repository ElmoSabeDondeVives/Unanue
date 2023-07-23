const save_service = () =>{
    let boton = 'save_servicebtn';
    let valor = true;
    let name_service = $('#name_service').val();

    valor = validar_campo_vacio('name_service',name_service,valor);
    if(valor) {
        $.ajax({
            type: "POST",
            url: urlweb + "api/Logistica/save_service",
            data: {
                'name_service': name_service
            },
            dataType: 'json',
            beforeSend: () => {
                cambiar_estado_boton(boton, 'Guardando', true);
            },
            success: (r) => {
                switch (r.result.code) {
                    case 1:
                        respuesta('Guardado Exitósamente', 'success');
                        setTimeout(() => {
                            location.reload()
                        }, 1000)
                        break;
                    case 2:
                        respuesta( 'Error al guardar Servicio', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;

                    default:
                        respuesta( 'Error al guardar Servicio', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;
                }
            }
        });
    }
}
const save_espe = () =>{
    let boton = 'save_espebtn';
    let valor = true;
    let name_espe = $('#name_espe').val();

    valor = validar_campo_vacio('name_espe',name_espe,valor);
    if(valor) {
        $.ajax({
            type: "POST",
            url: urlweb + "api/Logistica/save_espe",
            data: {
                'name_espe': name_espe
            },
            dataType: 'json',
            beforeSend: () => {
                cambiar_estado_boton(boton, 'Guardando', true);
            },
            success: (r) => {
                switch (r.result.code) {
                    case 1:
                        respuesta('Guardado Exitósamente', 'success');
                        setTimeout(() => {
                            location.reload()
                        }, 1000)
                        break;
                    case 2:
                        respuesta( 'Error al guardar Servicio', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;

                    default:
                        respuesta( 'Error al guardar Servicio', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;
                }
            }
        });
    }
}
const save_edit_service = () =>{
    let boton = 'save_servicebtn';
    let valor = true;
    let id_service = $('#id_servicio').val();
    let name_service = $('#name_edit_service').val();
    let estado_service = $('#estado_edit_service').val();

    valor = validar_campo_vacio('name_service',name_service,valor);
    if(valor) {
        $.ajax({
            type: "POST",
            url: urlweb + "api/Logistica/save_edit_service",
            data: {
                'id_service': id_service,
                'name_service': name_service,
                'estado_service': estado_service
            },
            dataType: 'json',
            beforeSend: () => {
                cambiar_estado_boton(boton, 'Guardando', true);
            },
            success: (r) => {
                switch (r.result.code) {
                    case 1:
                        respuesta('Guardado Exitósamente', 'success');
                        setTimeout(() => {
                            location.reload()
                        }, 1000)
                        break;
                    case 2:
                        respuesta( 'Error al guardar Servicio', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;

                    default:
                        respuesta( 'Error al guardar Servicio', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;
                }
            }
        });
    }
}
const save_edit_espe = () =>{
    let boton = 'save_espebtn';
    let valor = true;
    let id_especialidad = $('#id_especialidad').val();
    let name_edit_espe = $('#name_edit_espe').val();
    let estado_edit_espe = $('#estado_edit_espe').val();

    valor = validar_campo_vacio('name_edit_espe',name_edit_espe,valor);
    if(valor) {
        $.ajax({
            type: "POST",
            url: urlweb + "api/Logistica/save_edit_espe",
            data: {
                'id_especialidad':id_especialidad,
                'name_especialidad': name_edit_espe,
                'estado_especialidad': estado_edit_espe
            },
            dataType: 'json',
            beforeSend: () => {
                cambiar_estado_boton(boton, 'Guardando', true);
            },
            success: (r) => {
                switch (r.result.code) {
                    case 1:
                        respuesta('Guardado Exitósamente', 'success');
                        setTimeout(() => {
                            location.reload()
                        }, 1000)
                        break;
                    case 2:
                        respuesta( 'Error al guardar Especialidad', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;

                    default:
                        respuesta( 'Error al guardar Servicio', 'error');
                        cambiar_estado_boton(boton, 'Guardar Servicio', false);
                        break;
                }
            }
        });
    }
}
const data_service=(id,nombre,estado)=>{
    $('#id_servicio').val(id)
    $('#name_edit_service').val(nombre)
    $('#estado_edit_service').val(estado)
    $('#edit_service').modal('show');
}
const data_espe=(id,nombre,estado)=>{
    $('#id_especialidad').val(id)
    $('#name_edit_espe').val(nombre)
    $('#estado_edit_espe').val(estado)
    $('#edit_especialidad').modal('show');
}