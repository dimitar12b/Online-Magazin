<?php
    
    include_once '../db.php';
    
    if(empty($title) || empty($desc) || empty($price) || empty($category)) {
        header("Location: /add_product.php?error=empty&title=$title&description=$desc&price=$price&category=$category");
        exit();
    }    
?>