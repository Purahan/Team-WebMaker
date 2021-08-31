<?php
  // Session Start
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
      html,body {
        background-image: linear-gradient(to bottom right, rgba(105,155,200,1) , rgba(181,197,216,1), rgba(105,155,200,1));
        background-repeat: no-repeat;
      }
      .brand-name {
        color: hsl(255, 100%, 60%);;
      }
      .brand-name:hover {
        color: #0056b3;
      }
    </style>
  </head>

  <body style="background-color: rgb(187, 203, 161); font-family: century gothic, Helvetica, sans-serif;">
    <div id="header">
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
            <li class="nav-item"><a href="register.php" class="nav-link link-dark active">Register</a></li>
            <li class="nav-item"><a href="login.php" class="nav-link link-dark">Login</a></li>
          </ul>
        </nav>
      </header>
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
  </script>
</html>
