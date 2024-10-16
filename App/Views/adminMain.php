<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="App/Public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="App/Public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="App/Public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="App/Public/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="App/Public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="App/Public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="App/Public/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="App/Public/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Login/Logout
          </a>
          <ul class="dropdown-menu">

            <?php

            use App\Helpers\Auth;

            if (!Auth::check()) { ?>
              <li><a class="dropdown-item" href="/login">Login</a></li>
              <li><a class="dropdown-item" href="/register">Register</a></li>
            <?php } else { ?>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <img src="App/Public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TRELLO</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="App/Public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/users" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>

                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>

                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <?= $content ?>

        </div>
      </section>
    </div>
  </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="App/Public/plugins/jquery/jquery.min.js"></script>
        <script src="App/Public/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="App/Public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="App/Public/plugins/chart.js/Chart.min.js"></script>
        <script src="App/Public/plugins/sparklines/sparkline.js"></script>
        <script src="App/Public/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="App/Public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="App/Public/plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="App/Public/plugins/moment/moment.min.js"></script>
        <script src="App/Public/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="App/Public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="App/Public/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="App/Public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="App/Public/dist/js/adminlte.js"></script>
        <script src="App/Public/dist/js/demo.js"></script>
        <script src="App/Public/dist/js/pages/dashboard.js"></script>
</body>

</html>