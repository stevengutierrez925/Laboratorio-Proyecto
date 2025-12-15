<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    echo "Acceso denegado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración | Market Plus</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url("fondowestcol.jpg");
            background-size: 200% 200%;
            animation: fondoSuave 12s ease infinite;
            min-height: 100vh;
        }

        @keyframes fondoSuave {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .logo {
            position: fixed;
            top: 15px;
            left: 20px;
            width: 120px;
            z-index: 10;
            filter: drop-shadow(0 4px 10px rgba(0,0,0,0.6));
        }

        .header {
            background: rgba(0,0,0,0.35);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            margin: 50px auto;
            width: 80%;
            text-align: center;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 10px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .logout {
            background: #dc3545;
        }

        .logout:hover {
            background: #a71d2a;
        }
    </style>
</head>

<body>

    <img src="logomarketplus.png" alt="Market Plus" class="logo">

    <div class="header">Panel de Administración</div>

    <div class="container">
        <div class="card">
            <h2>Bienvenido, Admin</h2>

            <a href="ver_trabajadores.php" class="btn">Ver Trabajadores</a>
            <a href="registro_trabajador.html" class="btn">Registrar Trabajador</a>
            <a href="ver_productos.php" class="btn">Ver Productos</a>
            <a href="agregar_producto.html" class="btn">Agregar Producto</a>
            <a href="ver_ventas.php" class="btn">Ver Ventas</a>

            <br><br>

            <a href="logout.php" class="btn logout">Cerrar Sesión</a>
        </div>
    </div>

</body>
</html>
