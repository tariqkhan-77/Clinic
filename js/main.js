// Slider

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}

//login button (codes for Modal)
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("login_btn");

// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];
  var btn1 = document.getElementById("btn1");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
//btn1.onclick = function() {
//  modal.style.display = "none";
//}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
 if (event.target == modal) {
   modal.style.display = "none";
  }
}


//show password
function showpwd() {
  var x = document.getElementById("pwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}



//Read more and less...

function myFunction1() {
  var dots = document.getElementById("dots1");
  var moreText = document.getElementById("more1");
  var btnText = document.getElementById("myBtn1");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

function myFunction2() {
  let dots = document.getElementById("dots2");
  let moreText = document.getElementById("more2");
  let btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

function myFunction3() {
  let dots = document.getElementById("dots3");
  let moreText = document.getElementById("more3");
  let btnText = document.getElementById("myBtn3");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

function myFunction4() {
  let dots = document.getElementById("dots4");
  let moreText = document.getElementById("more4");
  let btnText = document.getElementById("myBtn4");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

// hamburger menu

const hamburger	 = document.querySelector(".hamburger");
const navMenu = document.querySelector(".navbar-menu");


hamburger.addEventListener("click", () => {
	hamburger.classList.toggle("active");
	navMenu.classList.toggle("active");
})

document.querySelectorAll(".nav-link").forEach(n => n. addEventListener("click", () => {
	hamburger.classList.remove("active");
	navMenu.classList.remove("active");
})) 

// ai generated testimonial section

document.addEventListener("DOMContentLoaded", function() {
        var testimonial = document.querySelector(".testimonial");
        var containerWidth = document.querySelector(".testimonial-container").offsetWidth;
        var testimonialWidth = testimonial.offsetWidth;

        function animateTestimonial() {
            var currentPosition = testimonial.getBoundingClientRect().right;
            if (currentPosition <= containerWidth) {
                testimonial.style.right = "0";
                setTimeout(resetTestimonial, 5000); // Change testimonial every 5 seconds
            } else {
                testimonial.style.right = "-" + testimonialWidth + "px";
            }
        }

        function resetTestimonial() {
            testimonial.style.right = "-" + testimonialWidth + "px";
            setTimeout(animateTestimonial, 1000);
        }

        animateTestimonial();
    });

//scroll bottom to top

//$(document).ready(function(){

  //$('#menu').click(function(){
    //$(this).toggleClass('fa-times');
    //$('header').toggleClass('toggle');
  //});

  // $(window).on('scroll load',function(){

  //   $('#menu').removeClass('fa-times');
  //   $('header').removeClass('toggle');

  //   if($(window).scrollTop() > 0){
  //     $('.top').show();
  //   }else{
  //     $('.top').hide();
  //   }

  // });

  // smooth scrolling 

//   $('a[href*="#"]').on('click',function(e){

//     e.preventDefault();

//     $('html, body').animate({

//       scrollTop : $($(this).attr('href')).offset().top,

//     },
//       500, 
//       'linear'
//     );

//   });

// });