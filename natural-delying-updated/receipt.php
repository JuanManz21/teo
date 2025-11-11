<?php
session_start();
require_once "config.php";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(!isset($_GET['order_id'])){
    header("location: index.php");
    exit;
}

$order_id = $_GET['order_id'];

$sql = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
$sql_items = "SELECT * FROM order_items WHERE order_id = ?";

$order = null;
$order_items = array();

if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "ii", $param_order_id, $param_user_id);

    $param_order_id = $order_id;
    $param_user_id = $_SESSION['id'];

    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $order = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
}

if($stmt_items = mysqli_prepare($link, $sql_items)){
    mysqli_stmt_bind_param($stmt_items, "i", $param_order_id);

    $param_order_id = $order_id;

    if(mysqli_stmt_execute($stmt_items)){
        $result = mysqli_stmt_get_result($stmt_items);
        while($row = mysqli_fetch_assoc($result)){
            $order_items[] = $row;
        }
    }
    mysqli_stmt_close($stmt_items);
}

mysqli_close($link);

if(!$order){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Compra</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .receipt-container { max-width: 600px; margin: 50px auto; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        .receipt-header { text-align: center; margin-bottom: 30px; }
        .receipt-header h2 { margin: 0; font-size: 28px; }
        .receipt-details p { margin: 5px 0; font-size: 16px; }
        .receipt-items { margin-top: 30px; }
        .receipt-items table { width: 100%; border-collapse: collapse; }
        .receipt-items th, .receipt-items td { padding: 10px; border-bottom: 1px solid #eee; text-align: left; }
        .receipt-total { text-align: right; margin-top: 20px; font-size: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>NATURAL DELYING</h1>
        <nav>
            <a href="index.php">INICIO</a>
            <a href="productos.php">PRODUCTOS</a>
            <a href="cart.php">CARRITO</a>
        </nav>
        <div class="user-icon">
            <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                <a href="logout.php">Cerrar Sesión</a>
            <?php else: ?>
                👤
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="receipt-container">
            <div class="receipt-header">
                <h2>Recibo de Compra</h2>
            </div>
            <div class="receipt-details">
                <p><strong>Pedido #:</strong> <?php echo $order['id']; ?></p>
                <p><strong>Fecha:</strong> <?php echo $order['created_at']; ?></p>
            </div>
            <div class="receipt-items">
                <table>
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($order_items as $item): ?>
                        <tr>
                            <td>
                                <?php
                                    $product_sql = "SELECT name FROM products WHERE id = ?";
                                    $product_name = "";
                                    if($product_stmt = mysqli_prepare($link, $product_sql)){
                                        mysqli_stmt_bind_param($product_stmt, "i", $item['product_id']);
                                        if(mysqli_stmt_execute($product_stmt)){
                                            $product_result = mysqli_stmt_get_result($product_stmt);
                                            $product = mysqli_fetch_assoc($product_result);
                                            $product_name = $product['name'];
                                        }
                                        mysqli_stmt_close($product_stmt);
                                    }
                                    echo $product_name;
                                ?>
                            </td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="receipt-total">
                <p>Total: $<?php echo number_format($order['total'], 2); ?></p>
            </div>
        </div>
    </div>
</body>
</html>