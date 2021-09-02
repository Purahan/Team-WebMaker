<?php
  // Session Start
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/525fd5b530.js"crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- ===== HEADER ====== -->
    <div class="hero">

      <?php
        if(!isset($_SESSION['id'])){
          echo '<header id="myHeader">
          <!-- logo -->
          <a class="logo" href="#">Muetour</a>
          <!-- navbar -->
          <nav class="nav-bar">
            <ul class="nav-items">
              <li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
              <li class="nav-item"><a href="#about-us" class="nav-link">ABOUT</a></li>
              <li class="nav-item"><a href="#services" class="nav-link">SERVICES</a></li>
              <li class="nav-item"><a href="#testimonials" class="nav-link">TESTIMONIALS</a></li>
              <li class="nav-item"><a href="#footer" class="nav-link">CONTACT</a></li>
              <li class="nav-item"><a href="register.php" class="nav-link">REGISTER</a></li>
              <li class="nav-item"><a href="login.php" class="nav-link">LOGIN</a></li>
            </ul>
          </nav>
          <div class="menu-icons">
            <i class="bx bx-menu"></i>
            <i class="bx bx-x"></i>
          </div>
        </header>';  
        }
        else {
          echo '<header id="myHeader">
          <!-- logo -->
          <a class="logo" href="#">Muetour</a>
          <!-- navbar -->
          <nav class="nav-bar">
            <ul class="nav-items">
              <li class="nav-item"><a href="#" class="nav-link">HOME</a></li>
              <li class="nav-item"><a href="#services" class="nav-link">PROFILE</a></li>
              <li class="nav-item"><a href="visits.php" class="nav-link">BOOKED VISITS</a></li>
              <li class="nav-item"><a href="history.php" class="nav-link">VISIT HISTORY</a></li>
              <li class="nav-item"><a href="book.php" class="nav-link">BOOK VISIT</a></li>
              <li class="nav-item pro" style="text-transform: uppercase;"><i class="fas fa-user-circle"></i> '.$_SESSION["fname"].' '.$_SESSION["lname"].'</li>
            </ul>
          </nav>
          <div class="menu-icons">
            <i class="bx bx-menu"></i>
            <i class="bx bx-x"></i>
          </div>
        </header>';
        }
      ?>
      <!-- ===== BODY ====== -->
      <!-- home section -->
      <section id="hero" class="section_1 home container">
        <div class="slogan">
          <h1 class="slogan-title">YOUR HAPPINESS IS OUR PRIORITY</h1>
          <p class="slogan-text">Even in these hard times we give you a tour of museum from your home.</p>
          <div class="hero-btn"><a href="#" class="home-btn-link">Take A Tour</a></div>
        </div>
      </section>
    </div>
    <!-- about us section -->
    <section id="about-us" class="section_2 about-us">
      <div class="about-container">
        <div class="about">
          <h2 class="about-title title">about us</h2>
          <div class="about-text-container">
            <div class="feature-1 feature">
              
              <p class="feature_desc">We show you the best arts from the world From the comfort of your home. You can choose yourself any time slot. So, we even give you a tour in the museum for free. So, take a tour to enjoy, see, and know more about the beautiful arts in the world. Thank you for reading. </p>
            </div>
            
          </div>
        </div>

        <!-- about image -->
        <img src="https://theculturetrip.com/wp-content/uploads/2018/11/2013_npg_room_4_through_to_11.jpg" class="about-img" alt="Art Museum">
      </div>
    </section>
    <!-- services section -->
    <section id="services" class="section_3 services container">
      <h2 class="services-title title">Services that we give to our customers</h2>
      <div class="services-container">
        <div class="service service-1">
          <span>01</span>
          <h2 class="service-title">Free Tour.</h2>
          <p class="service-description">We always give you free tours because we love to see you happy</p>
        </div>
        <div class="service service-2">
          <span>02</span>
          <h2 class="service-title">We take care of you.</h2>
          <p class="service-description">If you face any difficulty you can email us and we will surely reply. because you are the best</p>
        </div>
        <div class="service service-3">
          <span>03</span>
          <h2 class="service-title">Best Arts</h2>
          <p class="service-description">We show you the best arts from all over the world and from the best museums in the world.</p>
        </div>
        <div class="service service-4">
          <span>04</span>
          <h2 class="service-title">Available Anytime.</h2>
          <p class="service-description">We are available 24/7 unlike other museums so you can enjoy our museum anytime.</p>
        </div>
      </div>
    </section>
    <!-- testimonials section -->
    <section id="testimonials" class="section_4 testimonials container">
      <div class="sub__container">
        <h2 class="testy_title">Views of some of our customers</h2>
        <div class="glide_slides">
          <div class="testimonial bb1 glide_slide">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Rubio_Circle.png" alt="babysitter profile picture" class="profile">
            <h2 class="testy-monial-name">John Doe</h2>
            <h6>From Punjab</h6>
            <br>
            

            
            <p class="testy-monial-story">Their museum is so good, best art paintings I enjoyed a lot.</p>
          </div>

          <div class="testimonial glide_slide">
            <img src="https://www.pngitem.com/pimgs/m/75-758282_walter-circle-person-photo-in-circle-hd-png.png?raw=true" alt="babysitter profile picture" class="profile">
            <h2 class="testy-monial-name">John Doe</h2>
            <h6>From Paris</h6>
            <br>
                    
            <p class="testy-monial-story">The best thing of Muetour is that we don't have to pay anything its free.</p>
          </div>

          <div class="testimonial glide_slide">
            <img src="https://www.kindpng.com/picc/m/155-1550391_faces-in-circle-png-transparent-png.png" alt="babysitter profile picture" class="profile">
            <h2 class="testy-monial-name">John Doe</h2>
            <h6>From Assam</h6>
            <br>
          
            
            <p class="testy-monial-story">Wow, I can enjoy a museum ride from the comfort of my home its so good.</p>
          </div>

          <div class="testimonial glide_slide">
            <img src="https://www.pngitem.com/pimgs/m/128-1284293_marina-circle-girl-picture-in-circle-png-transparent.png" alt="babysitter profile picture" class="profile">
            <h2 class="testy-monial-name">John Doe</h2>
            <h6>From California</h6>
            <br>
            
            
            <p class="testy-monial-story">They are the best they give a tour of museum from the comfort of homes and even for free.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== FOOTER ====== -->
    <footer id="footer">
      <h2 class="footer-title container">Our Contact</h2>
      <div class="top-footer container">
        <div>
          
        
          <div class="phone footer-element">
            <i class="bx bx-phone"></i>
            <p class="phone-text">+91 0123456789</p>
          </div>
          <div class="email footer-element">
            <i class="bx bx-envelope"></i>
            <p class="email-text">example@gmail.com</p>
          </div>
        </div>
        <div class="mapouter">
          <div class="gmap_canvas">
            <iframe id="gmap_canvas" src="https://nypost.com/wp-content/uploads/sites/2/2013/08/mona-300x300.jpg?quality=80&strip=all" width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            
            
          </div>
        </div>
      </div>
      
    </footer>
  </body>
  </html>


<style>
  /*  ===== EXTERNAL LINKS ======  */

/* Montserrat font family */
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap");

/*  ===== VARIABLE ======  */
:root {
  --primary-clr: hsl(237, 20%, 43%);
  --second-clr: hsl(257, 21%, 50%);
  --primary-clr-alt: rgb(150, 139, 179);
  --white-clr: hsl(260, 60%, 99%);
  --light-indigo-clr: hsl(277, 82%, 96%);
  --pink-clr: hsl(306, 26%, 84%);
  --orange-color: hsl(12, 100%, 72%);
  --light-green-clr: hsl(171, 40%, 86%);
}

/*  ===== BASE ======  */
*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.container {
  padding: 1.2rem 2rem;
}

li {
  list-style: none;
}
img {
  width: 100%;
  height: auto;
}
body {
  font-family: "Montserrat", "Avenir", sans-serif;
  background-color: var(--white-clr);
  display: flex;
  flex-direction: column;
}
/*  ===== HEADER ======  */
.header-scrolled {
  background-color: var(--white-clr);
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 40;
  opacity: 0.8;
}

.pro {
  color: #fff;
  font-size: 1.1rem;
  letter-spacing: 0.1rem;
  font-weight: 500;
}

.header-scrolled .pro {
  color: #000;
}

header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.logo {
  font-family: inherit;
  font-size: 2rem;
  font-weight: bold;
  text-decoration: none;
  color: #fff;
  text-transform: uppercase;
}

.header-scrolled .logo {
  color: hsl(255, 100%, 60%);
}
.header-scrolled .logo:hover {
  color: #0056b3;
}

.nav-items {
  display: flex;
}

.header-scrolled .nav-link{
  color: hsl(0, 0%, 7%);
}

.nav-item {
  margin-left: 1.5rem;
}
.nav-link {
  position: relative;
  text-decoration: none;
  font-size: 1.1rem;
  letter-spacing: 0.1rem;
  font-weight: 500;
  color: rgb(239, 239, 239);
}
.nav-link::before {
  content: "";
  background-color: var(--orange-color);
  height: 0.2rem;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 300ms;
}
.nav-link:hover::before {
  transform: scaleX(1);
  transform-origin: left;
}
.menu-icons {
  display: none;
}
.bx-menu,
.bx-x {
  cursor: pointer;
  font-size: 2.5rem;
  color: var(--white-clr);
}
.bx-x {
  display: none !important;
}
.hide-icon {
  display: none !important;
}
.show-icon {
  display: block !important;
}
.header-scrolled .bx-menu, .header-scrolled .bx-x {
  background-color: #fff;
  color: #000;
}
/*  ===== BODY ========  */
.hero {
  background-image: url("https://i.pinimg.com/originals/c4/1a/1c/c41a1cc247ec00baab6e163d032f879d.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
}
.section_1 {
  height: 100vh;
}
.slogan {
  margin-top: 3rem;
}
.slogan .slogan-title {
  color: rgb(239, 239, 239);
  font-size: 2rem;
  letter-spacing: 0.01rem;
  max-width: 30rem;
}
.slogan .slogan-text {
  color: var(--white-clr);
  color: rgb(226, 226, 226);
  font-size: 1.2rem;
  letter-spacing: 0.02rem;
  margin: 1rem 0;
  max-width: 28rem;
}
.hero-btn {
  cursor: pointer;
  background-color: hsla(12, 100%, 72%, 0.822);
  display: flex;
  align-items: center;
  justify-content: center;
  width: 200px;
  padding: 0.8rem 0;
  border-radius: 5rem;
  margin-top: 2rem;
  transition: background-color 300ms;
}
.hero-btn:hover,
.hero-btn:focus {
  background-color: hsl(12, 100%, 72%);
}
.home-btn-link {
  color: var(--white-clr);
  text-decoration: none;
  font-size: 1.1rem;
  pointer-events: none;
}
/* - About - */
.about-container img {
  display: none;
}
.about {
  padding: 2rem 1rem;
  background-color: var(--primary-clr);
}
.about .about-title {
  text-transform: capitalize;
  color: var(--white-clr);
  font-size: 2rem;
  margin-bottom: 2rem;
  position: relative;
}

.bx-check-circle {
  font-size: 1.2rem;
  margin-right: 1rem;
  color: var(--white-clr);
}
.feature_desc {
  color: var(--white-clr);
  font-size: 1.2rem;
  letter-spacing: 0.05rem;
  opacity: 0.8;
  max-width: 30rem;
  line-height: 1.5rem;
}

/* section 3 */
.services {
  margin: 3rem auto;
}
.services-title {
  color: var(--primary-clr);
  max-width: 19.5rem;
  font-size: 1.25rem;
  font-weight: 600;
  letter-spacing: 0.02rem;
  position: relative;
  padding-bottom: 0.9rem;
  margin-bottom: 5rem;
}
.services-title::before {
  content: "";
  position: absolute;
  height: 0.3rem;
  width: 12.9rem;
  background-color: var(--orange-color);
  position: absolute;
  bottom: 0;
}
.services-container {
  margin: 2rem 0;
  display: grid;
  
  row-gap: 3rem;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}
.service {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  max-width: 20rem;
  position: relative;
  padding: 2rem 2.5rem;
  border: thin solid rgba(150, 139, 179, 0.1);
}
.service span {
  font-size: 1.1rem;
  font-weight: 800;
  color: rgba(88, 90, 133, 0.219);
  position: absolute;
  top: 0.9rem;
  left: 1.2rem;
}
.service-title {
  color: var(--primary-clr);
  margin: 1rem 0;
  font-size: 1.3rem;
  font-weight: 600;
  letter-spacing: 0.005rem;
}
.service-description {
  color: var(--primary-clr);
  font-size: 1.09rem;
  line-height: 1.5rem;
  position: relative;
  padding-bottom: 1rem;
}
.service-description::before {
  content: "";
  background-color: var(--orange-color);
  left: 0;
  right: 0;
  height: 0.3rem;
  position: absolute;
  bottom: 0;
}
/* section 4 */
.section_4 {
  background-color: var(--light-indigo-clr);
  
  background-size: 35rem;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
  display: flex;
  align-items: center;
  justify-content: center;
}
.testy_title {
  color: var(--primary-clr);
  font-size: 1.25rem;
  letter-spacing: 0.05rem;
  max-width: 15rem;
  position: relative;
  padding: 0.9rem 0;
}
.testy_title::before {
  
  height: 0.2rem;
  width: 7rem;
  background-color: var(--orange-color);
  position: absolute;
  bottom: 0;
}
.testimonial {
  margin: 3rem 0;
  max-width: 20rem;
  padding: 1rem 1rem;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  background: linear-gradient(
    -45deg,
    hsla(0, 0%, 94%, 0.1),
    hsla(0, 0%, 94%, 0.3)
  );
  backdrop-filter: blur(5px);
  -webkit-backdrop-filter: blur(5px);
  border-radius: 10px;
  border: thin solid rgb(255, 255, 255);
}
.testimonial img {
  width: 25%;
  margin-bottom: 1rem;
}
.testy-monial-name {
  color: var(--primary-clr);
  font-size: 1.7rem;
  font-weight: 500;
}

.testy-monial-story {
  color: var(--primary-clr);
  font-size: 1.1rem;
  line-height: 1.6rem;
  max-width: 20rem;
  margin: 0.5rem 0 0.2rem 0;
}


/*  ===== FOOTER ======  */
footer {
  background-image: url("https://raw.githubusercontent.com/r-e-d-ant/Babysitter-center-landing-page/8e5d8cc959f1cd34712ed196f6ea3676b7ab5929/assets/img/wave.svg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
}
.top-footer {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.footer-title {
  color: var(--white-clr);
  font-size: 4rem;
  font-weight: 400;
  padding-top: 7rem;
}
.footer-element {
  display: flex;
  align-items: center;
  margin: 2rem 0;
}
.bx-home,
.bx-phone,
.bx-envelope {
  color: var(--white-clr);
  font-size: 1.1rem;
  margin-right: 1rem;
}
.address-text,
.phone-text,
.email-text {
  color: var(--white-clr);
  font-size: 1rem;
  opacity: 0.9;
}
.mapouter {
  position: relative;
  text-align: right;
}
.gmap_canvas {
  overflow: hidden;
  background: none !important;
  border-radius: 50%;
}
.end-footer {
  background-color: rgb(88, 90, 133);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative;
}


/*  ===== MEDIA QUERIES ======  */
@media screen and (max-width: 1000px) {
  /*  ===== BASE ======  */
  .container {
    padding: 0.8rem 0.5rem;
  }
  /*  ===== HEADER ======  */
  header {
    padding: 0.8rem 0.5rem;
  }
  .menu-icons {
    display: block;
    position: fixed;
    background-color: black; 
    right: 0;
  }
  .nav-bar {
    background-color: var(--orange-color);
    border-top-left-radius: 5px;
    width: 80%;
    height: 100vh;
    position: absolute;
    top: 4.5rem;
    right: 0;
    transform: scalex(0);
    transform-origin: right;
    transition: transform 300ms;
    z-index: 1;
    position:fixed;
  }
  .show-menu {
    transform: scalex(1);
  }
  .nav-items {
    display: flex;
    flex-direction: column;
    margin-top: 1.5rem;
  }
  .nav-item {
    margin: 0.8rem 2rem;
  }
  .nav-link {
    background-image: none;
    color: var(--primary-clr);
    font-weight: 500;
    font-size: 1.3rem;
  }
  .nav-link::before {
    background-color: var(--primary-clr);
  }
  /*  ===== BODY ========  */
  .home_img {
    display: none;
  }
}
@media screen and (min-width: 481px) {
  header {
    padding: 1.2rem 1.5rem;
  }
  /*  ===== BODY ========  */
  .slogan {
    padding: 0 1.5rem;
  }
  .slogan .slogan-title {
    font-size: 2.2rem;
    max-width: 38rem;
  }
  .slogan .slogan-text {
    font-size: 1.15rem;
    margin-top: 1.3rem;
    max-width: 30rem;
    line-height: 1.5rem;
  }
  .hero-btn {
    width: 300px;
    padding: 0.8rem 0;
    border-radius: 5rem;
    margin-top: 3rem;
  }
  .home-btn-link {
    font-size: 1.3rem;
  }
  /* services */
  .services-container {
    column-gap: 1rem;
  }
}

@media screen and (min-width: 1000px) {
  header {
    padding: 1.2rem 5rem;
  }
  /*  ===== BODY ========  */
  .section_1 {
    padding: 0 5rem;
    height: 80vh;
  }
  .slogan {
    margin-top: 8rem;
  }
  .slogan .slogan-title {
    font-size: 3rem;
  }
  .hero-btn {
    width: 280px;
    margin-top: 1.8rem;
  }
  .home-btn-link {
    font-size: 1.2rem;
  }
  /* - About - */
  .section_2 {
    height: 100vh;
    background-color: var(--primary-clr);
    position: relative;
  }
  .about {
    background: linear-gradient(
      -45deg,
      hsla(0, 0%, 94%, 0.1),
      hsla(0, 0%, 94%, 0.3)
    );
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border-radius: 10px;
    border: thin solid rgb(239, 239, 239, 0.6);
    padding: 2rem 1.5rem;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 20rem;
    z-index: 1;
  }
  .about-container img {
    display: block;
    position: absolute;
    max-width: 50%;
    top: 50%;
    transform: translateY(-50%);
    right: 0;
  }
  .about .about-title {
    font-size: 1.8rem;
    margin-bottom: 1.2rem;
  }
  .feature_desc {
    font-size: 1.05rem;
    letter-spacing: 0.05rem;
    opacity: 0.8;
    max-width: 25rem;
    line-height: 1.3rem;
  }
  /* section 3 */
  .services {
    margin: 3rem 0;
  }
  .service-title {
    margin-top: 2rem;
    font-size: 1.1rem;
  }
  .service span {
    top: 1.5rem;
    left: 1.3rem;
  }
  .service-description {
    font-size: 0.9rem;
  }
  .services-container {
    row-gap: 5rem;
    column-gap: 1rem;
    place-items: end;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
  /* section 4 */
  .section_4 {
    display: block;
    margin: 3rem 0;
  }
  .glide_slides {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  }
  .testimonial {
    height: 80%;
    margin-right: 1.5rem;
  }
  .testimonial img {
    width: 25%;
  }
  .testy-monial-name {
    font-size: 1.4rem;
    font-weight: 400;
  }
  .testy-monial-story {
    font-size: 0.95rem;
    opacity: 0.8;
    margin: 0rem 0 0.2rem 0;
    line-height: 1.5rem;
  }
  
  
  /* footer */
  .top-footer {
    flex-direction: row;
    justify-content: space-between;
  }
  
  .phone-text,
  .email-text {
    font-size: 0.9rem;
  }
}

</style>

<script>
  "use strict";

const navbar = document.querySelector(".nav-bar");

const openMenu = document.querySelector(".bx-menu");
const closeMenu = document.querySelector(".bx-x");

// Open menu

openMenu.addEventListener("click", (e) => {
  if (e.target.classList.contains("bx-menu")) {
    navbar.classList.add("show-menu");
    openMenu.classList.add("hide-icon");
    closeMenu.classList.add("show-icon");
  }
});

// CLose menu

closeMenu.addEventListener("click", (e) => {
  if (e.target.classList.contains("bx-x")) {
    navbar.classList.remove("show-menu");
    openMenu.classList.remove("hide-icon");
    closeMenu.classList.remove("show-icon");
  }
});

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("header-scrolled");
  } else {
    header.classList.remove("header-scrolled");
  }
}

</script>
