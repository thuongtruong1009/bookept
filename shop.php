<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bookept | Shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/main.css">
   
   <link rel="stylesheet" href="styles/customers/service.css">


</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>our shop</h3>
   <p> <a href="home.php">home</a> / shop </p>
</div>

<section class="products">
      <h1 class="title">latest products</h1>
      <div class="box-container">
         <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 8") or die('query failed');
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>" class="price">
                  <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">

                  <div class="image">
                     <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
                  </div>
                  <div class="details">
                     <div class="name">
                        <img src="./public/card/name.svg" alt="name_icon">
                        <?php echo $fetch_products['name']; ?>
                     </div>
                     <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                     <div class="qty-pri">
                        <input type="number" min="1" name="product_quantity" value="1" class="qty">
                        <div class="price">
                           <span style="font-size:0.7em">$</span><?php echo $fetch_products['price']; ?>
                        </div>
                     </div>
                     <div class="action">
                        <button type="submit" name="add_to_cart"><img src="./public/card/cart.svg" alt="cart_icon">add to cart</button>
                        <img src="./public/card/heart.svg" alt="favourite_icon">
                     </div>
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>
      </div>

      <div class="load-more" style="margin-top: 3rem; text-align:center">
         <a href="shop.php" class="transparent-btn">load more...</a>
      </div>
   </section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>