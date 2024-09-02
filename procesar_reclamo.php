<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_cliente = $_POST['nombre_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    $id_producto = $_POST['id_producto'];
    $descripcion = $_POST['descripcion'];
    $fecha_reclamo = date("Y-m-d");

    $nuevo_reclamo = [
        "nombre_cliente" => $nombre_cliente,
        "email_cliente" => $email_cliente,
        "telefono_cliente" => $telefono_cliente,
        "id_producto" => $id_producto,
        "descripcion" => $descripcion,
        "fecha_reclamo" => $fecha_reclamo
    ];

    $_SESSION['reclamos'][] = $nuevo_reclamo;

    header("Location: ver_reclamos.php");
    exit();
}
?>
