<?php
  $_POST['menuLinks'] = "";
  include ''.$_POST['menuLinks'].'header.php';

  include ''.$_POST['menuLinks'].'db.php';

  if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_db` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['Id'];
        $_SESSION['user_status'] = $row['status'];
        header('location:index.php');
    }else{
        $message[] = 'incorrect password or email!';
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
            <h2 class="form_title">Влезте в акаунта си</h2>
            <p class="auth_p">Въведете вашите данни:</p>
            <div class="form_group">
              <input type="email" id="email" name="email" placeholder="Имейл" class="form_input" />
            </div>
            <div class="form_group form_pass">
              <input
                type="password"
                placeholder="Парола"
                id="password"
                name="password"
                class="form_input" />
            </div>
            <div class="form_group">
              <button type="submit" name="submit" class="form_btn">
                <a href="#" class="form_link">Влизане</a>
              </button>
            </div>
            <div class="form_group">
              <span
                >Нямате акаунт?
                <a href="sign-up.php" class="form_auth_link"
                  >Регистрация</a
                ></span
              >
            </div>
          </form>
        </div>
      </div>
    </section>

    <?php
  include ''.$_POST['menuLinks'].'footer.php';
?>
