<?php

    session_start();
    include "db.php";

    if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
        if(isset($_GET["id"]) && isset($_GET["counter"]) && $_GET["counter"] >= 1) {
            $_SESSION["cart"][$_GET["id"]]["count"] = $_GET["counter"];
        }

        $sum = 0;
        for($i = 0; $i < count($_SESSION["cart"]); $i++) {                  

            $sql = "SELECT * FROM products WHERE id = ".$_SESSION["cart"][$i]["id"]."";
        
            $result = mysqli_query($conn, $sql);
        
            if(mysqli_num_rows($result) > 0) {
                if($row = mysqli_fetch_assoc($result)) {
                    $sum += $row["price"] * $_SESSION['cart'][$i]["count"];
                }
            }
        }
        echo $sum;
    }