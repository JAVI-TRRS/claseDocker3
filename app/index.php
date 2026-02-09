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
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        background: #f6f8fa;
        color: #222;
        margin: 0;
        padding: 2rem;
    }
    .container {
        max-width: 760px;
        margin: 0 auto;
        background: #fff;
        padding: 1.25rem 1.5rem;
        box-shadow: 0 6px 18px rgba(32,33,36,0.08);
        border-radius: 8px;
    }
    h2 {
        margin-top: 0;
        color: #0f172a;
        font-size: 1.25rem;
    }
    form {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    input[type="text"] {
        flex: 1;
        padding: 0.5rem 0.6rem;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 1rem;
    }
    button {
        background: #2563eb;
        color: #fff;
        border: none;
        padding: 0.55rem 0.9rem;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
    }
    button:hover { filter: brightness(0.95); }
    ul { list-style: none; padding: 0; margin: 0; }
    li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #eef2f7;
    }
    a { color: #ef4444; text-decoration: none; font-size: 1.05rem; }
    .footer-note { color: #6b7280; font-size: 0.9rem; margin-top: 0.75rem; }
</style>
<body>
<div class="container">

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

<p class="footer-note">Aplicación ejemplo con PHP y Docker.</p>

</div>
</body>
</html>
