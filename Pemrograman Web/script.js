/* Function pas pencet link di navbar/dropdown auto scroll */
document.querySelectorAll('.links li a, .dropdown_menu li .add').forEach(link => {
  link.addEventListener('click', handleLinkClick);
});

function handleLinkClick(event) {
  event.preventDefault();
  
  const sectionID = event.target.textContent.toLowerCase();

  const section = document.getElementById(sectionID);

  if (section) {
    section.scrollIntoView({ behavior: 'smooth' });
  }
}

/* function dropdown */
const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropDownMenu = document.querySelector('.dropdown_menu')
      
toggleBtn.onclick = function() {
  
  dropDownMenu.classList.toggle('open')
  const isOpen = dropDownMenu.classList.contains('open')
  
  toggleBtnIcon.classList = isOpen
  ? 'fa-solid fa-xmark'
  : 'fa-solid fa-bars'
     
}

/* transition nongol section */
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".navbar .links a");
const dropdownLinks = document.querySelectorAll(".dropdown_menu .add");

function toggleOpacity() {
  sections.forEach((section) => {
    if (section.id !== "beranda") {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      if (window.pageYOffset >= sectionTop - sectionHeight / 4) {
        section.style.opacity = "1";
      } else {
        section.style.opacity = "0";
      }
    }
  });
}

window.addEventListener("scroll", toggleOpacity);

[...navLinks, ...dropdownLinks].forEach((link) => {
  link.addEventListener("click", (event) => {
    event.preventDefault();
    const targetSection = document.querySelector(link.hash);
    targetSection.scrollIntoView({ behavior: "smooth" });
  });
});

/* sign*/
const getStartedBtn = document.getElementById("get-started-btn");

getStartedBtn.addEventListener("click", function() {
  window.location.href = "login/halamanlogin.php";
});

/* transisi anggota */
var slideIndex = 1;

showSlides(slideIndex);

function plusSlides(n) {

  /*animasi gambar anggota -----------------------------------------------------*/
  var imageAnggota = document.getElementsByClassName('image-container');      /**/ 
  if (n == -1) {                                                              /**/ 
    for (let i=0; i<imageAnggota.length; i++) {                               /**/ 
      imageAnggota[i].style.animationName = 'slideAnimationKanan';            /**/ 
    }                                                                         /**/ 
  } else if (n == (1)) {                                                      /**/ 
    for (let i=0; i<imageAnggota.length; i++) {                               /**/ 
      imageAnggota[i].style.animationName = 'slideAnimationKiri';             /**/ 
    }                                                                         /**/ 
  }                                                                           /**/
   /*----------------------------------------------------------------------------*/        
  setInterval(showSlides(slideIndex += n), 1000);                             
 
  
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  
  slides[slideIndex - 1].style.display = "block";
}
