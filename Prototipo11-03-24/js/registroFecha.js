// Función para obtener la hora actual en formato HH:MM AM/PM
function obtenerHoraActual() {
    var ahora = new Date();
    var hora = ahora.getHours();
    var minuto = ahora.getMinutes();
    var periodo = hora >= 12 ? 'PM' : 'AM';

    // Convertir la hora a formato de 12 horas
    hora = hora % 12;
    hora = hora ? hora : 12; // Si es 0, lo cambiamos a 12

    // Formatear los minutos para que tengan siempre dos dígitos
    minuto = minuto < 10 ? '0' + minuto : minuto;

    var horaActual = hora + ':' + minuto + ' ' + periodo;

    return horaActual;
}

// Función para obtener la fecha actual en formato DD/MM/YYYY
function obtenerFechaActual() {
    var ahora = new Date();
    var dia = ahora.getDate();
    var mes = ahora.getMonth() + 1; // El mes comienza desde 0
    var año = ahora.getFullYear();

    // Formatear el día y el mes para que tengan siempre dos dígitos
    if (dia < 10) {
        dia = '0' + dia;
    }
    if (mes < 10) {
        mes = '0' + mes;
    }

    var fechaActual = dia + "/" + mes + "/" + año;

    return fechaActual;
}

// Al cargar la página, obtener la fecha y hora actual y colocarla en el formulario
window.onload = function() {
    var inputHora = document.getElementById("hora");
    var inputFecha = document.getElementById("fecha");
    inputHora.value = obtenerHoraActual();
    inputFecha.value = obtenerFechaActual();

    // Adicionalmente, establecer los valores de hora y fecha en campos ocultos
    document.getElementById("hora_hidden").value = inputHora.value;
    document.getElementById("fecha_hidden").value = inputFecha.value;
};

