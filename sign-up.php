<?php
  $_POST['menuLinks'] = "";
  include ''.$_POST['menuLinks'].'header.php';

  include ''.$_POST['menuLinks'].'db.php';

  if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `user_db` WHERE name = '$name' AND email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $message[] = 'user already exist!';
    }else{
        mysqli_query($conn, "INSERT INTO `user_db`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
        $message[] = 'registered successfully!';
        header('location:login.php');
    }

  }
?>
    <section class="section">
      <div class="auth_container">
        <div class="auth_img">
          <img src="image\auth-image.png" alt="" class="auth_image" />
        </div>
        <div class="auth_content">
          <form method="post" action="" class="auth_form">
            <h2 class="form_title">Създайте акаунт</h2>
            <p class="auth_p">Въведете вашите детайли:</p>
            <div class="form_group">
              <input type="text" id="name" name="name" placeholder="Име" class="form_input" />
            </div>
            
            <div class="form_group form_pass">
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Парола"
                class="form_input" />
            </div>
            <div class="form_group form_pass">
              <input
                type="password"
                placeholder="Потвърди паролата"
                id="cpassword" 
                name="cpassword"
                class="form_input" />
            </div>
            <div class="form_group">
              <input type="email" id="email" name="email" placeholder="Имейл" class="form_input" />
            </div>
            <div class="form_group">
              <button type="submit" name="submit" value="Register" class="form_btn">
                <a href="#" class="form_link">Създай акаунт</a>
              </button>
            </div>
            <div class="form_group">
              <span
                >Вече имате акаунт?
                <a href="login.php" class="form_auth_link">Влизане</a></span
              >
            </div>
          </form>

        </div>
      </div>
    </section>

<?php
  include ''.$_POST['menuLinks'].'footer.php';
?>



