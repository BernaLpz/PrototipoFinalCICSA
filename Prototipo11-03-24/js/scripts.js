// Array para almacenar los registros (simulación de base de datos)
let registros = [];

// Función para registrar la entrada de una herramienta
function registrarEntrada() {
    const toolName = document.getElementById('toolName').value;
    const quantity = parseInt(document.getElementById('quantity').value);

    if (toolName && quantity > 0) {
        const registro = {
            toolName: toolName,
            quantity: quantity,
            type: 'Entrada',
            dateTime: new Date().toLocaleString()
        };
        registros.push(registro);
        actualizarTabla();
        limpiarFormulario();
    } else {
        alert('Por favor, complete todos los campos correctamente.');
    }
}

// Función para registrar la salida de una herramienta
function registrarSalida() {
    const toolName = document.getElementById('toolName').value;
    const quantity = parseInt(document.getElementById('quantity').value);

    if (toolName && quantity > 0) {
        const registro = {
            toolName: toolName,
            quantity: quantity,
            type: 'Salida',
            dateTime: new Date().toLocaleString()
        };
        registros.push(registro);
        actualizarTabla();
        limpiarFormulario();
    } else {
        alert('Por favor, complete todos los campos correctamente.');
    }
}

// Función para limpiar el formulario después de registrar una herramienta
function limpiarFormulario() {
    document.getElementById('toolName').value = '';
    document.getElementById('quantity').value = 1;
}

// Función para actualizar la tabla de registros
function actualizarTabla() {
    const tablaRegistros = document.getElementById('registros');
    tablaRegistros.innerHTML = '';

    registros.forEach(registro => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${registro.toolName}</td>
            <td>${registro.quantity}</td>
            <td>${registro.type}</td>
            <td>${registro.dateTime}</td>
        `;
        tablaRegistros.appendChild(row);
    });
}

// Función para pedir una herramienta
function pedirHerramienta() {
    const toolName = document.getElementById('toolName').value;
    const quantity = parseInt(document.getElementById('quantity').value);

    if (toolName && quantity > 0) {
        // Aquí se podría enviar la solicitud al servidor para pedir la herramienta
        alert(`Se ha solicitado ${quantity} ${toolName}`);
        limpiarFormulario('toolName', 'quantity');
    } else {
        alert('Por favor, complete todos los campos correctamente.');
    }
}

// Función para entregar una herramienta
function entregarHerramienta() {
    const toolID = document.getElementById('toolID').value;

    if (toolID) {
        // Aquí se podría enviar la solicitud al servidor para entregar la herramienta
        alert(`Se ha entregado la herramienta con ID: ${toolID}`);
        limpiarFormulario('toolID');
    } else {
        alert('Por favor, ingrese el ID de la herramienta.');
    }
}
