<?php
session_start();

echo "<h2>Reclamos Realizados</h2>";

if (isset($_SESSION['reclamos']) && !empty($_SESSION['reclamos'])) {
    foreach ($_SESSION['reclamos'] as $index => $reclamo) {
        echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
        echo "<h3>Reclamo de " . htmlspecialchars($reclamo['nombre_cliente']) . "</h3>";
        echo "<p>Producto ID: " . htmlspecialchars($reclamo['id_producto']) . "</p>";
        echo "<p>Descripción: " . htmlspecialchars($reclamo['descripcion']) . "</p>";
        echo "<p>Fecha: " . htmlspecialchars($reclamo['fecha_reclamo']) . "</p>";
        echo "<form method='post' action='validar_reclamo.php'>";
        echo "<input type='hidden' name='index' value='$index'>";
        echo "<input type='submit' name='accion' value='Confirmar Reclamo'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<p>No hay reclamos registrados.</p>";
}
?>
