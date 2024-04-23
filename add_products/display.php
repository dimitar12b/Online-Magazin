<?php
    $_POST['menuLinks'] = "../";
    include ''.$_POST['menuLinks'].'header.php';
    include ''.$_POST['menuLinks'].'db.php';
        
?>
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
textarea{
    width:800px;
    height:200px;
    resize:none;
    background-color: white;
    border: none;
    font-family: arial;
    font-size: 25px;
}
</style>
<?php

    if(isset($_GET["productId"])) {
        $sql = "SELECT * FROM products WHERE id = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../../posts.php?error=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $_GET["productId"]);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData))
        {            
            ?>
            <div class="contactUs" style="margin-inline: auto;width: 50%;">
                <div class="">
                    <div class="">
                        <div class="">                            
                                <div class="">
                                    <?php                                         
                                        echo '<h5 style="color: black; font-weight: 500; font-size: 2.2em; text-align: center;"><p name="title" class="lead">'.$row["title"].'<p></h5>';                                        
                                    ?>                        
                                </div>
                            
                                <div class="slideshow-container">

                                    <?php 
                                      $imageCount = 0;     
                                        if($row["images"] === "none") {
                                            
                                        } else {
                                            $imgs = explode(" ", $row["images"]);
                                            $imageCount = count($imgs);
                                            $imgData = array();

                                            $sqlImgs = "SELECT * FROM images WHERE id = ?;";
                                            $stmt = mysqli_stmt_init($conn);

                                            if(!mysqli_stmt_prepare($stmt, $sqlImgs)) {
                                                header("Location: ../index.php?error=stmtFailed");
                                                exit();
                                            }
                                            
                                            foreach($imgs as $imgId) {
                                                mysqli_stmt_bind_param($stmt, "i", $imgId);
                                                mysqli_stmt_execute($stmt);

                                                $resultImgData = mysqli_stmt_get_result($stmt);

                                                if($imgRow = mysqli_fetch_assoc($resultImgData)) {
                                                    $imgData[] = $imgRow;
                                                }
                                            }

                                            $carousel = '';

                                            for($i = 0; $i < count($imgs); $i++) {                                                    
                                                $carousel .= '<div class="mySlides fade"><img src="'.$imgData[$i]["img_dir"].'" style="width:100%"></div>';
                                            }                                 
                                            echo $carousel;
                                        }                                                                                                                               
                                        } else {
                                            echo"Няма продукти";
                                        }
                                        ?>                                                                                                                          

                                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                                    <a class="next" onclick="plusSlides(1)">❯</a>

                                    </div>
                                    <br>

                                    <div style="text-align:center">
                                      <?php
                                      for($i = 0; $i < $imageCount; $i++) {
                                        echo '<span class="dot" onclick="currentSlide('.($i + 1).')"></span>';
                                      }
                                      ?>                                    
                                    </div>

                                <div class="justify-content-between my-4">
                                    <?php
                                        
                                        echo '<p class="" style="padding-bottom: 17px; font-family: arial;
    font-size: 30px;">Описание: </p><textarea name="description" class="form-control postDisplay py-5" placeholder="Описание" disabled>'.mb_convert_encoding($row["description"], 'ISO-8859-1', 'UTF-8').'</textarea>';
                                        
                                    ?>
                                    
                                </div> 
                                                                                                                 
                                <?php                                    
                             
                                    echo '<div class="justify-content-between my-4">
                                    <p class="mb-0" style="padding-bottom: 17px; font-size: 30px;">Цена: </p>
                                        <p name="price" class="form-control postDisplay mt-2" style = "margin-bottom: 17px; font-size: 30px;">'.$row["price"].' лв.</p>
                                        <a
                                          class="add_to_cart"
                                          data-id="'.$row['id'].'"
                                          data-title="'.$row['title'].'"                                            
                                          data-price="'.$row['price'].'"
                                          href="../addToCart.php?productId='.$row['id'].'">
                                          Добави в количката
                                        </a>
                                    </div>';                                    
                                ?>                                 

                                <div class="my-4 rounded lead text-center center" id="booksFromOtherSites">
                                  
                                </div>                                                            
                        </div>                        
                    </div>
                </div>
            </div>

            <?php
        

    } else {
        header("Location: ".$_POST['menuLinks']."index.php");
        exit();
    }
?>

<script>
  let slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  }
</script>
