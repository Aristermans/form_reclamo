<?php
$serverName = "sql8020.site4now.net";
$database = "db_aaca9d_ventas";
$username = "db_aaca9d_ventas_admin";
$password = "pat1julioick";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
