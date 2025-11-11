<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natural Delying - Catálogo de Jugos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Barra de navegación -->
    <div class="navbar" style="position: relative;">
        <a href="productos.html" class="back-arrow">←</a>
        <h1>NATURAL DELYING</h1>
        <nav>
            <a href="index.php">INICIO</a>
            <a href="productos.php">PRODUCTOS</a>
            <a href="cart.php">CARRITO</a>
        </nav>
    </div>

    <!-- Contenido principal -->
    <div class="container">
        <div class="catalog-header">
            <!-- Grid de jugos -->
            <div class="juice-grid">
                <!-- Jugo 1: Jugo de Fresa -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/jugo_fresa.jpg" alt="Jugo de Fresa">
                        <div class="juice-item-title">Jugo de Fresa</div>
                    </div>
                    <p>$5.000</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Almendras</li>
                            <li>Nueces</li>
                            <li>Pistachos</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="product_name" value="Jugo de Fresa">
                        <input type="hidden" name="product_price" value="5000">
                        <input type="hidden" name="product_image" value="IMG_Jugos/jugo_fresa.jpg">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 2: Jugo de Guanábana -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/jugo_guanabana.jpg" alt="Jugo de Guanábana">
                        <div class="juice-item-title">Jugo de Guanábana</div>
                    </div>
                    <p>$6.000</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Avellana</li>
                            <li>Semillas de girasol</li>
                            <li>Nuez de cedro</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="2">
                        <input type="hidden" name="product_name" value="Jugo de Guanábana">
                        <input type="hidden" name="product_price" value="6000">
                        <input type="hidden" name="product_image" value="IMG_Jugos/jugo_guanabana.jpg">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 3: Jugo de Guayaba -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/jugo_guayaba.jpg" alt="Jugo de Guayaba">
                        <div class="juice-item-title">Jugo de Guayaba</div>
                    </div>
                    <p>$4.500</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Avena</li>
                            <li>Maní opcional</li>
                            <li>Leche deslactosada</li>
                            <li>Leche de almendras</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="3">
                        <input type="hidden" name="product_name" value="Jugo de Guayaba">
                        <input type="hidden" name="product_price" value="4500">
                        <input type="hidden" name="product_image" value="IMG_Jugos/jugo_guayaba.jpg">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 4: Jugo de Mango -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/jugo_mango.jpg" alt="Jugo de Mango">
                        <div class="juice-item-title">Jugo de Mango</div>
                    </div>
                    <p>$5.500</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Coco rallado</li>
                            <li>Semillas de chía</li>
                            <li>Miel</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="4">
                        <input type="hidden" name="product_name" value="Jugo de Mango">
                        <input type="hidden" name="product_price" value="5500">
                        <input type="hidden" name="product_image" value="IMG_Jugos/jugo_mango.jpg">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 5: Jugo de Mora -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/jugo_mora.jpg" alt="Jugo de Mora">
                        <div class="juice-item-title">Jugo de Mora</div>
                    </div>
                    <p>$5.000</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Espinaca</li>
                            <li>Jengibre</li>
                            <li>Limón</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="5">
                        <input type="hidden" name="product_name" value="Jugo de Mora">
                        <input type="hidden" name="product_price" value="5000">
                        <input type="hidden" name="product_image" value="IMG_Jugos/jugo_mora.jpg">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 6: Soda de Corozo -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/soda_corozo.jpg" alt="Soda de Corozo">
                        <div class="juice-item-title">Soda de Corozo</div>
                    </div>
                    <p>$4.000</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Granola</li>
                            <li>Yogurt</li>
                            <li>Miel</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="6">
                        <input type="hidden" name="product_name" value="Soda de Corozo">
                        <input type="hidden" name="product_price" value="4000">
                        <input type="hidden" name="product_image" value="IMG_Jugos/soda_corozo.jpg">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 7: Soda de Limón -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/soda_limon.png" alt="Soda de Limón">
                        <div class="juice-item-title">Soda de Limón</div>
                    </div>
                    <p>$3.500</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Coco rallado</li>
                            <li>Crema de coco</li>
                            <li>Cereza</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="7">
                        <input type="hidden" name="product_name" value="Soda de Limón">
                        <input type="hidden" name="product_price" value="3500">
                        <input type="hidden" name="product_image" value="IMG_Jugos/soda_limon.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 8: Soda de Naranja -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/soda_naranja.jpg" alt="Soda de Naranja">
                        <div class="juice-item-title">Soda de Naranja</div>
                    </div>
                    <p>$3.500</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Chispas de chocolate</li>
                            <li>Crema batida</li>
                            <li>Brownie</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="8">
                        <input type="hidden" name="product_name" value="Soda de Naranja">
                        <input type="hidden" name="product_price" value="3500">
                        <input type="hidden" name="product_image" value="IMG_Jugos/soda_naranja.jpg">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Jugo 9: Soda de Uva -->
                <div class="juice-item">
                    <div class="juice-item-image">
                        <img src="IMG_Jugos/soda_uva.png" alt="Soda de Uva">
                        <div class="juice-item-title">Soda de Uva</div>
                    </div>
                    <p>$4.000</p>
                    <div class="toppings-badge">Toppings</div>
                    <div class="toppings-list">
                        <ul>
                            <li>Menta fresca</li>
                            <li>Lima</li>
                            <li>Hielo granizado</li>
                        </ul>
                    </div>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="9">
                        <input type="hidden" name="product_name" value="Soda de Uva">
                        <input type="hidden" name="product_price" value="4000">
                        <input type="hidden" name="product_image" value="IMG_Jugos/soda_uva.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Caja de información -->
        <div class="info-box">
            <p>Aqui te mostraremos estas sugerencias de mjugos con sus respectivos toppings, estos jugos tienen un agradable sabor para nuestro paladar.</p>
            <p>si tu deseas crear tu propia mezcla de frutas frescas y frutos secos seleccion la opcion "MAS" para mostrarte todas las frutas y frutos secos que tenemos para que armes tu delicioso jugo natural</p>
            <a href="frutos-secos.html" class="more-btn">MAS →</a>
        </div>
    </div>
</body>
</html>
