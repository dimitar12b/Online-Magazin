<?php
  $_POST['menuLinks'] = "";
  include ''.$_POST['menuLinks'].'header.php';
  include ''.$_POST['menuLinks'].'db.php';
?>

    <header class="header">
      <div class="container header_container">
        <div class="header_filter">
          <a href="#monitors" class="header_filter_link">Монитори</a>
          <a href="#periphery" class="header_filter_link">Периферия</a>
          <a href="#Components" class="header_filter_link">Компоненти</a>
          <a href="#" class="header_filter_link">Лаптопи</a>
          <a href="#" class="header_filter_link">Смартфони</a>
          <a href="#" class="header_filter_link">Смарт часовници</a>
          <a href="#" class="header_filter_link">Телевизори</a>
        </div>
        <img src="image\header.png" alt="" class="header_img" />
      </div>
    </header>
    <?php
  $_POST['menuLinks'] = "";
  include ''.$_POST['menuLinks'].'header.php';
  include ''.$_POST['menuLinks'].'db.php';
?>

    <header class="header">
      <div class="container header_container">
        <div class="header_filter">
          <a href="#monitors" class="header_filter_link">Монитори</a>
          <a href="#periphery" class="header_filter_link">Периферия</a>
          <a href="#Components" class="header_filter_link">Компоненти</a>
          <a href="#laptops" class="header_filter_link">Лаптопи</a>
          <a href="#smartphones" class="header_filter_link">Смартфони</a>
          <a href="#smart watches" class="header_filter_link">Смарт часовници</a>
          <a href="#tv" class="header_filter_link">Телевизори</a>
        </div>
        <img src="image\header.png" alt="" class="header_img" />
      </div>
    </header>

    <section class="section" id="monitors">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Монитори</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
        <div class="swiper-pagination"></div>
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '1'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <a
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'"
                          href="addToCart.php?productId='.$row['id'].'">
                          Добави в количката
                        </a>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }              
            ?>                          
          
        </div>        
      </div>
    </section>

    <section class="section" id="periphery">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Периферия</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '2'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    
    
    <section class="section" >
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">categories</p>
        </div>
        <div class="section_header">
          <h3 class="section_title">Browse by Category</h3>
        </div>
        <div class="categories">
          <div class="category">
            <img src="image\icons\camera.png" alt="" class="category_icon" />
            <p class="category_name">Cameras</p>
          </div>
          <div class="category">
            <img
              src="image\icons\computer.png"
              alt=""
              class="category_icon" />
            <p class="category_name">Computers</p>
          </div>
          <div class="category">
            <img src="image\icons\gaming.png" alt="" class="category_icon" />
            <p class="category_name">Gaming</p>
          </div>
          <div class="category">
            <img
              src="image\icons\headphone.png"
              alt=""
              class="category_icon" />
            <p class="category_name">Headphones</p>
          </div>
          <div class="category">
            <img src="image\icons\phone.png" alt="" class="category_icon" />
            <p class="category_name">Phones</p>
          </div>
          <div class="category">
            <img src="image\icons\watch.png" alt="" class="category_icon" />
            <p class="category_name">Watches</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="Components">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Компоненти</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '3'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section" id="laptops">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Лаптопи</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '4'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="trending">
          <div class="trending_content">
            <p class="trending_p">categories</p>
            <h2 class="trending_title">Enhance Your Music Experience</h2>
            <a href="#" class="trending_btn">Buy Now!</a>
          </div>
          <img src="image\speaker.png" alt="" class="trending_img" />
        </div>
      </div>
    </section>

    <section class="section" id="smartphones">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Смартфони</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '5'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section" id="smart watches">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Смарт часовници</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '6'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section" id="tv">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Телевизори</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '7'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Featured</p>
        </div>
        <div class="section_header">
          <h3 class="section_title">New Arrivals</h3>
        </div>
        <div class="gallery">
          <div class="gallery_item gallery_item_1">
            <img
              src="image\gallery\gallery-1.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_2">
            <img
              src="image\gallery\gallery-2.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_3">
            <img
              src="image\gallery\gallery-3.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_4">
            <img
              src="image\gallery\gallery-4.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container services_container">
        <div class="service">
          <img src="image\icons\service-1.png" alt="" class="service_img" />
          <h3 class="service_title">FAST AND FREE DELIVERY</h3>
          <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
          <img src="image\icons\service-2.png" alt="" class="service_img" />
          <h3 class="service_title">24/7 SUPPORT</h3>
          <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
          <img src="image\icons\service-3.png" alt="" class="service_img" />
          <h3 class="service_title">MONEY BACK GUARANTY</h3>
          <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
      </div>
    </section>


<?php
  include ''.$_POST['menuLinks'].'footer.php';
?>
    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Монитори</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '1'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <a
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'"
                          href="addToCart.php?productId='.$row['id'].'">
                          Добави в количката
                        </a>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }              
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Периферия</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '2'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    
    
    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">categories</p>
        </div>
        <div class="section_header">
          <h3 class="section_title">Browse by Category</h3>
        </div>
        <div class="categories">
          <div class="category">
            <img src="image\icons\camera.png" alt="" class="category_icon" />
            <p class="category_name">Cameras</p>
          </div>
          <div class="category">
            <img
              src="image\icons\computer.png"
              alt=""
              class="category_icon" />
            <p class="category_name">Computers</p>
          </div>
          <div class="category">
            <img src="image\icons\gaming.png" alt="" class="category_icon" />
            <p class="category_name">Gaming</p>
          </div>
          <div class="category">
            <img
              src="image\icons\headphone.png"
              alt=""
              class="category_icon" />
            <p class="category_name">Headphones</p>
          </div>
          <div class="category">
            <img src="image\icons\phone.png" alt="" class="category_icon" />
            <p class="category_name">Phones</p>
          </div>
          <div class="category">
            <img src="image\icons\watch.png" alt="" class="category_icon" />
            <p class="category_name">Watches</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="monitors">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Компоненти</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '3'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Лаптопи</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '4'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="trending">
          <div class="trending_content">
            <p class="trending_p">categories</p>
            <h2 class="trending_title">Enhance Your Music Experience</h2>
            <a href="#" class="trending_btn">Buy Now!</a>
          </div>
          <img src="image\speaker.png" alt="" class="trending_img" />
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Смартфони</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '5'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Смарт часовници</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '6'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Телевизори</p>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
              $sql = "SELECT * FROM products WHERE category = '7'";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {                
                  $firstImageId = explode(" ", $row['images'])[0];
                  $getImagesSql = "SELECT * FROM images WHERE id = '".$firstImageId."'";
                  $imageResult = mysqli_query($conn, $getImagesSql);
                  
                  $imageURL = "";
                  if(mysqli_num_rows($imageResult) > 0){                    
                    $imageURL = mysqli_fetch_assoc($imageResult)["img_dir"];                    
                  } else {
                    echo "asd";
                  }

                  echo '<div class="swiper-slide">
                    <div class="card">
                      <div class="card_top">
                        <a href="add_products/display.php?productId='.$row['id'].'"><img src="add_products/'.$imageURL.'" alt="" class="card_img" /></a>
                      </div>
                      <div class="card_body">
                        <h3 class="card_title">'.$row['title'].'</h3>
                        <p class="card_price">'.$row['price'].' лв.</p>                  
                        <button
                          class="add_to_cart"
                          data-id="'.$row['id'].'"
                          data-title="'.$row['title'].'"
                          data-image="'.$imageURL.'"
                          data-price="'.$row['price'].'">
                          Добави в количката
                        </button>
                      </div>
                    </div>
                  </div>';
                }
              } else {
                echo"Няма продукти";
              }
            ?>                          
          <div class="swiper-pagination"></div>
        </div>        
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section_category">
          <p class="section_category_p">Featured</p>
        </div>
        <div class="section_header">
          <h3 class="section_title">New Arrivals</h3>
        </div>
        <div class="gallery">
          <div class="gallery_item gallery_item_1">
            <img
              src="image\gallery\gallery-1.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_2">
            <img
              src="image\gallery\gallery-2.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_3">
            <img
              src="image\gallery\gallery-3.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_4">
            <img
              src="image\gallery\gallery-4.png"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Playstation 5</div>
              <p class="gallery_item_p">
                Lorem ipsum dolor sit amet consectetur adipisicing.
              </p>
              <a href="#" class="gallery_item_link">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container services_container">
        <div class="service">
          <img src="image\icons\service-1.png" alt="" class="service_img" />
          <h3 class="service_title">FAST AND FREE DELIVERY</h3>
          <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
          <img src="image\icons\service-2.png" alt="" class="service_img" />
          <h3 class="service_title">24/7 SUPPORT</h3>
          <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
          <img src="image\icons\service-3.png" alt="" class="service_img" />
          <h3 class="service_title">MONEY BACK GUARANTY</h3>
          <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
      </div>
    </section>


<?php
  include ''.$_POST['menuLinks'].'footer.php';
?>