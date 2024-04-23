<?php
  $_POST['menuLinks'] = "../";
  include ''.$_POST['menuLinks'].'header.php';

  include ''.$_POST['menuLinks'].'db.php';  
?>
    <div class="contactUs" style="margin-inline: auto;width: 60%;">
    <div class="contact form" style="margin-inline: auto;width: 60%;">
        <div class="formBox" >
            <div class="row50" style="justify-content: center;">
                <form action="add.php" method="POST" enctype="multipart/form-data" class="text-center">
                    <div class="">
                        <h4>Име</h4>
                        <?php 
                            if(isset($_GET["title"]) && !empty($_GET["title"])) {
                                echo '<input type="text" id="name" name="title" placeholder="" class="form_input" value="'.$_GET["title"].'">';
                            } else if(isset($_GET["title"])) {
                                echo '<input type="text" id="name" name="title" placeholder="" class="form_input">';
                            } else {
                                echo '<input type="text" id="name" name="title" placeholder="" class="form_input">';
                            }
                        ?>                        
                    </div>
                                        
                    <div class="uploadImg rounded lead text-center mt-3 center">
                        <div class="title lead"><h4>Качи файл</h4></div>  
                        <div class="contact form">
                            <div class="formBox">
                                <div class="row50">
                                    <div>
                                        <img src="contain/upload.svg"  class="upload" id="img">
                                        <span class="filename"></span>
                                        <input type="file" name="image[]" class="input" multiple>
                                    </div>                               
                                </div>                            
                            </div>  
                        </div>                                            
                    </div>
                    
                    <div class="inputBox" style="width: 100% !important">
                        <?php
                            if(isset($_GET["description"]) && !empty($_GET["description"])) {
                                echo '<textarea name="description" class="form_input" placeholder="Описание">'.$_GET["description"].'</textarea>';
                            } else if(isset($_GET["description"])) {
                                echo '<textarea name="description" class="form_input" placeholder="Описание"></textarea>';
                            } else {
                                echo '<textarea name="description" class="form_input" placeholder="Описание"></textarea>';
                            }
                        ?>                        
                    </div>
                    <?php
                        if(isset($_GET["price"]) && !empty($_GET["price"])) {
                            echo '<div class="justify-content-between my-4">
                            <input type="number" name="price" class="form_input" placeholder="Цена" min="0" max="100000" value="'.$_GET["price"].'">
                        </div>';
                        } else if(isset($_GET["price"])) {
                            echo '<div class="justify-content-between my-4">
                            <input type="number" name="price" class="form_input" placeholder="Цена" min="0" max="100000">
                        </div>';
                        } else {
                            echo '<div class="justify-content-between my-4">
                            <input type="number" name="price" class="form_input" placeholder="Цена" min="0" max="100000">
                        </div>';
                        }
                    ?>
                    
                    <div class="justify-content-between my-4">
                        <?php
                            if(isset($_GET["category"]) && !empty($_GET["category"])) {                              
                              echo '<select class="form_input" name="category" value="'.$_GET["category"].'">                        
                                <option value="Default">Избери категория</option>  
                                <option value="1">Монитори</option>                               
                                <option value="2">Периферия</option>     
                                <option value="3">Компоненти</option>
                                <option value="4">Лаптопи</option>
                                <option value="5">Смартфони</option>
                                <option value="6">Смарт часовници</option>
                                <option value="7">Телевизори</option>
                              </select>';
                            } else if(isset($_GET["category"])) {
                              echo '<select class="form_input" name="category">                        
                                <option value="Default">Избери категория</option>  
                                <option value="1">Монитори</option>                               
                                <option value="2">Периферия</option>     
                                <option value="3">Компоненти</option>
                                <option value="4">Лаптопи</option>
                                <option value="5">Смартфони</option>
                                <option value="6">Смарт часовници</option>
                                <option value="7">Телевизори</option>
                              </select>';
                            } else {
                              echo '<select class="form_input" name="category">                        
                                <option value="Default">Избери категория</option>  
                                <option value="1">Монитори</option>                               
                                <option value="2">Периферия</option>     
                                <option value="3">Компоненти</option>
                                <option value="4">Лаптопи</option>
                                <option value="5">Смартфони</option>
                                <option value="6">Смарт часовници</option>
                                <option value="7">Телевизори</option>
                              </select>';
                            }
                        ?>                        
                    </div>
                    
                    <button class="form_btn" type="submit" name="submit">Публикувай</button>
                </form>
            </div>            
        </div>
    </div>
</div>


<?php
  include ''.$_POST['menuLinks'].'footer.php';
?>
