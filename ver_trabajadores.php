<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    echo "Acceso denegado.";
    exit();
}

$query = "SELECT * FROM usuarios WHERE rol='trabajador'";
$resultado = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Trabajadores Registrados | Market Plus</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
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
            font-size: 22px;
            text-align: center;
            font-weight: bold;
        }

        table {
            width: 80%;
            margin: 40px auto 20px;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f2f6ff;
        }

        .btn {
            padding: 12px 20px;
            background: #1000eeff;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            display: block;
            width: 200px;
            margin: 30px auto;
            text-align: center;
            font-size: 16px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #0044ffff;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <img src="logomarketplus.png" alt="Market Plus" class="logo">

    <div class="header">Trabajadores Registrados</div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>

        <?php
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td>{$fila['id']}</td>
                        <td>{$fila['nombre']}</td>
                        <td>{$fila['email']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay trabajadores registrados.</td></tr>";
        }
        ?>
    </table>

    <a class="btn" href="panel_admin.php">Volver al panel</a>

</body>
</html>
