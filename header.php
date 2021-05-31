<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loja: [NOME DO BUTECO]</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- tema-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
        <!-- Leaflet CSS - For the map-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.css">
    <!-- outras alterações-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- icone-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- MODAL LOGIN / REGISTRAR -->
    <header class="header mb-5">
    <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login do cliente</h5>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form action="./meus-pedidos.php" method="post">
              <div class="form-group">
                <input id="email-modal" type="text" placeholder="exemplo@exemplo.com" class="form-control">
              </div>
              <div class="form-group">
                <input id="password-modal" type="password" placeholder="Senha" class="form-control">
              </div>
              <p class="text-center">
                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
              </p>
            </form>
            <p class="text-center text-muted">Não se registrou ainda?</p>
            <p class="text-center text-muted"><a href="./registrar.php"><strong>Registre-se</strong></a> É fácil e feito em 1 minuto e dá acesso a descontos especiais e muito mais!</p>
          </div>
        </div>
      </div>
    </div>
<!-- navbar-->
      <nav class="navbar navbar-expand-lg ">
        <div class="container">
          <a href="index.php" class="navbar-brand home"><img src="img/logo.jpg" alt="Obaju logo" class="d-none d-md-inline-block"><img src="img/logo_peq.jpg" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
          <div class="navbar-buttons">            
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="modal"  data-target="#login-modal" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="./pedido.php" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Categoria 1<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <!-- <h5>titulo</h5> -->
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 1</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 2</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 3</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 4</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <!-- <h5>titulo</h5> -->
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 5</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 6</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 7</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 8</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <!-- <h5>titulo</h5> -->
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 9</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 10</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 11</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 12</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 13</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 14</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <!-- <h5>titulo</h5> -->
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 15</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 16</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 17</a></li>
                        <!-- </ul> -->
                        <!-- <h5>titulo</h5> -->
                        <!-- <ul class="list-unstyled mb-3"> -->
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 18</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 19</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sub 20</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Categoria 2<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <h5>Clothing</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>Shoes</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>Accessories</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                        </ul>
                        <h5>Looks and trends</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="banner"><a href="#"><img src="img/banner.jpg" alt="" class="img img-fluid"></a></div>
                        <div class="banner"><a href="#"><img src="img/banner2.jpg" alt="" class="img img-fluid"></a></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </li> -->
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->              
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a href="#" class="btn navbar-btn btn-primary d-none d-lg-inline-block" data-toggle="modal" data-target="#login-modal">Login</a>
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="./pedido.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>X Itens </span></a></div>
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div id="login" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>