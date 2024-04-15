

function llenarTablaEntradas() {
    // Obtener el elemento tbody de la tabla
    var tbody = document.querySelector("#historialEntradas tbody");
    // Limpiar cualquier contenido previo
    tbody.innerHTML = "";

    // Realizar una solicitud AJAX para obtener los datos del historial de entradas desde la base de datos
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var datosEntradas = JSON.parse(this.responseText);
            // Iterar sobre los datos y agregar filas a la tabla
            datosEntradas.forEach(function(entrada) {
                var fila = "<tr>";
                fila += "<td>" + entrada.nombre + "</td>";
                fila += "<td>" + entrada.fecha_entrada + "</td>";
                fila += "<td>" + entrada.id_empleado + "</td>";
                fila += "</tr>";
                tbody.innerHTML += fila;
            });
        }
    };
    xhttp.open("GET", "obtener_entradas.php", true);
    xhttp.send();
}

// Función para llenar la tabla con el historial de salidas desde la base de datos
function llenarTablaSalidas() {
    // Obtener el elemento tbody de la tabla
    var tbody = document.querySelector("#historialSalidas tbody");
    // Limpiar cualquier contenido previo
    tbody.innerHTML = "";

    // Realizar una solicitud AJAX para obtener los datos del historial de salidas desde la base de datos
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var datosSalidas = JSON.parse(this.responseText);
            // Iterar sobre los datos y agregar filas a la tabla
            datosSalidas.forEach(function(salida) {
                var fila = "<tr>";
                fila += "<td>" + salida.nombre + "</td>";
                fila += "<td>" + salida.fecha_salida + "</td>";
                fila += "<td>" + salida.id_empleado + "</td>";
                fila += "</tr>";
                tbody.innerHTML += fila;
            });
        }
    };
    xhttp.open("GET", "obtener_salidas.php", true);
    xhttp.send();
}

// Llenar la tabla de entradas al cargar la página
llenarTablaEntradas();

// Llenar la tabla de salidas al cargar la página
llenarTablaSalidas();
