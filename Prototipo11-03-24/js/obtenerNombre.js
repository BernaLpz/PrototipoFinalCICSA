// Obtener el nombre de la herramienta mediante una solicitud AJAX
function obtenerNombreHerramienta(idHerramienta) {
    // Hacer una solicitud AJAX
    var xhr = new XMLHttpRequest();

    // Especificar la URL del archivo PHP que manejará la solicitud y enviar los datos como parámetros
    xhr.open("GET", "php/obtener_nombre_herramienta.php?idHerramienta=" + idHerramienta, true);

    // Definir lo que sucede cuando la solicitud se completa
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Actualizar el campo de nombre de la herramienta con la respuesta del servidor
            document.getElementById("nombreHerramienta").value = xhr.responseText;
        }
    };

    // Enviar la solicitud
    xhr.send();
}
