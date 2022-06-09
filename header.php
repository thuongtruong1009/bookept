<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<div class="header">
   <div class="flex">
      <a href="home.php" class="logo"><img src="public/icon/logo.png" alt="logo">Bookept</a>

      <nav class="navbar">
         <a href="home.php"><img src="public/header/home_icon.svg" alt="home_icon">home</a>
         <a href="about.php"><img src="public/header/about_icon.svg" alt="about_icon">about</a>
         <a href="shop.php"><img src="public/header/shop_icon.svg" alt="shop_icon">shop</a>
         <a href="contact.php"><img src="public/header/contact_icon.svg" alt="contact_icon">contact</a>
         <a href="orders.php"><img src="public/header/order_icon.svg" alt="order_icon">orders</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php" class="fas fa-search"></a>
         <div id="user-btn" class="fas fa-user"></div>
         <?php
         $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $cart_rows_number = mysqli_num_rows($select_cart_number);
         ?>
         <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
      </div>

      <div class="user-box">
         <p><img src="./public/header/account/user.svg" alt="user_icon">user : <span><?php echo $_SESSION['user_name']; ?></span></p>
         <p><img src="./public/header/account/email.svg" alt="email.svg">email : <span><?php echo $_SESSION['user_email']; ?></span></p>
         <a href="logout.php" class="delete-btn"><img src="./public/header/logout.svg" alt="logout_icon">logout</a>
      </div>
   </div>
</div>