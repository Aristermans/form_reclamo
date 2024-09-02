<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['accion'] == "Reclamo Validado") {
    $index = $_POST['index'];
    $reclamo = $_SESSION['reclamos'][$index];
    $id_asistente = $_POST['id_asistente'];
    $modo_respuesta = $_POST['modo_respuesta'];
    $fecha_respuesta = date("Y-m-d");

    $sql = "INSERT INTO Reclamos (id_cliente, id_producto, fecha_reclamo, descripcion, modo_respuesta, fecha_respuesta, id_asistente) 
            VALUES (:id_cliente, :id_producto, :fecha_reclamo, :descripcion, :modo_respuesta, :fecha_respuesta, :id_asistente)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id_cliente' => $reclamo['id_cliente'],
        ':id_producto' => $reclamo['id_producto'],
        ':fecha_reclamo' => $reclamo['fecha_reclamo'],
        ':descripcion' => $reclamo['descripcion'],
        ':modo_respuesta' => $modo_respuesta,
        ':fecha_respuesta' => $fecha_respuesta,
        ':id_asistente' => $id_asistente
    ]);

    unset($_SESSION['reclamos'][$index]);
    echo "<p>Reclamo validado y guardado en la base de datos. El reclamo fue aceptado y está llegando a recursos.</p>";
}
?>
