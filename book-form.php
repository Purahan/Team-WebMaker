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
    $museumId = null;
    if(isset($_REQUEST['book'])) {
      $museumId = $_REQUEST['book'];
    }
    $error='';
    if(!empty($_POST)) {
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
        } else {
          $sql = "SELECT name FROM `museums` WHERE id=".$museumId;
          $result = $result = $conn->query($sql);
        
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $museum_name = $row['name'];
            }
          }

          $sql = "INSERT INTO `booked_visit` (user_id, museum_id, name, time, date, status) VALUES (".$_SESSION['id'].", ".$museumId.", '".$museum_name."', '".$_POST['time']."', '".$_POST['date']."', 'p')";
          if ($conn->query($sql) === FALSE) {
            $error='  Error in saving data. Please try again.';
          }else {
            header("Location: visits.php");
          }
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <title>Booking-form</title>
    </head>
    <body>
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
                                <li class="menu-item"><a href="#" class="menu-link">Profile</a></li>
                                <li class="menu-item"><a href="#" class="menu-link">Booked Visits</a></li>
                                <li class="menu-item"><a href="book.php" class="menu-link active-link text-light">Book Visit</a></li>
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
        </header>
        <form action="book-form.php" method="post">
            <div class="container bg-light my-5 py-4 px-5 rounded opacity-75">
                <h1 class="fs-1">Book a Visit</h1>
                <p>Please fill in this form to book your visit in the museum.</p>
                <hr>
                
                <!--If any error it will be printed here-->
                <?php if(!empty($error)) { ?>						
                    <div class="error alert alert-danger">
                      <i class="bi bi-exclamation-triangle"></i>
                        <?php echo $error;?>
                    </div>
				<?php } ?>

                <div class="row my-3">                    
                    <div class="col-md-6">
                        <label for="book-date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" aria-describedby="book-date" min="<?=date("dd-mm-YYYY")?>" required />
                    </div>
                    <div class="col-md-6">
                        <label for="book-time" class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" aria-describedby="book-time" required />
                    </div>
                    <div class="col-12 mt-3 justify-content-center">
                        <input type="hidden" name="book" value="<?=$museumId;?>" />
                        <button type="submit" class="btn btn-success">Book a Visit for this date and time.</button>
                    </div>
                </div>

                <hr>
            </div>
        </form>
    </body>
</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body{
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
        top: 0;
        z-index: -1;
    }
    a:hover {
    text-decoration: none;
}
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap");

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
