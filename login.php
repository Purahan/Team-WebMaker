<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>name-Login</title>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    
    </head>
    <body style="background-color: rgb(237, 245, 251); font-family: century gothic, Helvetica, sans-serif;">
        <div id="header">
            <header class="d-flex flex-wrap justify-content-center px-3 py-3 mb-4 border-bottom bg-light">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Name</span>
                </a>
                <!--navbar-->
                <nav class="nav-bar">
                <ul class="nav items">
                <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">HOME</a></li>
                <li class="nav-item"><a href="index.php" class="nav-link">ABOUT</a></li>
                <li class="nav-item"><a href="index.php" class="nav-link">SERVICES</a></li>
                <li class="nav-item"><a href="index.php" class="nav-link">TESTIMONAILS</a></li>
                <li class="nav-item"><a href="register.php" class="nav-link">REGISTER</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link active">LOGIN</a></li>
                </ul>
            </header>
        </div>
        <!--form-->
        <form action="#" method="post">
            <div class="container bg-light my-5 py-4 px-5">
                <h1 class="fs-1">Login</h1>
                <p>Please fill in this form to Login in to your account.</p>
                <hr>
                <div class="row my-3">                    
                    <div class="col">
                        <label for="email" class="form-label">Username</label>
                        <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" aria-describedby="email" required />
                    </div>
                </div>
                <div class="row pb-3" class="pb-1">
                    <div class="col">
                        <label for="pwd"
                        >Password</label>
                    </div>
                </div>
                <div class="row pb-3" class="pb-1">
                    <div class="col">
                        <!--password-->
                        <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd" required />
                        <!-- An element to toggle between password visibility -->
                        <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" onclick="show_pwd()" id="flexCheckDefault" wtx-context="BEFF5258-246B-4F27-8248-7034DE54E482">
                            <label class="form-check-label" for="flexCheckDefault">
                                Show Password
                            </label>
                        </div>

                        <script>
                            function show_pwd() {
                            var x = document.getElementById("pwd");
                            if (x.type === "password") {
                                x.type = "pwd";
                            } else {
                                x.type = "password";
                            }
                            }
                        </script>
                    </div>
                </div>
                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                <input type="submit" class="btn btn-success w-100 px-2 py-2 fs-5" value="Login" />
                <p>No name account <a href="register.php">register for free</a>.</p>
              </div>
        </form>
    </body>
</html>
