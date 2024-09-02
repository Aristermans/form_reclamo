<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['index'];

    if ($_POST['accion'] == "Confirmar Reclamo") {
        $reclamo = $_SESSION['reclamos'][$index];
        echo "<h2>Validar Reclamo</h2>";
        echo "<form method='post' action='guardar_reclamo.php'>";
        echo "<label for='nombre_cliente'>Nombre del Cliente:</label><br>";
        echo "<input type='text' id='nombre_cliente' name='nombre_cliente' value='" . htmlspecialchars($reclamo['nombre_cliente']) . "' readonly><br><br>";

        echo "<label for='id_asistente'>ID del Asistente:</label><br>";
        echo "<input type='text' id='id_asistente' name='id_asistente' required><br><br>";

        echo "<label for='modo_respuesta'>Modo de Respuesta:</label><br>";
        echo "<select id='modo_respuesta' name='modo_respuesta' required>";
        echo "<option value='correo'>Correo</option>";
        echo "<option value='teléfono'>Teléfono</option>";
        echo "<option value='legal'>Legal</option>";
        echo "</select><br><br>";

        echo "<input type='hidden' name='index' value='$index'>";
        echo "<input type='submit' name='accion' value='Reclamo Validado'>";
        echo "<input type='submit' name='accion' value='Reclamo Invalidado'>";
        echo "</form>";
    } elseif ($_POST['accion'] == "Reclamo Invalidado") {
        unset($_SESSION['reclamos'][$index]);
        echo "<p>Reclamo eliminado.</p>";
    }
}
?>
