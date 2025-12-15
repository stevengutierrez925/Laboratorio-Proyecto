<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != "trabajador") {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel de Trabajador | Market Plus</title>

<style>
* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-image: url("fondowestcol.jpg");

    margin: 0;
    min-height: 100vh;
    background-size: 200% 200%;
    animation: fondo 12s ease infinite;

    display: flex;
    justify-content: center;
    align-items: center;
}

@keyframes fondo {
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

.container {
    width: 420px;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    text-align: center;
}

h2 {
    margin-top: 0;
    color: #007bff;
}

.bienvenido {
    margin: 15px 0 20px;
    color: #333;
    font-size: 17px;
}

.btn {
    display: block;
    width: 85%;
    margin: 15px auto;
    padding: 12px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-size: 16px;
    cursor: pointer;
    border: none;
    transition: 0.2s;
}

.btn:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

.logout-btn {
    background: #dc3545;
}

.logout-btn:hover {
    background: #b02a37;
}
</style>
</head>

<body>

<img src="logomarketplus.png" alt="Market Plus" class="logo">

<div class="container">
    <h2>Panel de Trabajador</h2>

    <p class="bienvenido">
        Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>
    </p>

    <a href="ver_productos.php" class="btn">Ver Productos</a>
    <a href="vender.php" class="btn">Registrar Venta</a>

    <form action="logout.php" method="POST">
        <button type="submit" class="btn logout-btn">Cerrar Sesión</button>
    </form>
</div>

</body>
</html>
