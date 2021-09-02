<?php
	//Start Session
	session_start();
?>
<?php
  if(!isset($_SESSION['id'])){
    header("Location: index.php");
  }
?>
<?php
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
        $sql = "SELECT id FROM `users` WHERE id=".$_SESSION['id']." and pwd=MD5('".$_POST['o-pwd']."')";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $sql = "UPDATE users SET pwd=MD5('".$_POST['n-pwd']."') WHERE id=".$_SESSION['id']." and pwd=MD5('".$_POST['o-pwd']."')";
            $result = $conn->query($sql);
            if ($result) {
                header("Location: profile.php?password-change=success");
            } else {
                $error='  Error in updating password. Please try again.';
            }
        } else {
            $error='  Your Entered Password is incorrect.';
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
        <title>Muetour-Change Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body style="background-color: rgb(187, 203, 161); font-family: century gothic, Helvetica, sans-serif;">
     <div class="body"></div>
     <nav class="navbar">
        <div class="header-container">
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
                <li class="menu-item"><a href="index.php#about-us" class="menu-link">About</a></li>
                <li class="menu-item"><a href="index.php#services" class="menu-link">Services</a></li>
                <li class="menu-item"><a href="index.php#testimonials" class="menu-link">Testimonial</a></li>
                <li class="menu-item"><a href="index.php#footer" class="menu-link">Contact</a></li>
                <li class="menu-item"><a href="register.php" class="menu-link active-link text-light">Register</a></li>
                <li class="menu-item"><a href="login.php" class="menu-link">Login</a></li>
              
              </ul>
            </div>
          </section>
        </div>
      </nav>
    </div>
    <form action="pwd-change.php" method="post">
        <div class="container bg-light my-5 py-4 px-5 rounded">
            <h1 class="fs-1">Update Profile</h1>
            <p>Please update your details filled in this form.</p>
            <hr>
            
            <!--If any error it will be printed here-->
            <?php if(!empty($error)) { ?>						
                <div id="error" class="error alert alert-danger" role="alert">
                  <i class="bi bi-exclamation-triangle"></i>
                  <?php echo $error;?>
                </div>
            <?php } ?>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="o-pwd">Old Password</label>
                <input type="Password" class="form-control mt-2" id="old" vlaue="" placeholder="Old Password" name="o-pwd" aria-label="o-pwd" required />
              </div>
                <div class="col-md-6">
                  <label for="n-pwd">New Password</label>
                  <input type="password" class="form-control mt-2" id="n-pwd" value="" placeholder="New Password" name="n-pwd" aria-label="n-pwd" required />
                </div>
            </div>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="btn btn-success w-100 px-2 py-2 fs-5">Change Password</button>
        </div>
    </form>
  </body>
  <script>
    function pwd_check() {
      var conpwd = document.getElementById("con-pwd").value;				
      var pwd = document.getElementById("pwd").value;
      console.log('checking password.', conpwd, pwd);
      return conpwd == pwd;
    }
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
  </body>
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
    top: 0;
    z-index: -1;
  }
  .brand-name {
    color: hsl(255, 100%, 60%);;
  }
  .brand-name:hover {
    color: #0056b3;
  }
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
  .active-link {
    color: #fff;
    background-color: #0d6efd;
    border-radius: .25rem;
    padding: .5rem 1rem;
    display: block;
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

  .header-container {
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
