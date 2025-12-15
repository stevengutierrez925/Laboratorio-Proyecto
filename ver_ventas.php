<?php
session_start();
include("conexion.php");

$sql = "SELECT v.id, p.nombre producto, v.cantidad,
        (p.precio*v.cantidad) total, v.fecha
        FROM ventas v
        JOIN productos p ON p.id=v.producto_id";

$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Ventas | Market Plus</title>

<style>
 body {
    background-image: url("fondowestcol.jpg");
    background-size: 200% 200%;
    animation: fondoSuave 12s ease infinite;
    min-height: 100vh;
}@keyframes fondoSuave {
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

h2 {
    text-align: center;
    color: black;
    padding: 20px;
}

table {
    width: 80%;
    margin: auto;
    background: white;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
}
.btn:hover {
    background: #0056b3;
    transform: translateY(-2px);

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


th, td {
    padding: px;
    text-align: center;
    background: white
   
}


</style>
</head>

<body>

<img src="logomarketplus.png" class="logo">

<h2>Registro de Ventas</h2>

<table>
<tr>
<th>ID</th><th>Producto</th><th>Cantidad</th><th>Total</th><th>Fecha</th>
</tr>

<?php while ($fila = $resultado->fetch_assoc()) { ?>
<tr>
<td><?= $fila['id'] ?></td>
<td><?= $fila['producto'] ?></td>
<td><?= $fila['cantidad'] ?></td>
<td>$<?= $fila['total'] ?></td>
<td><?= $fila['fecha'] ?></td>
</tr>
<?php } ?>
</table>
<a class="btn" href="panel_admin.php">Volver al panel</a>


</body>
</html>
