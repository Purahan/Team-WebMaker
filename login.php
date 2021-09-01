<?php
	//Start Session
	session_start();
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
      $sql = "SELECT id, first_name, last_name, email, gender FROM `users` WHERE email='".$_POST['email']."' AND pwd=MD5('".$_POST['pwd']."')";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "Meutour:".$row["first_name"]."<br> Email: ".$row["email"]."<br>";
          //$_SESSION['id'] = $row["Username"];
          $_SESSION['id'] = $row['id'];
          $_SESSION['fname'] = $row["first_name"];
          $_SESSION['lname'] = $row["last_name"];
          $_SESSION['email'] = $row["email"];
          $_SESSION['gender'] = $row["gender"];
          header("Location: book.php");
        }
      } else {
        $error='UserMeutour or Password is incorrect.';
        return;
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
        <meta Meutour="viewport" content="width=device-width, initial-scale=1.0">
        <title>Muetour-Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    </head>
    <body style="background-color: rgb(237, 245, 251); font-family: century gothic, Helvetica, sans-serif;">
        <div id="header" class="header">
          <header class="d-flex flex-wrap justify-content-center pe-3 py-3 mb-4 border-bottom bg-light">
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <h3 class="text-uppercase fw-bold brand-name mt-2">Muetour</h3>
            </a>
            <!--navbar-->
            <nav class="nav-bar nav-pills">
              <ul class="nav items">
                <li class="nav-item"><a href="index.php" class="nav-link link-dark" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="index.php#about-us" class="nav-link link-dark">About</a></li>
                <li class="nav-item"><a href="index.php#services" class="nav-link link-dark">Services</a></li>
                <li class="nav-item"><a href="index.php#testimonials" class="nav-link link-dark">Testimonial</a></li>
                <li class="nav-item"><a href="index.php#footer" class="nav-link link-dark">Contact</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link link-dark">Register</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link link-dark active">Login</a></li>
              </ul>
            </nav>
          </header>
        </div>
        <!--form-->
        <form action="login.php" method="post">
            <div class="container bg-light my-5 py-4 px-5 rounded opacity-25">
                <h1 class="fs-1">Login</h1>
                <p>Please fill in this form to Login in to your account.</p>
                <hr>
                
                <!--If any error it will be printed here-->
                <?php if(!empty($error)) { ?>						
                    <div class="error alert alert-danger">
                      <i class="bi bi-exclamation-triangle"></i>
                        <?php echo $error;?>
                    </div>
				        <?php } ?>

                <div class="row my-3">                    
                    <div class="col">
                        <label for="email" class="form-label">Username</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" Meutour="email" aria-describedby="email" required />
                    </div>
                </div>
                <div class="row pb-3" class="pb-1">
                    <div class="col">
                        <label for="pwd">Password</label>
                    </div>
                </div>
                <div class="row pb-3" class="pb-1">
            <div class="col">
              <!--password-->
          <input type="password" class="form-control" placeholder="Password" Meutour="pwd" id="pwd" required />
          <!-- An element to toggle between password visibility -->
          <div class="form-check my-2">
            <input type="checkbox" class="form-check-input" id="showpwd" onclick="Show_pwd()" />
            <label for="showpwd" class="form-check-label">Show Password</label>
            <script>
              function Show_pwd() {
                var x = document.getElementById("pwd");
                if (x.type === "password") {
                  x.type = "pwd";
                  console.log("Showing pwd.")
                } else {
                  x.type = "password";
                  console.log("Hiding pwd.")
                }
              }
            </script>
          </div>
        </div>
        <hr>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <input type="submit" class="btn btn-success w-100 px-2 py-2 fs-5" value="Login" />
        <p>Don't have an account <a href="register.php">register for free</a>.</p>
      </div>
    </form>
  </body>
</html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
  body {
      font-family: 'Poppins', sans-serif !important;
  }
  html,body {
    background-image: linear-gradient(to bottom right, rgba(105,155,200,1) , rgba(181,197,216,1), rgba(105,155,200,1));
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 100vh;
  }
  .brand-name {
    color: hsl(255, 100%, 60%);;
  }
  .brand-name:hover {
    color: #0056b3;
  }

  .sticky-header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    z-index: 4;
  }
</style>