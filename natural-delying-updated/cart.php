<?php
session_start();
require_once "config.php";

// Add to cart logic
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $cart_item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'image' => $product_image,
        'quantity' => 1
    );

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    // Check if item is already in cart
    $found = false;
    foreach($_SESSION['cart'] as &$item){
        if($item['id'] == $product_id){
            $item['quantity']++;
            $found = true;
            break;
        }
    }

    if(!$found){
        $_SESSION['cart'][] = $cart_item;
    }

    header("location: cart.php");
    exit;
}

// Remove from cart logic
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart'])){
    $product_id = $_POST['product_id'];

    foreach($_SESSION['cart'] as $key => $item){
        if($item['id'] == $product_id){
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    header("location: cart.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .cart-container { max-width: 800px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .cart-item { display: flex; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 20px; }
        .cart-item img { width: 100px; height: 100px; object-fit: cover; border-radius: 10px; margin-right: 20px; }
        .cart-item-details { flex-grow: 1; }
        .cart-item-details h3 { margin: 0; font-size: 18px; }
        .cart-item-details p { margin: 5px 0; color: #666; }
        .cart-item-actions { text-align: right; }
        .cart-total { text-align: right; margin-top: 20px; font-size: 20px; font-weight: bold; }
        .cart-total a { margin-top: 15px; display: inline-block; }
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
        <div class="cart-container">
            <h2>Carrito de Compras</h2>
            <?php if(empty($_SESSION['cart'])): ?>
                <p>Tu carrito está vacío.</p>
            <?php else: ?>
                <?php
                $total = 0;
                foreach($_SESSION['cart'] as $item):
                    $total += $item['price'] * $item['quantity'];
                ?>
                <div class="cart-item">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    <div class="cart-item-details">
                        <h3><?php echo $item['name']; ?></h3>
                        <p>Precio: $<?php echo $item['price']; ?></p>
                        <p>Cantidad: <?php echo $item['quantity']; ?></p>
                    </div>
                    <div class="cart-item-actions">
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                            <button type="submit" name="remove_from_cart" class="btn">Eliminar</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="cart-total">
                    <p>Total: $<?php echo number_format($total, 2); ?></p>
                    <a href="checkout.php" class="btn">Finalizar Compra</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
