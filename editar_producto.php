<?php
$conexion = mysqli_connect("localhost", "root", "", "marketplus");

if (!isset($_GET['id'])) {
    echo "Error: ID no recibido.";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM productos WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);
$producto = mysqli_fetch_assoc($resultado);

if (!$producto) {
    echo "Error: Producto no encontrado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"]; 

    $sql_update = "UPDATE productos 
                   SET nombre='$nombre', precio='$precio', stock='$stock' 
                   WHERE id=$id";

    if (mysqli_query($conexion, $sql_update)) {
        echo "<script>alert('Producto actualizado!'); window.location='ver_productos.php';</script>";
        exit;
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Producto</title>
<style>
body { font-family: Arial; background: #f0f2f5; margin: 0; }
.container {
    width: 400px; margin: 50px auto; background: white; padding: 20px;
    border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2);
}
input, button {
    width: 100%; padding: 10px; margin-top: 10px;
    border: 1px solid #ccc; border-radius: 5px;
}
button { background: #17a2b8; color: white; cursor: pointer; }
button:hover { background: #117a8b; }
</style>
</head>

<body>
<div class="container">
    <h2>Editar Producto</h2>

    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>

        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required>

        <button type="submit">Guardar Cambios</button>
    </form>

    <br>
    <a href="ver_productos.php">Volver</a>
</div>
</body>
</html>
