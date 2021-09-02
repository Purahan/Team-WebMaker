<?php
  // Session Start
  session_start();
?>
<?php
  if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/525fd5b530.js"crossorigin="anonymous"></script>
    <title>Muetour Profile</title>
  </head>
  <body>
  <div class="body"></div>
  <nav class="navbar">
    <div class="container">
      <section class="wrapper">
        <h1 class="brand"><a href="index.html" class="brand-link">Muetour</a></h1>
     
        <button type="button" class="burger" id="burger">
          <span class="burger-line"></span>
          <span class="burger-line"></span>
          <span class="burger-line"></span>
          <span class="burger-line"></span>
        </button>
        <div class="menu" id="menu">
          <ul class="menu-inner">
          <li class="menu-item"><a href="index.php" class="menu-link">Home</a></li>
            <li class="menu-item"><a href="profile.php" class="menu-link active-link text-light">Profile</a></li>
            <li class="menu-item"><a href="visits.php" class="menu-link">Booked Visits</a></li>
            <li class="menu-item"><a href="history.php" class="menu-link">Visit History</a></li>
            <li class="menu-item"><a href="book.php" class="menu-link">Book Visit</a></li>
            <div class="dropdown">
              <button class="dropbtn menu-link pro"><i class="fas fa-user-circle"></i> <?=$_SESSION['fname']." ".$_SESSION['lname'];?>
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="profile.php">Profile <i class="fas fa-id-card"></i></a>
                <a href="log-out.php" class="bg-danger text-light">Log-out <i class="fas fa-sign-out-alt"></i></a>
              </div>
            </div>
          </ul>
        </div>
      </section>
    </div>
  </nav>
  <style>
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

  /* Nav Drop-Down CSS */
.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  text-transform: uppercase;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
/* Drop-Down CSS Ends Here */


  .active-link {
    color: #fff;
    background-color: #0d6efd;
    border-radius: .25rem;
    padding: .5rem 1rem;
    display: block;
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
  margin-top: 10px;
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

  </style>

  <script>
       //navbar
	  
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
  <?php
    if($_SESSION['gender'] == 'f') {
      $gender = 'Female';
    }
    if($_SESSION['gender'] == 'm') {
      $gender = 'Male';
    }
  ?>


<div class="mainn">
<?php if(isset($_GET['password-change']) && $_GET['password-change']=='success') { ?>
<div class="alert alert-success mx-auto" style="width:300px;" role="alert">
  Password changed successfully!
</div>
<?php } ?>
  <div class="cardd">

    <div class="img">
      <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png">

    </div>
    <div class="infoss">
      <div class="namee" style="margin-left: 30px;">
       <h2><strong> <?=$_SESSION['fname'].' '.$_SESSION['lname']?></strong></h2>
      
      </div>
      <p class="textt">
        <b>Email:</b> <?=$_SESSION['email']?>
        <br>
        <br>
        <b>Password:</b> <span class="text-danger">We are not authorized to show you the password over here!</span>
        <br>
        <br>
        <b>Gender:</b> <?=$gender?>
        <br>
        <br>
        <b>DOB:</b> <?php
                      $date=date_create($_SESSION['dob']);
                      echo date_format($date,"d F Y");
                    ?>
        <br>
        <br>
        <b>Phone:</b> <?=$_SESSION['phone']?>
        <br>
        <br>
      </p>
    
      <div class="linkss">
        <a href="profile-edit.php"><button class="edit" style="width: max-content; margin-left: 30px; margin-top: -2%"><i class="fas fa-edit"></i> Edit Profile</button></a>
        
      </div>
    </div>
  </div>
</div>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;700&display=swap');

* {
  margin: 0;
  padding: 0;
  
}

.body {
  font-family: 'Poppins', sans-serif;
  background-image: linear-gradient(to bottom right, rgba(105,155,200,1) , rgba(181,197,216,1), rgba(105,155,200,1));
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  width: 100%;
  height: 100vh;
  position: fixed;
  top:0;
}
.mainn {
    display: block;
    margin: auto;
    width: 100%;
    margin-top: 5%;
   
}
img {
  max-width: 100%;
  display: block;
}

/* Utilities */
.cardd::after,
.cardd img {
  border-radius: 50%;
}

.cardd,
.stats {
  display: flex;
}

.cardd {
  padding: 2.5rem 2rem;
  border-radius: 10px;
  background-color: rgba(255, 255, 255, .5);
  max-width: 100%;
  box-shadow: 0 0 30px rgba(0, 0, 0, .15);
  margin: 1rem;
  position: relative;
  transform-style: preserve-3d;
  overflow: hidden;
}
.cardd::before,
.cardd::after {
  content: '';
  position: absolute;
  z-index: -1;
}
.cardd::before {
  width: 100%;
  height: 100%;
  border: 1px solid #FFF;
  border-radius: 10px;
  top: -.7rem;
  left: -.7rem;
}
.cardd::after {
  height: 15rem;
  width: 15rem;
  background-color: #4172f5aa;
  top: -8rem;
  right: -8rem;
  box-shadow: 2rem 6rem 0 -3rem #FFF
}

.cardd img {
  width: 8rem;
  min-width: 80px;
  box-shadow: 0 0 0 5px #FFF;
}

.infoss {
  margin-left: 1.5rem;
}

.namee {
  margin-bottom: 1rem;
}
.namee h2 {
  font-size: 1.3rem;
}
.namee h4 {
  font-size: .8rem;
  color: #333
}

.textt {
  font-size: .9rem;
  margin-bottom: 1rem;
  margin-left: 30px;
}

.stats {
  margin-bottom: 1rem;
}
.stats li {
  min-width: 5rem;
}
.stats li h3 {
  font-size: .99rem;
}


.linkss button {
  font-family: 'Poppins', sans-serif;
  min-width: 120px;
  padding: .5rem;
  border: 1px solid #222;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
  transition: all .25s linear;
}
.linkss .edit,
.linkss .view:hover {
  background-color: #222;
  color: #FFF;
}
.linkss .view,
.linkss .edit:hover{
  background-color: transparent;
  color: #222;
}

@media screen and (max-width: 450px) {
  .cardd {
    display: block;
  }
  .infoss {
    margin-left: 0;
    margin-top: 1.5rem;
  }

}

  

  </style>
  </body>
</html>