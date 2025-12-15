<?php
session_start();

if (!isset($_SESSION['rol'])) {
    header("Location: login.html");
    exit;
}

include("conexion.php");

$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Productos | Market Plus</title>

<style>
body {
    background-image: url("fondowestcol.jpg");
    background-size: 200% 200%;
    animation: fondoSuave 12s ease infinite;
    min-height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
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
}

.header {
    text-align: center;
    padding: 20px;
    color: white;
    font-size: 24px;
    font-weight: bold;
}

table {
    width: 85%;
    margin: 30px auto;
    background: white;
    border-radius: 15px;
    border-collapse: collapse;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}

.btn {
    display: block;
    width: 220px;
    margin: 25px auto;
    padding: 12px;
    text-align: center;
    background: #007bff;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-size: 16px;
}

.btn:hover {
    background: #0056b3;
}
</style>
</head>

<body>

<img src="logomarketplus.png" class="logo">

<div class="header">Productos Registrados</div>

<table>
<tr>
    <th>ID</th>
    <th>Producto</th>
    <th>Precio</th>
    <th>Stock</th>
</tr>

<?php
if ($resultado && mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
            <td>{$fila['id']}</td>
            <td>{$fila['nombre']}</td>
            <td>$ {$fila['precio']}</td>
            <td>{$fila['stock']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay productos registrados.</td></tr>";
}
?>
</table>

<a class="btn" href="<?php 
    echo $_SESSION['rol'] === 'admin'
        ? 'panel_admin.php'
        : 'panel_trabajador.php';
?>">
    Volver al panel
</a>

</body>
</html>
