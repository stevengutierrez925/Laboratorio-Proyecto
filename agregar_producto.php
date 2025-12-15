<?php
$conexion = mysqli_connect("localhost", "root", "", "marketplus");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock)
            VALUES ('$nombre', '$descripcion', '$precio', '$stock')";

    if (mysqli_query($conexion, $sql)) {
        $mensaje = "Producto agregado correctamente.";
    } else {
        $mensaje = "Error: " . mysqli_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agregar Producto</title>

<style>
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

    .container {
        width: 420px;
        margin: 60px auto;
        border-radius: 15px;
    }

    h2 {
        text-align: center;
        color: #000000ff;
        margin-bottom: 20px;
        font-size: 50px;
    }

    label {
        font-weight: bold;
        margin-top: 5px;
        display: block;
    }

    input, textarea {
        width: 100%;
        padding: 12px;
        margin-top: 5px;
        border: 1px solid #000000ff;
        border-radius: 8px;
        font-size: 16px;
    }

    button {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        background: #007bff;
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    .mensaje {
        margin-top: 15px;
        padding: 10px;
        background: #d4edda;
        color: #155724;
        border-radius: 8px;
        border: 1px solid #28a745;
        text-align: center;
    }

    .volver {
        display: block;
        margin-top: 20px;
        text-align: center;
        background: #0088ffff;
        padding: 10px;
        color: white;
        border-radius: 8px;
        text-decoration: none;
    }

    .volver:hover {
        background: #0091ffff;
    }
</style>

</head>
<body>

<div class="container">

    <h2>Agregar Producto</h2>

    <?php if (!empty($mensaje)) { ?>
        <div class="mensaje"><?php echo $mensaje; ?></div>
    <?php } ?>

    <form method="POST">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Descripción</label>
        <textarea name="descripcion" rows="4" required></textarea>

        <label>Precio</label>
        <input type="number" step="0.01" name="precio" required>

        <label>Stock</label>
        <input type="number" name="stock" required>

        <button type="submit">Guardar Producto</button>
    </form>

    <a class="volver" href="panel_admin.php">Volver</a>

</div>

</body>
</html>
