<?php
session_start();
require_once "config.php";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'admin'){
    header("location: login.php");
    exit;
}

// Delete user logic
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])){
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_user_id);

        $param_user_id = $user_id;

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }
}

// Fetch users
$sql_users = "SELECT * FROM users";
$users = array();
if($result_users = mysqli_query($link, $sql_users)){
    while($row = mysqli_fetch_assoc($result_users)){
        $users[] = $row;
    }
    mysqli_free_result($result_users);
}

// Fetch orders
$sql_orders = "SELECT * FROM orders ORDER BY created_at DESC";
$orders = array();
if($result_orders = mysqli_query($link, $sql_orders)){
    while($row = mysqli_fetch_assoc($result_orders)){
        $orders[] = $row;
    }
    mysqli_free_result($result_orders);
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .admin-container { max-width: 1000px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .admin-section { margin-bottom: 40px; }
        .admin-section h2 { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border-bottom: 1px solid #eee; text-align: left; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>PANEL DE ADMINISTRACIÓN</h1>
        <nav>
            <a href="index.php">INICIO</a>
            <a href="productos.php">PRODUCTOS</a>
            <a href="cart.php">CARRITO</a>
        </nav>
        <div class="user-icon">
            <a href="logout.php">Cerrar Sesión</a>
        </div>
    </div>
    <div class="container">
        <div class="admin-container">
            <div class="admin-section">
                <h2>Usuarios Registrados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['created_at']; ?></td>
                            <td>
                                <?php if($user['role'] !== 'admin'): ?>
                                <form action="admin.php" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" name="delete_user" class="btn">Eliminar</button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="admin-section">
                <h2>Pedidos Recientes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>ID Usuario</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['user_id']; ?></td>
                            <td>$<?php echo number_format($order['total'], 2); ?></td>
                            <td><?php echo $order['created_at']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>