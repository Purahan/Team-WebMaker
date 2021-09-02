<?php
  // Session Start
	session_start();
?>
<?php
  if(isset($_SESSION['id'])){
    header("Location: book.php");
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
    //Check connection
    if ($_POST['con-pwd'] != $_POST['pwd']) {
      $error = '  Confirmed Password is incorrect.';
      return;
    }
    if ($conn->connect_error) {
      //die("Connection failed: " . $conn->connect_error);
      $error='  Error connecting to website. Please try again.';
    } else {

      $sql = "INSERT INTO `users` (first_name, last_name, email, pwd, phone, gender, dob, created_on, modified_on) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".md5($_POST['pwd'])."', '".$_POST['phone']."', '".$_POST['gender']."', '".$_POST['dob']."', '".date("Y-m-d")."', '".date("Y-m-d")."')";

      if ($conn->query($sql) === FALSE) {
        //die("Error: " . $sql . "<br>" . $conn->error);
        if ($conn->errno == 1062){
          $error='  You already have an account with this email id';
        } else{
        //print_r($conn);
        $error='  Error in saving data. Please try again.';
        }

      } else {
        //redirect to another page
        header("Location: login.php");
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
    <title>Muetour-Register</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
      .active-link {
        color: #fff;
        background-color: #0d6efd;
        border-radius: .25rem;
        padding: .5rem 1rem;
        display: block;
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
    width: 100%;
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


    </style>
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
    <form action="register.php" method="post" onsubmit="return pwd_check();">
        <div class="container bg-light my-5 py-4 px-5 rounded">
            <h1 class="fs-1">Register</h1>
            <p>Please fill in this form to create an account.</p>
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
                <label for="f-name">First Name</label>
                <input type="text" class="form-control mt-2" id="fname" placeholder="First name" name="fname" aria-label="First name" required />
              </div>
                <div class="col-md-6">
                  <label for="l-name">Last Name</label>
                  <input type="text" class="form-control mt-2" id="lname" placeholder="Last name" name="lname" aria-label="Last name" required />
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control mt-2" id="email" placeholder="Email" name="email" aria-describedby="email" required />
                    <div id="emailHelp" class="form-text"><i class="bi bi-info-circle"></i> Note that, we won't share your Email with anyone.</div>
                </div>
                <div class="col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control my-2" name="gender" id="gender">
                      <optgroup label="Gender">Gender
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                      </optgroup>
                    </select>
                </div>
            </div>
            <div class="row pb-3" class="pb-1">
                <div class="col-md-6">
                  <label for="pwd ">Password</label>
                  <input type="password" class="form-control mt-2" placeholder="Password" name="pwd" id="pwd" required />
                </div>
                
                <div class="col-md-6">
                  <label for="dob">Date of Birth</label>
                  <input type="date" name="dob" id="dob" class="form-control mt-2" max="01-01-2010" required />
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-md-6">
                    <label for="con-pwd" class="pb-1">Confirm Password</label>
                    <input type="password" class="form-control mt-2" placeholder="Confirm Password" name="con-pwd" id="con-pwd" required />
                </div>
                <div class="col-md-6">
                    <label for="phone" class="pb-1">Phone Number:</label>
                    <input type="tel" class="form-control mt-2" placeholder="Phone Number" name="phone" id="phone" required />
                </div>
            </div>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="btn btn-success w-100 px-2 py-2 fs-5">Register</button>
            <p>Already have an account? <a href="login.php">login</a>.</p>
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
</html>