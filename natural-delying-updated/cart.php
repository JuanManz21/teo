<?php
require_once 'config.php';

// Procesar pedido
if (isset($_POST['checkout']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['id'];
    $products = json_encode($_SESSION['cart']);

    $sql = "INSERT INTO orders (user_id, products) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $products);

    if ($stmt->execute()) {
        // Limpiar carrito
        unset($_SESSION['cart']);
        header("Location: index.html?status=success");
    } else {
        echo "Error al procesar el pedido.";
    }
    $stmt->close();
    exit();
}

// Vaciar carrito
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Location: cart.php");
    exit();
}

// Obtener detalles de los productos en el carrito
$cart_products = [];
$total_price = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $product_ids = implode(',', array_map('intval', $_SESSION['cart']));
    $sql = "SELECT * FROM products WHERE id IN ($product_ids)";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $cart_products[] = $row;
        $total_price += $row['price'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natural Delying - Carrito</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <h1>NATURAL DELYING</h1>
        <nav>
            <a href="index.html">INICIO</a>
            <a href="productos.html">PRODUCTOS</a>
            <a href="cart.php">CARRITO (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
        </nav>
    </div>
    <div class="container">
        <h2>Carrito de Compras</h2>
        <?php if (!empty($cart_products)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_products as $product): ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3>Total: $<?php echo number_format($total_price, 2); ?></h3>
            <form action="cart.php" method="post">
                <button type="submit" name="checkout" class="btn">Finalizar Compra</button>
                <button type="submit" name="clear_cart" class="btn">Vaciar Carrito</button>
            </form>
        <?php else: ?>
            <p>Tu carrito está vacío.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
