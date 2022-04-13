<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

if (isset($_POST['send'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if (mysqli_num_rows($select_message) > 0) {
      $message[] = 'message sent already!';
   } else {
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Bookist | Contact</title>
   <meta name="description" content="Knowledge space for nerds. Search online books by subject and add them to your favorite cart">
   <meta name="keywords" content="php, sql, mysql, html, css, javascript, book">
   <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/main.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>contact us</h3>
      <p><a href="home.php">home</a> / contact</p>
   </div>

   <section class="contact">
      <form action="" method="post">
         <h3>&#9135;&#9135;&#9135;&#9135;&nbsp;&nbsp;say something!</h3>
         <input type="text" name="name" required placeholder="full name" class="box">
         <input type="email" name="email" required placeholder="email" class="box">
         <input type="number" name="number" required placeholder="phone number" class="box">
         <textarea name="message" class="box" placeholder="type your message..." id="" cols="30" rows="10"></textarea>
         <input type="submit" value="📧 send message" name="send" class="btn">
      </form>
      <div class="contact-info">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.1316505217173!2d106.7994309147447!3d10.87759006029277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d8a415a9d221%3A0x550c2b41569376f9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBRdeG7kWMgVOG6vyAtIMSQ4bqhaSBo4buNYyBRdeG7kWMgZ2lhIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1647529939482!5m2!1svi!2s" width="600" height="300" allowfullscreen="" loading="lazy"></iframe>
         <div class="contact-infor-content">
            <div>
               <img src="./public/contact/location.svg" alt="address">
               <p>International University, 6 quater, Linh Trung ward, Thu Duc dist, Ho Chi Minh city.</p>
            </div>
            <div>
               <img src="./public/contact/phone.svg" alt="hotline">
               <p>Hotline: (+84) 917 085 937</p>
            </div>
         </div>
         <div class="contact-social">
            <a href="">
               <img src="./public/contact/website.svg" alt="website">
            </a>
            <a href="">
               <img src="./public/contact/messenger.svg" alt="messenger">
            </a>
            <a href="">
               <img src="./public/contact/github.svg" alt="github">
            </a>
            <a href="mailto:ititiu19228@student.hcmiu.edu.vn">
               <img src="./public/contact/email.svg" alt="email">
            </a>
         </div>
      </div>
   </section>

   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>