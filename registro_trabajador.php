<?php
$conexion = mysqli_connect("localhost", "root", "", "marketplus");

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql_user = "INSERT INTO usuarios (nombre, email, password, rol)
VALUES ('$nombre', '$email', '$password', 'trabajador')";

mysqli_query($conexion, $sql_user);

$usuario_id = mysqli_insert_id($conexion); 
$sql_trabajador = "INSERT INTO trabajadores (usuario_id, nombre, email, password)
VALUES ($usuario_id, '$nombre', '$email', '$password')";

if (mysqli_query($conexion, $sql_trabajador)) {
    echo "Trabajador registrado correctamente.<br><br>";
} else {
    echo "Error al registrar trabajador: " . mysqli_error($conexion);
}

echo "<a href='registro_trabajador.html'
style='padding:10px 15px; background:#007bff; color:white; text-decoration:none; border-radius:5px;'>Volver</a>";
?>
