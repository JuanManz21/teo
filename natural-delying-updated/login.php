<?php
require_once 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $message = "Por favor, completa todos los campos.";
    } else {
        $sql = "SELECT id, username, password, is_admin FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Iniciar sesión
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_admin'] = $user['is_admin'];

                // Redirigir según el rol
                if ($user['is_admin']) {
                    header("Location: admin.php");
                } else {
                    header("Location: index.html");
                }
                exit();
            } else {
                $message = "Contraseña incorrecta.";
            }
        } else {
            $message = "El nombre de usuario no existe.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natural Delying - Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <h1>NATURAL DELYING</h1>
        <nav>
            <a href="index.html">INICIO</a>
            <a href="productos.html">PRODUCTOS</a>
        </nav>
    </div>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>
        <?php if (!empty($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
