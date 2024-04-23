<?php
include "db.php";

$_POST['menuLinks'] = "";
include ''.$_POST['menuLinks'].'header.php';

$sum = 0;

// Функция за обработка на поръчката и изчистване на количката
function processOrderAndClearCart($conn, $phone) {
    $sum = 0;

    if(isset($_SESSION['cart']) && !empty($_SESSION["cart"])) {
        // Получаване на данните за поръчката
        $products = '';
        foreach($_SESSION["cart"] as $item) {                  
            $productId = $item["id"];
            $count = $item["count"];
            // Добавяне на продуктите към информацията за поръчката
            $products .= "Продукт ID: $productId, Брой: $count;\n";
            $sql = "SELECT price FROM products WHERE id = $productId";
            $title = "SELECT title FROM products WHERE id = $productId";
            $result = mysqli_query($conn, $sql);
            $resultTitle =mysqli_query($conn, $title);
            if(mysqli_num_rows($result)>0){
              $row=mysqli_fetch_assoc($resultTitle);
              $title = $row["title"];
            }
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $productPrice = $row["price"];
                $totalPrice = $productPrice * $count;
                $sum += $totalPrice;
            }
        }
        // Запазване на поръчката в базата данни
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO orders (products, total_price, phone, created_at) VALUES ('$title', $sum, '$phone', '$date')";
        if(mysqli_query($conn, $sql)) {
            unset($_SESSION['cart']); // Изчистване на количката
            echo "Поръчката беше успешно запазена в базата данни.";
        } else {
            echo "Възникна грешка при запазване на поръчката в базата данни.";
        }
    } else {
        echo "Количката е празна.";
    }
}

// Проверка за натискане на бутона за поръчка
if(isset($_POST['submit_order'])) {
    if(isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        processOrderAndClearCart($conn, $phone);
    } else {
        echo "Грешка: Не е предоставен телефонен номер.";
    }
}
?>

<!-- HTML част -->
<script>
  function updateCounter(id, element) {
    $.ajax({
      url: "updateProductCounter.php",
      type: "GET",
      data:  {
        "id": id,
        "counter": element.value,
      },		
      success: function(data){            
        document.getElementById("sum").innerHTML = `Обща сума: ${data} лв.`;
        console.log(data);
      },
      error: function() 
      {}       
    });
  }
</script>

<section class="section">
  <div class="container">
    <div class="cart">
      <div class="cart_header">
        <p class="cart_header_id">Номер на продукта</p>
        <p class="cart_header_title">Име на продукта</p>
        <p class="cart_header_image">Изображение на продукта</p>
        <p class="cart_header_price">Цена</p>
        <p class="cart_header_delete">Изтрий</p>
      </div>
      <div class="cart-items">
        <?php
          if(isset($_SESSION['cart']) && !empty($_SESSION["cart"])) {
            for($i = 0; $i < count($_SESSION["cart"]); $i++) {                  
              $sql = "SELECT * FROM products WHERE id = ".$_SESSION["cart"][$i]["id"]."";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) > 0) {
                if($row = mysqli_fetch_assoc($result)) {
                  $sql2 = "SELECT * FROM images WHERE id = ".explode(" ", $row["images"])[0]."";
                  $image;
                  if($row["images"] != "none") {
                    $result2 = mysqli_query($conn, $sql2);
                    if($row2 = mysqli_fetch_assoc($result2)) {
                      $image = $row2["img_dir"];
                    }                      
                  } else {
                    $image = "none";
                  }
                  echo '<div class="cart_item">
                    <p class="cart_id">'.$row["id"].'</p>
                    <p class="cart_title">'.$row["title"].'</p>
                    <img src="add_products/'.$image.'" alt="'.$row["title"].'" class="cart_img" />
                    <p class="cart_price">'.$row["price"].' лв.</p>
                    <input class="cart_count"type="number" min="1" value="'.$_SESSION['cart'][$i]["count"].'" onchange="updateCounter('.$i.', this)"/>
                    <a href="deleteFromCart.php?productId='.$row["id"].'"><p class="cart_delete">Delete</p></a>
                  </div>';
                  $sum += $row["price"] * $_SESSION['cart'][$i]["count"];
                }
              } else {
              }
            }
          } else {
            echo "<h1>Количката е празна</h1>";
          }
        ?>
      </div>
    </div>
    <?php
      echo"<h1 id='sum'>Обща сума: ".$sum." лв.</h1>";
    ?>
  </div>
</section>

<section class="section">
  <style>
    
.order-button {
  background-color: #4CAF50; /* Зелен цвят */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px; /* Закръгляне на ъглите */
  transition-duration: 0.4s;
}

.order-button:hover {
  background-color: #45a049; /* По-тъмно зелен цвят при хофвър */
}
.phone-input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc; /* Сива рамка */
  border-radius: 4px; /* Закръгляне на ъглите */
}

/* Стили за съобщение за грешка */
.error-message {
  color: red;
  font-style: italic;
  margin-top: 4px;
}
  </style>
  <div class="container">
    <form method="post" action="" class="order-form">
      <label for="phone" class="phone-label">Телефонен номер:</label>
      <input type="tel" id="phone" name="phone" required class="phone-input">
      <button type="submit" name="submit_order" class="order-button">Потвърди поръчката</button>
    </form>
  </div>
</section>

<?php
include ''.$_POST['menuLinks'].'footer.php';
?>
