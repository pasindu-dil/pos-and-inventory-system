<?php
session_start();
use App\Controllers\LoginController;

require 'resources\helpers\helpers.php';

// $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//   // $r->addRoute('GET', '/users', [LoginController::class, 'index']);
//   // $r->addRoute('GET', '/', [LoginController::class, 'index']);
// });

// // Fetch method and URI from somewhere
// $httpMethod = $_SERVER['REQUEST_METHOD'];
// $uri = $_SERVER['REQUEST_URI'];

// // Strip query string (?foo=bar) and decode URI
// if (false !== $pos = strpos($uri, '?')) {
//     $uri = substr($uri, 0, $pos);
// }
// $uri = rawurldecode($uri);

// $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// switch ($routeInfo[0]) {
//     case FastRoute\Dispatcher::NOT_FOUND:
//         die('NOT_FOUND');
//         // ... 404 Not Found
//         break;
//     case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
//         $allowedMethods = $routeInfo[1];
//         // ... 405 Method Not Allowed
//         die('Not Allowed');
//         break;
//     case FastRoute\Dispatcher::FOUND:
//         $handler = $routeInfo[1];
//         $vars = $routeInfo[2];
      
//         print $handler($vars);
//         break;
// }

// exit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS & Inventory System</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="apple-touch-icon" sizes="76x76" href="resources/img/apple-icon.png">
    <link rel="icon" type="image/png" href="resources/img/favicon.png">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="resources/css/nucleo-icons.css" rel="stylesheet" />
    <link href="resources/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="resources/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />

    <!-- Google Web Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">  -->

    <!-- Libraries Stylesheet -->
    <!-- <link href="resources/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->
    <!-- <link href="resources/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> -->

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="resources/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Template Stylesheet -->
    <!-- <link href="resources/css/style.css" rel="stylesheet">
    <link href="resources/css/main.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="resources/plugins/jquery.toast/jquery.toast.min.css" />
    <link rel="stylesheet" type="text/css" href="resources/plugins/jquery.toast/jquery.toast.min.css" />
</head>
<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="resources/pages/dashboard.html">
              HNDIT PT
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="resources/views/dashboard.php">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.html">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-up.html">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-in.html">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li> -->
              </ul>
              <ul class="navbar-nav d-lg-flex d-none">
                <li class="nav-item d-flex align-items-center">
                  <a class="btn btn-outline-primary btn-sm mb-0 me-2" target="_blank" href="">POS & INVENTORY SYSTEM</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form method="POST" role="form" class="text-start" id="loginForm">
                  <div class="input-group input-group-outline my-3 row">
                    <!-- <label class="form-label">Email</label> -->
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="input-group input-group-outline mb-3 row">
                    <!-- <label class="form-label">Password</label> -->
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="button" onclick="submitForm()" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a class="font-weight-bold text-white" target="_blank">HNDIT PT Group</a>
                for a better web.
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="" class="nav-link text-white" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link text-white" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="" class="nav-link pe-0 text-white" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../js/main.js"></script>
  <script src="../js/App.js"></script>
  <script type="text/javascript" src="resources\js\jquery.js"></script>
  <script src="../js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script type="text/javascript" src="resources\plugins\jquery.toast\jquery.toast.min.js"></script>
  <script type="text/javascript" src="resources\js\jquery.validate.js"></script>
  <script type="text/javascript" src="resources\js\custom\FormOptions.js"></script>
  <script type="text/javascript" src="resources\js\custom\notification.js"></script>
  <script>
    $(document).ready(function () {
      let rules = {
          email: {
            required: true,
          },
          password: {
            required: true,
          }
      };

      FormOptions.initValidation('#loginForm', rules);
    });

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function submitForm() {
      let isValid = $('#loginForm').valid();
      let email = $('#email').val();
      let password = $('#password').val();
      if (isValid) {
        $.ajax(
          {
            clearForm: true,
            type: 'post',
            url: '../../routes/loginhelper.php',
            data: {mode: 'login', email: email, password: password},
            success: function (data) { 
              let response = JSON.parse(data);
              if (response.success) {
                Notifications.success(response.msg);
                window.location.href = "resources/views/dashboard.php";
              } else {
                Notifications.errorMsg(response.msg)
              }
            },
            error: function (xhr, error, errorThrown) {
              console.log(xhr.error);
            }
          }
        )
      }
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>
</html>