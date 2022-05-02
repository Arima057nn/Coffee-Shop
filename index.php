<?php

$db_name = 'mysql:host=localhost;dbname=contact_db';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password); // kết nối với mysql

if(isset($_POST['send'])){  // isset(): Kiểm tra xem một biến có trống không. Đồng thời kiểm tra xem biến có được đặt / khai báo hay không
 
   $name = $_POST['name']; // thu thập giá trị bên trong ô nhập có tên là name

   $name = filter_var($name, FILTER_SANITIZE_STRING); // xóa tất cả thẻ HTML khỏi một chuỗi
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $guests = $_POST['guests'];
   $guests = filter_var($guests, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND guests = ?");
   $select_contact->execute([$name, $number, $guests]);  //dưới đây sẽ gán lần lượt giá trị trong mảng vào các Placeholder theo thứ tự

   if($select_contact->rowCount() > 0){
      $message[] = 'message sent already!';
   }else{
      $insert_contact = $conn->prepare("INSERT INTO `contact_form`(name, number, guests) VALUES(?,?,?)");
      $insert_contact->execute([$name, $number, $guests]);
      $message[] = 'message sent successfully!';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Coffee Shop</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <link rel="stylesheet" href="./assets/css/style.css" />
  </head>
  <body>


<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
    <!-- header section starts  -->
    <header class="header">
      <section class="flex">
        <a href="#home" class="logo">
          <img src="./assets/image/logo.png" alt=""
        /></a>
        <nav class="navbar">
          <a href="#home">home</a>
          <a href="#about">about</a>
          <a href="#menu">menu</a>
          <a href="#gallery">gallery</a>
          <a href="#team">team</a>
          <a href="#contact">contact</a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
      </section>
    </header>
    <!-- header section ends  -->

    <!-- home section starts  -->
    <div class="home-bg">
      <section class="home" id="home">
        <div class="content">
          <h3>Coffee Heaven</h3>
          <p>
            Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Ut
            Officia, Accusantium Mollitia Laudantium Dolorum Dolore.
          </p>
          <a href="#about" class="btn">About us</a>
        </div>
      </section>
    </div>
    <!-- home section ends  -->
    <!-- about section starts  -->
    <section class="about" id="about">
      <div class="image">
        <img src="./assets/image/about-img.svg" alt="" />
      </div>

      <div class="content">
        <h3>A Cup Of Coffee Can Complete Your Day</h3>
        <p>
          Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Veniam
          Suscipit Sunt Repellendus, Dolorum Recusandae Placeat Quae. Iste Eaque
          Aspernatur, Animi Deleniti Voluptas, Sunt Molestias Eveniet Sint
          Consectetur Facere A Ex.
        </p>
        <a href="#menu" class="btn">About us</a>
      </div>
    </section>
    <!-- about section ends  -->

    <!-- facility section starts -->
    <section class="facility">
      <div class="heading">
        <img src="./assets/image/heading-img.png" alt="" />
        <h3>Our Facility</h3>
      </div>

      <div class="box-container">
        <div class="box">
          <img src="./assets/image/icon-1.png" alt="" />
          <h3>varieties of coffees</h3>
          <p>
            Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Saepe,
            Adipisci!
          </p>
        </div>

        <div class="box">
          <img src="./assets/image/icon-2.png" alt="" />
          <h3>varieties of coffees</h3>
          <p>
            Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Saepe,
            Adipisci!
          </p>
        </div>

        <div class="box">
          <img src="./assets/image/icon-3.png" alt="" />
          <h3>varieties of coffees</h3>
          <p>
            Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Saepe,
            Adipisci!
          </p>
        </div>

        <div class="box">
          <img src="./assets/image/icon-4.png" alt="" />
          <h3>varieties of coffees</h3>
          <p>
            Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Saepe,
            Adipisci!
          </p>
        </div>
      </div>
    </section>
    <!-- facility section ends -->

    <!-- menu section starts -->
    <section class="menu" id="menu">
      <div class="heading">
        <img src="./assets/image/heading-img.png" alt="" />
        <h3>Popular Menu</h3>
      </div>

      <div class="box-container">
        <div class="box">
          <img src="./assets/image/menu-1.png" alt="" />
          <h3>Love you coffee</h3>
        </div>

        <div class="box">
          <img src="./assets/image/menu-2.png" alt="" />
          <h3>Love you coffee</h3>
        </div>

        <div class="box">
          <img src="./assets/image/menu-3.png" alt="" />
          <h3>Love you coffee</h3>
        </div>

        <div class="box">
          <img src="./assets/image/menu-4.png" alt="" />
          <h3>Love you coffee</h3>
        </div>

        <div class="box">
          <img src="./assets/image/menu-5.png" alt="" />
          <h3>Love you coffee</h3>
        </div>

        <div class="box">
          <img src="./assets/image/menu-6.png" alt="" />
          <h3>Love you coffee</h3>
        </div>
      </div>
    </section>

    <!-- menu section ends -->

    <!-- gallery section starts -->
    <section class="gallery" id="gallery">
      <div class="heading">
        <img src="./assets/image/heading-img.png" alt="" />
        <h3>Out Gallary</h3>
      </div>
      <div class="box-container">
        <img src="./assets/image/gallery-1.webp" alt="" />

        <img src="./assets/image/gallery-2.webp" alt="" />

        <img src="./assets/image/gallery-3.webp" alt="" />

        <img src="./assets/image/gallery-4.webp" alt="" />

        <img src="./assets/image/gallery-5.webp" alt="" />

        <img src="./assets/image/gallery-6.webp" alt="" />
      </div>
    </section>
    <!-- gallery section ends -->

    <!-- teams section starts -->
    <section class="team" id="team">
      <div class="heading">
        <img src="./assets/image/heading-img.png" alt="" />
        <h3>Out Teams</h3>
      </div>

      <div class="box-container">
        <div class="box">
          <img src="./assets/image/our-team-1.jpg" alt="" />
          <h3>John Deo</h3>
        </div>

        <div class="box">
          <img src="./assets/image/our-team-2.jpg" alt="" />
          <h3>John Deo</h3>
        </div>

        <div class="box">
          <img src="./assets/image/our-team-3.jpg" alt="" />
          <h3>John Deo</h3>
        </div>

        <div class="box">
          <img src="./assets/image/our-team-4.jpg" alt="" />
          <h3>John Deo</h3>
        </div>

        <div class="box">
          <img src="./assets/image/our-team-5.jpg" alt="" />
          <h3>John Deo</h3>
        </div>

        <div class="box">
          <img src="./assets/image/our-team-6.jpg" alt="" />
          <h3>John Deo</h3>
        </div>
      </div>
    </section>
    <!-- teams section ends -->

    <!-- contact section starts -->

    <section class="contact" id="contact">
      <div class="heading">
        <img src="./assets/image/heading-img.png" alt="" />
        <h3>Contact us</h3>
      </div>

      <div class="row">
        <div class="image">
          <img src="./assets/image/contact-img.svg" alt="" />
        </div>

        <form action="" method="post">
          <h3>Book A Table</h3>
          <input
            type="text"
            name="name"
            required
            class="box"
            maxlength="20"
            placeholder="enter your name"
          />
          <input
            type="number"
            name="number"
            required
            class="box"
            maxlength="20"
            placeholder="enter your number"
            min="0"
            max="9999999999"
            onkeypress="if(this.value.length == 10) return false"
          />

          <input
            type="number"
            name="guests"
            required
            class="box"
            maxlength="20"
            placeholder="how many guests"
            min="0"
            max="99"
            onkeypress="if(this.value.length == 2) return false"
          />
          <input type="submit" name="send" value="send message" class="btn" />
        </form>
      </div>
    </section>
    <!-- contact section ends -->

    <!-- footer section starts -->
    <section class="footer" id="footer">
      <div class="box-container">
        <div class="box">
          <i class="fas fa-envelope"></i>
          <h3>our email</h3>
          <p>Shaikhanas@Gmail.Com</p>
          <p>Anasbhai@Gmail.Com</p>
        </div>

        <div class="box">
          <i class="fas fa-clock"></i>
          <h3>opening hours</h3>
          <p>07:00am To 09:00pm</p>
        </div>

        <div class="box">
          <i class="fas fa-location-dot"></i>
          <h3>shop location</h3>
          <p>Mumbai, India - 400104</p>
        </div>

        <div class="box">
          <i class="fas fa-phone"></i>
          <h3>our number</h3>
          <p>+123-456-7890</p>
          <p>+111-222-3333</p>
        </div>
      </div>

      <div class="credit">
        &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights
        reserved!
      </div>
    </section>
    <!-- footer section ends -->

    <!-- ? script -->
    <script src="./assets/js/script.js"></script>
  </body>
</html>
