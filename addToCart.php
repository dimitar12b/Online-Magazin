<?php
    session_start();

    /*
    session_unset();
session_destroy();
*/

    if(isset($_GET['productId'])) {
        if(isset($_SESSION["cart"]) || !empty($_SESSION["cart"])) { 
            $ids = array_column($_SESSION["cart"], 'id');
            if(($id = array_search($_GET['productId'], $ids)) !== FALSE) {                
                $_SESSION["cart"][$id]["count"] += 1;
            } else {
                array_push($_SESSION["cart"], array("id" => $_GET['productId'], "count" => 1));
            }
        } else {
            $_SESSION["cart"] = array();
            array_push($_SESSION["cart"], array("id" => $_GET['productId'], "count" => 1));
        }        
        header("Location: cart.php");
    } else {
        header("Location: cart.php?error=NoProductId");
    }

?>  