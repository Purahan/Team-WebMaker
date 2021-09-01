<?php
  // Session Start
  session_start();
?>
<?php
  if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
<?php
  $error='';
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "muetour";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    $error='Error connecting to website. Please try again.';
  }

  if(!empty($_GET['del'])) {
    $sql = "DELETE * FROM `booked_visit` WHERE id=".$_GET['del'];
    $conn->query($sql);
    
  }

  $sql = "SELECT * FROM `booked_visit` WHERE user_id='".$_SESSION['id']."' AND status='p'";
  $visits = $conn->query($sql);

  $conn->close();
  echo $error;
?>
<!DOCTYPE html>
<html lang="en">
  

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/525fd5b530.js"crossorigin="anonymous"></script>
</head>
<div class="body"></div>
<header>
      
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
            <li class="menu-item"><a href="profile.php" class="menu-link">Profile</a></li>
            <li class="menu-item"><a href="visits.php" class="menu-link active-link text-light">Booked Visits</a></li>
            <li class="menu-item"><a href="history.php" class="menu-link">Visit History</a></li>
            <li class="menu-item"><a href="book.php" class="menu-link">Book Visit</a></li>
            <li class="menu-item pro"><i class="fas fa-user-circle"></i> <?=$_SESSION['fname']." ".$_SESSION['lname'];?></li>
          </ul>
        </div>
      </section>
    </div>
  </nav>

   
    
    
  </header>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center">
            
            <h2 class="text-capitalize font-weight-bold">Booked Visits</h2>
        </div>
    </div>
    <div class="row mt-sm-5">
      <?php
          if ($visits->num_rows > 0) {
            while($row = $visits->fetch_assoc()) {
              $date=date_create($row['date']);
              $arrTime = explode(':',$row['time']);
              if ($arrTime[0]>12) {
                $arrTime[0]=$arrTime[0]-12;
                $AMOrPM = 'PM';
              }else {
                $AMOrPM = 'AM';
              }

              echo '<div class="col-md-6">
              <div class="bg-light px-4 py-5 my-lg-5 my-md-2 my-sm-2">
                
                  <div class="d-flex justify-content-between align-items-center mx-auto">
                    
                      <div>
                   
                          <h2 class="font-weight-bold" style="margin-top: -30px;" >'.$arrTime[0].':'.$arrTime[1].'</h2>
                        <small class="d-block text-center" style="line-height: 0;color: #9b5de5">'.$AMOrPM.'</small>
                        <hr>
                      </div>
                      <h3 style="text-align: right; padding-bottom: 13%;">'.$row["name"].'</h3>
                      <p class="text-center">
                    
                      </p>
                  </div>
                  <div class="my-2">
                      <p class="text-secondary" style="line-height: 2;">'.date_format($date,"d F Y").'</p>
                      <div class="d-flex align-items-center">
                          <span class="d-inline-block rounded-circle" style="width: 15px;height: 15px;background-color: Red"> </span>
                          <small class="ml-1 text-secondary">Pending</small>
                      </div>
                      <a href="museum.php?museum='.$row['museum_id'].'"><button class="custom-btn btn-1" style="margin-top: 25px;">Visit</button></a>
                      <a href="visits.php?del='.$row['id'].'"><button class="custom-btn btn-2" style="margin-top: 25px; margin-left: 200px" onclick="return confirm(\'Are you sure you want to delete this museum visit?\');" role="button"><i class="fa fa-trash"></i> Delete</button></a>
                
                  </div>
              </div>
          </div>';
            }
          } else {
            echo "You don't have any booked visit for any museum yet. <a href='book.php'> Book a Visit Now</a>";
          }
        ?>
    </div>
</div>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

body {
    font-family: 'Poppins', sans-serif !important;
}
.body {
  background-image: linear-gradient(to bottom right, rgba(105,155,200,1) , rgba(181,197,216,1), rgba(105,155,200,1));
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  width: 100%;
  height: 100vh;
  position: fixed;
  top:0;
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

.active-link {
    color: #fff;
    background-color: #0d6efd;
    border-radius: .25rem;
    padding: .5rem 1rem;
    display: block;
}


.pro {
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






.btn-1 {
  background: #b621fe;
  border: none;
  z-index: 1;
}
.btn-1:after {
  position: absolute;
  content: "";
  width: 0;
  height: 100%;
  top: 0;
  right: 0;
  z-index: -1;
  background-color: #663dff;
  border-radius: 5px;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  transition: all 0.3s ease;
}
.btn-1:hover {
  color: #fff;
}
.btn-1:hover:after {
  left: 0;
  width: 100%;
}
.btn-1:active {
  top: 2px;
}

/*button 2*/









.btn-2 {
  background: #db4f4f;
  border: none;
  z-index: 1;
}
.btn-2:after {
  position: absolute;
  content: "";
  width: 0;
  height: 100%;
  top: 0;
  right: 0;
  z-index: -1;
  background-color: #ff0000;
  border-radius: 5px;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  transition: all 0.3s ease;
}
.btn-2:hover {
  color: #fff;
}
.btn-2:hover:after {
  left: 0;
  width: 100%;
}
.btn-2:active {
  top: 2px;
}

/*button end*/




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
  .btn-2 {
    margin-left: -200px;
    justify-content: left;
  }
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
