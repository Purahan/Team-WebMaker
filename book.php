<?php
	//Start Session
	session_start();
?>
<?php
  $error='';
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "muetour";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  $sql = "SELECT * FROM `museums` WHERE 1";
  $museums = $conn->query($sql);
  // Check connection
  if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    $error='Error connecting to website. Please try again.';
  } else {
      
  }
  $conn->close();
  echo $error;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/525fd5b530.js"crossorigin="anonymous"></script>
</head>
<body>
<header>
      
  <nav class="navbar sticky">
    <div class="container">
      <section class="wrapper">
        <h1 class="brand"><a href="index.php" class="brand-link">Muetour</a></h1>
        <button type="button" class="burger" id="burger">
          <span class="burger-line"></span>
          <span class="burger-line"></span>
          <span class="burger-line"></span>
          <span class="burger-line"></span>
        </button>
        <div class="menu" id="menu">
          <ul class="menu-inner">
            <li class="menu-item"><a href="index.php" class="menu-link">Home</a></li>
            <li class="menu-item"><a href="#" class="menu-link">Profile</a></li>
            <li class="menu-item"><a href="#" class="menu-link">Booked Visits</a></li>
            <li class="menu-item"><a href="book.php" class="menu-link active-link text-light">Book Visit</a></li>
            <li class="menu-item menu-link">Something</li>
          </ul>
        </div>
      </section>
    </div>
  </nav>

   
    
    
  </header>
    <div class="container my-5">
      <div class="row my-3">
        <div class="mt-5 col-md-12 text-center">
          <h2 class="text-capitalize font-weight-bold">Book a Visit</h2>
        </div>
      </div>
    
    <div class="row">
      <?php
        if ($museums->num_rows > 0) {
          while($row = $museums->fetch_assoc()) {
            echo '<div class="card mb-3 border-0">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="'.$row["pic_1"].'" class="img-fluid rounded-start" alt="">
                        </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h3 class="card-title">'.$row["name"].'</h3>
                                    <p class="card-text" style="text-align: justify;">'.$row["description"].'</p>
                                    <a href=""><button class="mt-4 btn btn-success">Book a Visit</button></a>
                                    <a href="'.$row["ref_link"].'"><button class="mx-2 mt-4 btn btn-info">Get more info <i class="bi bi-info-circle"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div> 
                  </div>';
          }
        }
      ?>

    </div>
  </body>
</html>
<style>
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 4;
}
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

  body {
      font-family: 'Poppins', sans-serif !important;
  }
  html,
  body {
    background-image: linear-gradient(to bottom right, rgba(105,155,200,1) , rgba(181,197,216,1), rgba(105,155,200,1));
    background-repeat: no-repeat;

  }
  a:hover {
      text-decoration: none;
  }
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



  /*  ===== HEADER ======  */
  :root {
    --color-white: hsl(0, 0%, 100%);
    --color-light: hsl(206, 33%, 96%);
    --color-black: hsl(0, 0%, 7%);
    --color-night: hsl(214, 100%, 10%);
    --color-purple: hsl(291, 64%, 42%);
    --color-indigo: hsl(255, 100%, 60%);
    --shadow-small: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-medium: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
      0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-large: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
      0 4px 6px -2px rgba(0, 0, 0, 0.05);
  }

  html {
    font-size: 100%;
    box-sizing: border-box;
    scroll-behavior: smooth;
  }

  *,
  *::before,
  *::after {
    padding: 0;
    margin: 0;
    box-sizing: inherit;
    list-style: none;
    list-style-type: none;
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
  }

  body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    
  }

  a,
  button {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    cursor: pointer;
    border: none;
    outline: none;
    background: none;
    text-decoration: none;
  }

  img,
  video {
    display: block;
    max-width: 100%;
    height: auto;
    -o-object-fit: cover;
      object-fit: cover;
  }

  .container {
    max-width: 83rem;
    width: 100%;
    height: auto;
    margin: 0 auto;
    padding: 0 2rem;
  }

  .brand-link {
    font-family: inherit;
    font-size: 1.75rem;
    font-weight: 700;
    line-height: inherit;
    border: none;
    outline: none;
    color: var(--color-indigo);
    text-transform: uppercase;
    text-rendering: optimizeLegibility;
  }

  .navbar {
    max-width: 100%;
    height: auto;
    margin: 0 auto;
    padding: 0.75rem 0;
    border: none;
    outline: none;
    color: var(--color-black);
    background: var(--color-white);
    box-shadow: var(--shadow-large);
  }
  .navbar .wrapper {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: auto;
    margin: 0 auto;
  }
  .navbar .burger {
    position: relative;
    display: none;
    cursor: pointer;
    width: 2rem;
    height: 1rem;
    border: none;
    outline: none;
    opacity: 0;
    visibility: hidden;
    background: none;
    transform: rotate(0deg);
    transition: 0.35s ease-in-out;
  }
  .navbar .burger-line {
    display: block;
    position: absolute;
    width: 100%;
    height: 2px;
    left: 0;
    border: none;
    outline: none;
    opacity: 1;
    border-radius: 0.25rem;
    background: var(--color-black);
    transform: rotate(0deg);
    transition: 0.25s ease-in-out;
  }

  /*button*/

  .custom-btn {
    width: 130px;
    height: 40px;
    color: #fff;
    border-radius: 5px;
    padding: 10px 25px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
    7px 7px 20px 0px rgba(0,0,0,.1),
    4px 4px 5px 0px rgba(0,0,0,.1);
    outline: none;
  }
/* Buttons End */
  .navbar .burger-line:nth-child(1) {
    top: 0;
  }
  .navbar .burger-line:nth-child(2), .navbar .burger-line:nth-child(3) {
    top: 0.5rem;
  }
  .navbar .burger-line:nth-child(4) {
    top: 1rem;
  }
  .navbar .burger.active .burger-line:nth-child(1), .navbar .burger.active .burger-line:nth-child(4) {
    top: 1.25rem;
    width: 0%;
    left: 50%;
  }
  .navbar .burger.active .burger-line:nth-child(2) {
    transform: rotate(45deg);
  }
  .navbar .burger.active .burger-line:nth-child(3) {
    transform: rotate(-45deg);
  }
  .navbar .menu-inner {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 2rem;
  }
  .navbar .menu-link {
    font-family: inherit;
    font-size: 1rem;
    font-weight: 600;
    line-height: inherit;
    border: none;
    color: var(--color-black);
    text-transform: uppercase;
    text-rendering: optimizeLegibility;
    transition: all 0.35s ease-in-out;
  }
  .navbar .menu-link.active, .navbar .menu-link:hover {
    border: none;
    outline: none;
    color: var(--color-indigo);
  }

  @media only screen and (max-width: 768px) {
    .navbar .burger {
      display: block;
      opacity: 1;
      visibility: visible;
    }
    .navbar .menu {
      width: 100%;
      max-height: 0rem;
      padding: 0;
      opacity: 0;
      visibility: hidden;
      overflow: hidden;
      transition: all 0.35s ease;
    }
    .navbar .menu.active {
      opacity: 1;
      visibility: visible;
    }
    .navbar .menu-inner {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      gap: 0.75rem;
      padding: 1rem 0;
    }
  }
  .active-link {
    color: #fff;
    background-color: #0d6efd;
    border-radius: .25rem;
    padding: .5rem 1rem;
    display: block;
  }
  </style>
  <script>
    // Initialize All Required DOM Element
  const burgerMenu = document.getElementById("burger");
  const navbarMenu = document.getElementById("menu");

  // Initialize Responsive Navbar Menu
  burgerMenu.addEventListener("click", () => {
    burgerMenu.classList.toggle("active");
    navbarMenu.classList.toggle("active");

    if (navbarMenu.classList.contains("active")) {
      navbarMenu.style.maxHeight = navbarMenu.scrollHeight + "px";
    } else {
      navbarMenu.removeAttribute("style");
    }
  });

  </script>
