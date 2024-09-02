<?php
include 'db_connect.php';

// Obtener productos de la base de datos
$sql = "SELECT id_producto, nombre_producto FROM Productos";
$stmt = $conn->query($sql);
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Formulario de Reclamos</h2>
<form method="post" action="procesar_reclamo.php">
    <label for="nombre_cliente">Nombre del Cliente:</label><br>
    <input type="text" id="nombre_cliente" name="nombre_cliente" required><br><br>

    <label for="email_cliente">Correo Electrónico:</label><br>
    <input type="email" id="email_cliente" name="email_cliente" required><br><br>

    <label for="telefono_cliente">Teléfono:</label><br>
    <input type="text" id="telefono_cliente" name="telefono_cliente"><br><br>

    <label for="id_producto">Nombre del Producto:</label><br>
    <select id="id_producto" name="id_producto" required>
        <option value="">Selecciona un producto</option>
        <?php foreach ($productos as $producto): ?>
            <option value="<?php echo $producto['id_producto']; ?>"><?php echo $producto['nombre_producto']; ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="descripcion">Descripción del Reclamo:</label><br>
    <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" value="Enviar Reclamo">
</form>
