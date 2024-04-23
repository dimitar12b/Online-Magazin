<?php
    session_start();
    include_once '../db.php';
    
    if(!isset($_POST["submit"])) {
        header("Location: add_product.php?error=post");
    } else {        
        $ID = $_SESSION['user_id'];           
        $title = $_POST['title'];
        $desc = $_POST['description'];        
        $price = $_POST['price'];        
        $category = $_POST['category'];

        include "errorHandlerAdd.php";
        include 'upload.php';
        
        if(empty($imgId)) {
            $imgIds = "none";
        } else {
            $imgIds = implode(" ", $imgId);
        }        
    
        $sql = "INSERT IGNORE INTO products (title, description, price, images,category) VALUES(?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {         
            mysqli_stmt_bind_param($stmt, "sssss", $title, $desc, $price, $imgIds,$category);           
            mysqli_stmt_execute($stmt);           
        }

        header("Location: add_product.php?error=success");
        
    }
?>