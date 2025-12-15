<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != "trabajador") {
    header("Location: login.html");
    exit;
}

$productos = mysqli_query($conexion, "SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vender producto</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("fondowestcol.jpg");
            background-size: 200% 200%;
            animation: fondoSuave 12s ease infinite;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        @keyframes fondoSuave {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .logo {
            position: fixed;
            top: 15px;
            left: 20px;
            width: 120px;
            z-index: 1000;
        }

        .box {
            width: 400px;
            margin: 100px auto;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.25);
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #333;
        }

        label {
            font-size: 14px;
            font-weight: bold;
        }

        select, input {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 14px;
            border-radius: 8px;
            border: 1px solid #000000ff;
            font-size: 15px;
        }

        button, .btn {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 12px;
            border: none;
            margin-top: 10px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-size: 16px;
        }

        button:hover, .btn:hover {
            background: #218838;
        }

        .back {
            background: #17a2b8;
        }

        .back:hover {
            background: #138496;
        }
    </style>
</head>

<body>

<img src="logomarketplus.png" class="logo">

<div class="box">
    <h2>Registrar venta</h2>

    <form action="vender_accion.php" method="POST">

        <label>Producto:</label>
        <select name="producto_id" required>
            <option value="">Seleccionar...</option>
            <?php while ($p = mysqli_fetch_assoc($productos)) { ?>
                <option value="<?php echo $p['id']; ?>">
                    <?php echo $p['nombre']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Cantidad vendida:</label>
        <input type="number" name="cantidad" min="1" required>

        <button type="submit">Vender</button>
    </form>

    <a class="btn back" href="panel_trabajador.php">Volver</a>
</div>

</body>
</html>
