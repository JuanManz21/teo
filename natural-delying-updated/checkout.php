<?php
session_start();
require_once "config.php";

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(empty($_SESSION['cart'])){
    header("location: cart.php");
    exit;
}

$user_id = $_SESSION["id"];
$total = 0;
foreach($_SESSION['cart'] as $item){
    $total += $item['price'] * $item['quantity'];
}

$sql = "INSERT INTO orders (user_id, total) VALUES (?, ?)";

if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "id", $param_user_id, $param_total);

    $param_user_id = $user_id;
    $param_total = $total;

    if(mysqli_stmt_execute($stmt)){
        $order_id = mysqli_insert_id($link);

        $sql_items = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";

        if($stmt_items = mysqli_prepare($link, $sql_items)){
            foreach($_SESSION['cart'] as $item){
                mysqli_stmt_bind_param($stmt_items, "iiid", $param_order_id, $param_product_id, $param_quantity, $param_price);

                $param_order_id = $order_id;
                $param_product_id = $item['id'];
                $param_quantity = $item['quantity'];
                $param_price = $item['price'];

                mysqli_stmt_execute($stmt_items);
            }
            mysqli_stmt_close($stmt_items);
        }

        unset($_SESSION['cart']);

        header("location: receipt.php?order_id=" . $order_id);
        exit;
    } else{
        echo "Something went wrong. Please try again later.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($link);
?>