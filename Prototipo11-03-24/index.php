<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Sistema de Gestión de Herramientas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .card-custom {
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            height: 200px; /* Altura ajustada */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center; /* Centrar el texto horizontalmente */
        }

        .card-custom:hover {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">Sistema de Gestión de Herramientas</h1>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center">
        <div class="col-md-5 mb-4">               
             <a href="entradas.php" class="card-link">
                    <div class="card-custom">
                        <h4>Entradas</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-5 mb-4">
                <a href="salidas.php" class="card-link">
                    <div class="card-custom">
                        <h4>Salidas</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-5 mb-4">
                <a href="inventario.php" class="card-link">
                    <div class="card-custom">
                        <h4>Inventario</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-5 mb-4">
                <a href="lista_trabajadores.php" class="card-link">
                    <div class="card-custom">
                        <h4>Lista de Trabajadores</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-3 mt-4">
        <div class="container">
            <p class="text-center">&copy; <?php echo date("Y"); ?> Sistema de Gestión de Herramientas</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
