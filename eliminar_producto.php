<?php
$conexion = mysqli_connect("localhost", "root", "", "marketplus");

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);

    mysqli_query($conexion, "DELETE FROM ventas WHERE producto_id = $id");

    $query = "DELETE FROM productos WHERE id = $id";
    if(mysqli_query($conexion, $query)) {
        header("Location: ver_productos.php?mensaje=eliminado");
        exit();
    } else {
        echo "Error al eliminar producto: " . mysqli_error($conexion);
    }
} else {
    echo "ID no recibido.";
}
?>
