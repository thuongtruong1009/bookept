<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bookept | Orders</title>
   <meta name="description" content="Knowledge space for nerds. Search online books by subject and add them to your favorite cart">
   <meta name="keywords" content="php, sql, mysql, html, css, javascript, book">
   <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/main.css">
   <link rel="stylesheet" href="./styles/customers/order.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>your orders</h3>
      <p> <a href="home.php">home</a> / orders </p>
   </div>

   <section class="order-container">
      <div class="order-title">
         <h1>placed orders</h1>
      </div>
      <table cellspacing="0">
         <tr>
            <td>place on</td>
            <td>name</td>
            <td>number</td>
            <td>email</td>
            <td>address</td>
            <td>payment</td>
            <td>product</td>
            <td>total</td>
            <td>status</td>
         </tr>
         <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($order_query) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
         ?>
               <tr>
                  <td><?php echo $fetch_orders['placed_on']; ?></td>
                  <td><?php echo $fetch_orders['name']; ?></td>
                  <td><?php echo $fetch_orders['number']; ?></td>
                  <td><?php echo $fetch_orders['email']; ?></td>
                  <td><?php echo $fetch_orders['address']; ?></td>
                  <td><?php echo $fetch_orders['method']; ?></td>
                  <td><?php echo $fetch_orders['total_products']; ?></td>
                  <td>$<?php echo $fetch_orders['total_price']; ?></td>
                  <td><span style="color:<?php if ($fetch_orders['payment_status'] == 'pending') {
                                             echo 'red';
                                          } else {
                                             echo 'green';
                                          } ?>;"><?php echo $fetch_orders['payment_status']; ?></span>
                  </td>
               </tr>
         <?php
            }
         } else {
            echo '<p class="empty">no orders placed yet!</p>';
         }
         ?>
      </table>
      <div class="order-total">
         <h3>Total:</h3>
         <h3><?php echo mysqli_num_rows($order_query) ?></h3>
      </div>
   </section>

   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>