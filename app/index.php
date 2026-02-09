<?php
include "db.php";

/* Crear */
if (isset($_POST["crear"])) {
    $nombre = $_POST["nombre"];
    $conn->query("INSERT INTO personas (nombre) VALUES ('$nombre')");
}

/* Borrar */
if (isset($_GET["borrar"])) {
    $id = $_GET["borrar"];
    $conn->query("DELETE FROM personas WHERE id=$id");
}

/* Obtener datos */
$resultado = $conn->query("SELECT * FROM personas");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP + Docker</title>
</head>
<body>

<h2>Crear persona</h2>

<form method="POST">
    <input type="text" name="nombre" required>
    <button type="submit" name="crear">Guardar</button>
</form>

<h2>Lista de personas</h2>

<ul>
<?php while ($fila = $resultado->fetch_assoc()): ?>
    <li>
        <?= $fila["nombre"] ?>
        <a href="?borrar=<?= $fila["id"] ?>">❌</a>
    </li>
<?php endwhile; ?>
</ul>

</body>
</html>
