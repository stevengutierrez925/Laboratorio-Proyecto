<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        $usuario = mysqli_fetch_assoc($resultado);

        if (empty($usuario['rol'])) {
            echo "Error: el usuario no tiene rol asignado.";
            exit();
        }

        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] == "admin") {
            header("Location: panel_admin.php");
            exit();
        } elseif ($usuario['rol'] == "trabajador") {
            header("Location: panel_trabajador.php");
            exit();
        } else {
            echo "Rol desconocido en el sistema.";
            exit();
        }

    } else {
        echo "Email o contraseña incorrectos. <br><a href='login.html'>Volver</a>";
    }

    mysqli_close($conexion);
}
?>
