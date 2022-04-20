let userBox = document.querySelector('.header .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header').classList.add('active');
   }else{
      document.querySelector('.header').classList.remove('active');
   }
}

////////////////////////////////////////////////////////////////////
const scrollToTopButton = document.getElementById('fcircle');
const scrollFunction = () => {
    // Get the current scroll value
    let y = window.scrollY;
    if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
        scrollToTopButton.style.opacity = "1";
    } else {
        scrollToTopButton.style.opacity = "0";
    }
};
window.addEventListener("scroll", scrollFunction);

const scrollToTop = () => {
    const c = document.documentElement.scrollTop || document.body.scrollTop;
    if (c > 0) {
        window.requestAnimationFrame(scrollToTop);
        // Increase the '10' value to get a smoother/slower scroll!
        window.scrollTo(0, c - c / 5);
    }
};
scrollToTopButton.onclick = function(e) {
        e.preventDefault();
        scrollToTop();
}
// ///////////////////////////////////////////
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('header').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
        }
    });
});