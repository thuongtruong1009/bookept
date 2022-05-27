<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bookept | Cart</title>
   <meta name="description" content="Knowledge space for nerds. Search online books by subject and add them to your favorite cart">
   <meta name="keywords" content="php, sql, mysql, html, css, javascript, book">
   <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/main.css">
   <link rel="stylesheet" href="styles/customers/cart.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>shopping cart</h3>
   <p> <a href="home.php">home</a> / cart </p>
</div>

<section class="cart-container">
   <div class="cart-head">
      <?php $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed'); ?>
      <div class="head-left">
         <h2>My List</h2>
         <h6>&bull; <?php echo mysqli_num_rows($select_cart) ?> items</h6>
      </div>
      <div>
         <select name="sort_cart" id="sort_cart">
            <option value="default">default</option>
            <option value="alphabet">a-z</option>
            <option value="low_to_high_price">Low to high price</option>
         </select>
      </div>
   </div>

   <ul class="cart-list">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <li class="cart-item">
         <div class="cart-item-content">
            <div class="image">
               <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
            </div>
            <div class="name">
               <h2><?php echo $fetch_cart['name']; ?></h2>
               <p>#id: <?php echo $fetch_cart['id']; ?></p>
            </div>
         </div>
         <form action="" method="post" class="cart-item-metrics">
            <div class="item-quantity">
               <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
               <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
            </div>
            <div class="item-price">
               <div>
                  <div class="price">$<?php echo $fetch_cart['price']; ?> <span style="font-size: 1em; color:#888"> &bull; (<?php echo $sub_total = ($fetch_cart['quantity']); ?>)</span></div>
                  <div class="sub-total"> sub total : <span>$<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span></div>
               </div>
            </div>
            <div class="item-btn">
               <button type="submit" name="update_cart" value="update" class="option-btn">update</button>
            </div>
            <div class="item-delete">
               <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
            </div>
         </form>
      </li>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
      <li class="cart-action">
         <div class="cart-btn">
            <a href="shop.php" class="option-btn"><img src="./public/cart/continue.svg" alt="continue_icon">continue shopping</a>
            <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>"><img src="./public/cart/checkout.svg" alt="checkout_icon">proceed to checkout</a>
            <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');"><img src="./public/cart/remove.svg" alt="delete_all_icon">delete all</a>
         </div>
         <div class="cart-total">
            <p>grand total : <span>$<?php echo $grand_total; ?></span></p>
         </div>
      </li>
   </ul>
</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>