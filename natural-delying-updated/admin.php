<?php
require_once 'config.php';

// Verificar si el usuario es administrador
if (!isset($_SESSION['loggedin']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php");
    exit();
}

// Eliminar usuario
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php");
    exit();
}

// Cancelar pedido
if (isset($_POST['cancel_order'])) {
    $order_id = $_POST['order_id'];
    $sql = "UPDATE orders SET status = 'cancelled' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->close();
    header("Location: admin.php");
    exit();
}

// Obtener usuarios y pedidos
$users_result = $conn->query("SELECT id, username FROM users WHERE is_admin = 0");
$orders_result = $conn->query("SELECT o.id, u.username, o.products, o.status FROM orders o JOIN users u ON o.user_id = u.id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natural Delying - Panel de Administración</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <h1>PANEL DE ADMINISTRACIÓN</h1>
        <nav>
            <a href="index.html">VER SITIO</a>
            <a href="logout.php">CERRAR SESIÓN</a>
        </nav>
    </div>
    <div class="container">
        <h2>Gestión de Usuarios</h2>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = $users_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $user['username']; ?></td>
                        <td>
                            <form action="admin.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="delete_user" class="btn">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Gestión de Pedidos</h2>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Productos</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php while($order = $orders_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $order['username']; ?></td>
                        <td><?php echo $order['products']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td>
                            <?php if ($order['status'] !== 'cancelled'): ?>
                                <form action="admin.php" method="post">
                                    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                    <button type="submit" name="cancel_order" class="btn">Cancelar</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
