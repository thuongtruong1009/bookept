<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {

      $row = mysqli_fetch_assoc($select_users);

      if ($row['user_type'] == 'admin') {

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
      } elseif ($row['user_type'] == 'user') {

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
      }
   } else {
      $message[] = 'incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bookept | Login</title>
   <meta name="description" content="Knowledge space for nerds. Search online books by subject and add them to your favorite cart">
   <meta name="keywords" content="php, sql, mysql, html, css, javascript, book">
   <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/main.css">
   <link rel="stylesheet" href="./styles//customers/login.css">
</head>

<body>
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

<div class="form-container">
      <form class="login_form" action="" method="post">
         <div class="form-inner">
            <h2>Login now</h2>
            <div class="input-group">
               <div class="icon">
                  <img src="./public/form/user.svg" alt="user">
               </div>
               <input type="email" name="email" placeholder="enter your email" required />
            </div>
            <div class="input-group">
               <div class="icon">
                  <img src="./public//form/finger_print.svg" alt="finger_print">
               </div>
               <input type="password" name="password" placeholder="enter your password" required />
            </div>
            <div class="btn-group">
               <button class="btn btn--primary" type="submit" name="submit" value="login now">Sign in</button>
            </div>
            <p>Don't have account? <a class="btn--text" href="register.php">register now</a></p>
         </div>
      </form>
   </div>
</body>

</html>