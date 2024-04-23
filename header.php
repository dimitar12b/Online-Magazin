<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo $_POST['menuLinks'];?>css\styles.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Home - Exclusive E-Commerce Website</title>
  </head>
  <body>
    <nav class="nav">
      <div class="container nav_container">
        <a href="index.php" class="nav_logo">Техномарт</a>
        <ul class="nav_list">
        <?php
            if(isset($_SESSION['user_id']) && $_SESSION['user_status'] == 1) {
                ?>
                    <li class="nav_item"><a href="/" class="nav_link">Начало</a></li>
                    <li class="nav_item"><a href="<?php echo $_POST['menuLinks'];?>about.php" class="nav_link">За нас</a></li>
                    <li class="nav_item"><a href="<?php echo $_POST['menuLinks'];?>contact.php" class="nav_link">Контакти</a></li>
                    <li class="nav_item"><a href="<?php echo $_POST['menuLinks'];?>add_products/add_product.php" class="nav_link">Добави продукт</a></li>
                    <li class="nav_item">
                        <a href="<?php echo $_POST['menuLinks'];?>logout.php" class="nav_link">Излизане</a>
                    </li>
                    <?php
            } else if(isset($_SESSION['user_id'])) {
                ?>
                    <li class="nav_item"><a href="/" class="nav_link">Начало</a></li>
                    <li class="nav_item"><a href="<?php echo $_POST['menuLinks'];?>about.php" class="nav_link">За нас</a></li>
                    <li class="nav_item"><a href="<?php echo $_POST['menuLinks'];?>contact.php" class="nav_link">Контакти</a></li>
                    <li class="nav_item">
                        <a href="<?php echo $_POST['menuLinks'];?>logout.php" class="nav_link">Излизане</a>
                    </li>                   
                <?php
            } else {
                ?>
                    <li class="nav_item"><a href="/" class="nav_link">Начало</a></li>
                    <li class="nav_item"><a href="<?php echo $_POST['menuLinks'];?>about.php" class="nav_link">За нас</a></li>
                    <li class="nav_item"><a href="<?php echo $_POST['menuLinks'];?>contact.php" class="nav_link">Контакти</a></li>
                    <li class="nav_item">
                        <a href="<?php echo $_POST['menuLinks'];?>sign-up.php" class="nav_link">Регистрация</a>
                    </li>
                    <li class="nav_item">
                        <a href="<?php echo $_POST['menuLinks'];?>login.php" class="nav_link">Влизане</a>
                    </li>
                <?php
            }
        ?>          
        </ul>
        <div class="nav_items">
          <a href="cart.php">
            <img src="image\cart.png" alt="" class="nav_cart" />
          </a>
        </div>
        <span class="hamburger">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </span>
      </div>
    </nav>
    <nav class="mobile_nav mobile_nav_hide">
      <ul class="mobile_nav_list">
        <li class="mobile_nav_item">
          <a href="/" class="mobile_nav_link">Home</a>
        </li>
        <li class="mobile_nav_item">
          <a href="#" class="mobile_nav_link">About</a>
        </li>
        <li class="mobile_nav_item">
          <a href="#" class="mobile_nav_link">Contact</a>
        </li>
        <li class="mobile_nav_item">
          <a href="sign-up.html" class="mobile_nav_link">Sign Up</a>
        </li>
        <li class="mobile_nav_item">
          <a href="cart.html" class="mobile_nav_link">Cart</a>
        </li>
      </ul>
    </nav>