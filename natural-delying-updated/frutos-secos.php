<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natural Delying - Frutas y Frutos Secos</title>
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
            <h2 style="text-align: center; font-size: 28px; margin-bottom: 40px;">Frutas Frescas y Frutos Secos</h2>

            <!-- Grid de frutos secos y frutas -->
            <div class="nuts-grid">
                <!-- Item 1: Arándanos Rojos -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/arandanos_rojos.png" alt="Arándanos Rojos">
                        <div class="nut-item-title">Arándanos Rojos</div>
                    </div>
                    <p>Rica en antioxidantes</p>
                    <p>$2.000</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="10">
                        <input type="hidden" name="product_name" value="Arándanos Rojos">
                        <input type="hidden" name="product_price" value="2000">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/arandanos_rojos.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 2: Arándanos -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/arandanos.png" alt="Arándanos">
                        <div class="nut-item-title">Arándanos</div>
                    </div>
                    <p>Dulces y nutritivos</p>
                    <p>$2.500</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="11">
                        <input type="hidden" name="product_name" value="Arándanos">
                        <input type="hidden" name="product_price" value="2500">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/arandanos.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 3: Bananos -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/banano.png" alt="Bananos">
                        <div class="nut-item-title">Bananos</div>
                    </div>
                    <p>Fuente de potasio</p>
                    <p>$1.000</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="12">
                        <input type="hidden" name="product_name" value="Bananos">
                        <input type="hidden" name="product_price" value="1000">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/banano.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 4: Kiwi -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/kivi.png" alt="Kiwi">
                        <div class="nut-item-title">Kiwi</div>
                    </div>
                    <p>Rico en vitamina C</p>
                    <p>$1.500</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="13">
                        <input type="hidden" name="product_name" value="Kiwi">
                        <input type="hidden" name="product_price" value="1500">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/kivi.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 5: Mango -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/mago.png" alt="Mango">
                        <div class="nut-item-title">Mango</div>
                    </div>
                    <p>Dulce y tropical</p>
                    <p>$2.000</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="14">
                        <input type="hidden" name="product_name" value="Mango">
                        <input type="hidden" name="product_price" value="2000">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/mago.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 6: Moras -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/moras.png" alt="Moras">
                        <div class="nut-item-title">Moras</div>
                    </div>
                    <p>Deliciosas y saludables</p>
                    <p>$1.800</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="15">
                        <input type="hidden" name="product_name" value="Moras">
                        <input type="hidden" name="product_price" value="1800">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/moras.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 7: Piña (Nuevo) -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/pi%C3%B1a.png" alt="Piña">
                        <div class="nut-item-title">Piña</div>
                    </div>
                    <p>Refrescante y digestiva</p>
                    <p>$2.200</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="16">
                        <input type="hidden" name="product_name" value="Piña">
                        <input type="hidden" name="product_price" value="2200">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/piña.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 8: Uvas Verdes (Nuevo) -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/uvas_verdes.png" alt="Uvas Verdes">
                        <div class="nut-item-title">Uvas Verdes</div>
                    </div>
                    <p>Energía natural</p>
                    <p>$2.800</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="17">
                        <input type="hidden" name="product_name" value="Uvas Verdes">
                        <input type="hidden" name="product_price" value="2800">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/uvas_verdes.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>

                <!-- Item 9: Fresas (Nuevo) -->
                <div class="nut-item">
                    <div class="nut-item-image">
                        <img src="IMG_Frutos_Secos/fresas_2.png" alt="Fresas">
                        <div class="nut-item-title">Fresas</div>
                    </div>
                    <p>Vitamina C y sabor</p>
                    <p>$2.000</p>
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="18">
                        <input type="hidden" name="product_name" value="Fresas">
                        <input type="hidden" name="product_price" value="2000">
                        <input type="hidden" name="product_image" value="IMG_Frutos_Secos/fresas_2.png">
                        <button type="submit" name="add_to_cart" class="btn">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Caja de información -->
        <div class="info-box" style="margin-top: 60px;">
            <p>Aquí encontrarás una amplia variedad de frutas frescas y frutos secos para personalizar tu jugo natural. Todos nuestros ingredientes son de la más alta calidad y frescura.</p>
            <p>Combina tus favoritos y crea la mezcla perfecta para tu paladar. ¡Las posibilidades son infinitas!</p>
        </div>
    </div>
</body>
</html>
