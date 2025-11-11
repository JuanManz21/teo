<?php
require_once 'config.php';

// Añadir producto al carrito
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Añadir producto al carrito
    $_SESSION['cart'][] = $product_id;
    header("Location: frutos-secos.php");
    exit();
}

// Obtener productos de la categoría 'fruto-seco'
$sql = "SELECT * FROM products WHERE category = 'fruto-seco'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natural Delying - Frutos Secos</title>
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
        <h2>Catálogo de Frutos Secos</h2>
        <div class="juice-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while($product = $result->fetch_assoc()): ?>
                    <div class="juice-item">
                        <div class="juice-item-image">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        </div>
                        <div class="juice-item-title"><?php echo $product['name']; ?></div>
                        <div class="juice-item-price">$<?php echo number_format($product['price'], 2); ?></div>
                        <form action="frutos-secos.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" name="add_to_cart" class="btn">Añadir al carrito</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No hay frutos secos disponibles en este momento.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
