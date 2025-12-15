<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != "trabajador") {
    header("Location: login.html");
    exit;
}

$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];

$consulta = mysqli_query($conexion, "SELECT * FROM productos WHERE id = $producto_id");
$producto = mysqli_fetch_assoc($consulta);

if (!$producto) {
    $error = "El producto no existe.";
} elseif ($producto['stock'] < $cantidad) {
    $error = "No hay stock suficiente.";
} else {

    $nuevo_stock = $producto['stock'] - $cantidad;
    mysqli_query($conexion, "UPDATE productos SET stock = $nuevo_stock WHERE id = $producto_id");

    mysqli_query(
        $conexion,
        "INSERT INTO ventas (producto_id, cantidad, fecha) VALUES ($producto_id, $cantidad, NOW())"
    );

    $exito = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Resultado de la venta</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-image: url("fondowestcol.jpg");
    background-size: 200% 200%;
    animation: fondoSuave 12s ease infinite;
    min-height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
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
}

.card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(0,0,0,0.25);
    width: 380px;
    text-align: center;
}

h2 {
    margin-top: 0;
}

.btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 22px;
    background: #28a745;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-size: 16px;
}

.btn:hover {
    background: #218838;
}

.error {
    color: red;
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

<div class="card">
    <?php if (isset($error)) { ?>
        <h2 class="error"><?= $error ?></h2>
        <a href="vender.php" class="btn back">Volver</a>
    <?php } else { ?>
        <h2 style="color:green;">Venta realizada correctamente</h2>
        <a href="panel_trabajador.php" class="btn">Volver al panel</a>
    <?php } ?>
</div>

</body>
</html>
