<?php
  $_POST['menuLinks'] = "";
  include ''.$_POST['menuLinks'].'header.php';

  include ''.$_POST['menuLinks'].'db.php';

  if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, ($_POST['email']));
    $phone_number = mysqli_real_escape_string($conn, ($_POST['phone_number']));
    $message = mysqli_real_escape_string($conn, ($_POST['message']));


    $select = mysqli_query($conn, "SELECT * FROM `contacts` WHERE name = '$name' AND last_name = '$last_name' AND email = '$email' AND phone_number = '$phone_number' AND message = '$message'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $emessage[] = 'contact already sent!';
    }else{
        mysqli_query($conn, "INSERT INTO `contacts`(name, last_name, email, phone_number, message) VALUES('$name', '$last_name', '$email', '$phone_number', '$message')") or die('query failed');
        $emessage[] = 'message sent successfully!';
        header('location:index.php');
    }

  }
?>
    <div class="contactUs">
      <div class="contact-title">
        <h2>Свържете се с нас</h2>
      </div>
      <div class="box">
        <!-- Form -->
        <div class="contact form">
          <h4>Изпратете съобщение</h4>
          <form method="post" action="">
            <div class="formBox">
              <div class="row50">
                <div class="inputBox">
                  <span>Име</span>
                  <input type="text" id="name" name="name" placeholder="" class="form_input">
                </div>
                <div class="inputBox">
                  <span>Фамилия</span>
                  <input type="text" id="last_name" name="last_name" placeholder="" class="form_input">
                </div>
              </div>

              <div class="row50">
                <div class="inputBox">
                  <span>Имейл</span>
                  <input type="email" id="email" name="email" placeholder="" class="form_input">
                </div>
                <div class="inputBox">
                  <span>Телефон</span>
                  <input type="number" id="phone_number" name="phone_number" placeholder="" class="form_input">
                </div>
              </div>

              <div class="row100">
                <div class="inputBox">
                  <span>Съобщение:</span>
                  <textarea type="text" id="message" name="message"  class="form_input" placeholder="Напишете вашето съобщение тук..."></textarea>
                </div>
              </div>

              <div class="row100">
                <div class="inputBox">
                  <input type="submit" name="submit" value="Изпрати" class="form_btn" >
                </div>
              </div>
            </div>
          </form>
        </div>

        <!-- Info Box -->
        <div class="contact info">
          <h4>Списък с контакти:</h4>
          <div class="infoBox">
            <div>
              <span><ion-icon name="location"></ion-icon></span>
              <p>гр. Стамболийски <br>България</p>
            </div>
            <div>
              <span><ion-icon name="mail"></ion-icon></span>
              <a href="gmail:dimitardachev19b@gmail.com">dimitardachev19b@gmail.com</a>
            </div>
            <div>
              <span><ion-icon name="call"></ion-icon></span>
              <a href="tel:+359885621736">+359 885 621 736</a>
            </div>
            <!-- Socila media -->
            <ul class="sci">
              <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
              <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
              <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>
          </div>
        </div>
          
        <!--  Map -->
        <div class="contact map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2958.6955543163945!2d24.5344962!3d42.135400399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14acc7fa98d60acd%3A0xa64ea85298d9b986!2zVHNlbnRhciwg0YPQuy4g0JfQsNCy0L7QtNGB0LrQsCA1LCA0MjEwIFN0YW1ib2xpeXNraQ!5e0!3m2!1sen!2sbg!4v1708023519169!5m2!1sen!2sbg"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>

<?php
  include ''.$_POST['menuLinks'].'footer.php';
?>
