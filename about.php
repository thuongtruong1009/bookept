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
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/main.css">
   <link rel="stylesheet" href="styles/customers/about.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <div class="heading">
      <h3>about us</h3>
      <p> <a href="home.php">home</a> / about </p>
   </div>

   <section class="about">
      <div class="flex">
         <div class="image">
            <img src="images/about-img.jpg" alt="">
         </div>

         <div class="content">
            <h3>why choose us?</h3>
            <h6>A choice that makes the difference</h6>
            <p>&bull; Professional organization, while always adding value and active in solving customer problems.</p>
            <p>&bull; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
            <a href="contact.php" class="btn">contact us</a>
         </div>
      </div>
   </section>

   <div class="about-benefit">
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/dedicated-teams.png" alt="dedicated-teams_img">
         <p>Dedicated teams</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/true-partners.png" alt="true-partners_img">
         <p>True partners</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/global-know-how.png" alt="global-know-how_img">
         <p>Global know-how</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/focus-on-innovation.png" alt="focus-on-innovation_img">
         <p>Focus on innovation</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/respect-clients.png" alt="respect-clients_img">
         <p>Respect customers</p>
      </div>
   </div>

   <section class="about">
      <div class="flex">
         <div class="content">
            <h3>how we work</h3>
            <p>&bull; Access new ways to increase customer visibility and brand value. As well as looking to make the most of advances in digitization and embracing customer technology platforms.</p>
            <p>&bull; Selecting teams for every project, to ensure each event captures the attention of the people with the most relevant skills. Access partnerships from around the world.</p>
            <a href="about.php" class="btn">read more</a>
         </div>
         <div class="image">
            <img src="images/about-img.jpg" alt="">
         </div>
      </div>
   </section>

   <div class="about-benefit">
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/research-analysis.png" alt="research-analysis_img">
         <p>Reasearch & Analysis</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/negotiation-power.png" alt="negotiation-power_img">
         <p>Negotiation power</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/creative-solution.png" alt="creative-solution_img">
         <p>Creative and innovative solutions</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/technological-tools.png" alt="technological-tools_img">
         <p>Top technological tools</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/flexibility-efficient-solutions.png" alt="flexibility-efficient-solutions_img">
         <p>Flexibility with effective</p>
      </div>
      <div>
         <img src="https://www.aimgroupinternational.com/build/assets/why-choose-us/ease-work.png" alt="ease-work_img">
         <p>Transparency and ease</p>
      </div>
   </div>

   <section class="about">
      <div class="flex">
         <div class="image">
            <img src="images/about-img.jpg" alt="">
         </div>
         <div class="content">
            <h3>about us</h3>
            <p>&bull; Massive business volume for suppliers with profitable contracts.</p>
            <a href="about.php" class="btn">read more</a>
         </div>
      </div>
   </section>

   <section class="reviews">
      <h1 class="title">client's reviews</h1>
      <div class="box-container">
         <div class="box">
            <div class="review-infor">
               <img src="https://scontent.fhan3-1.fna.fbcdn.net/v/t1.6435-9/83979562_1585954714895087_6401964817036345344_n.jpg?stp=dst-jpg_s851x315&_nc_cat=102&ccb=1-5&_nc_sid=da31f3&_nc_ohc=1MuRolx3ffEAX-lSTUt&tn=FPvRyI_btj-7Gva_&_nc_ht=scontent.fhan3-1.fna&oh=00_AT_yMoTsSyuemsSWHismnUK5JLxkMqhP4NG1xoSnoRYToA&oe=62787958" alt="review_img_1">
               <h3>Huu Nhat</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
            <p>Wonderful book for kids. My grandkids love it.</p>
         </div>

         <div class="box">
            <div class="review-infor">
               <img src="https://scontent.fhan4-2.fna.fbcdn.net/v/t39.30808-6/270012528_3144488045830078_518552516310324421_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=174925&_nc_ohc=C5L0cUMkH2oAX_Vv8is&_nc_ht=scontent.fhan4-2.fna&oh=00_AT-UJ-y3bVr71OwgLhnGq0nXEc-rU14DtnP8dVlZHPop1Q&oe=62580435" alt="review_img_2">
               <h3>Thanh Tung</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
            <p>I read the whole thing on the exercise bike and couldn't put it down.</p>
         </div>

         <div class="box">
            <div class="review-infor">
               <img src="./public/about/review-3.png" alt="review_img_3">
               <h3>Duy Khang</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
            <p>Enjoyable, easy read. I smiled and hooked. Definitely read this one.</p>
         </div>

         <div class="box">
            <div class="review-infor">
            <img src="./public/about/review-4.png" alt="review_img_4">
               <h3>Dinh Thinh</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
            <p>Well worth the reader's time and a book to make you smile.</p>
         </div>

         <div class="box">
            <div class="review-infor">
            <img src="./public/about/review-5.png" alt="review_img_5">
               <h3>john deo</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
            <p>This book took your interest and kept going until the last page.</p>
         </div>

         <div class="box">
            <div class="review-infor">
            <img src="./public/about/review-6.png" alt="review_img_6">
               <h3>john deo</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
            <p>Wow! This was a really good book. Tense and exciting.</p>
         </div>
      </div>
   </section>

   <section class="authors">
      <h1 class="title">greate authors</h1>
      <div class="box-container">
         <div class="box">
            <img src="./public/about/author-1.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Thuong Truong</h3>
         </div>

         <div class="box">
            <img src="images/author-2.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>

         <div class="box">
            <img src="images/author-3.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>john deo</h3>
         </div>
      </div>
   </section>

   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>