<?php
ob_start();
require_once './classes/funcoes.class.php';
require_once './classes/logger.class.php';
require_once './classes/conexao.class.php';
require_once './classes/produtos.class.php';
$objProdutos = Produtos::getInstance(Conexao::getInstance());
require_once './classes/clientes.class.php';
$objClientes = Clientes::getInstance(Conexao::getInstance());
require_once './classes/empresa.class.php';
$objEmpresa = Empresa::getInstance(Conexao::getInstance());
$empresa = $objEmpresa->pegaEmpresa();
require_once './classes/pedidos.class.php';
$objPedidos = Pedidos::getInstance(Conexao::getInstance());
session_start();
$_SESSION['login'] = "site";
$_SESSION['mensagem'] = "";
require_once './verificaCarrinho.php';
require_once './verificaLogin.php';
// ISSO AQUI É PRA MONTAR A TRILHA DE MIGALHAS
if (isset($_GET['categoria_id'])) {
  $categoria = $objProdutos->pegaCategoria($_GET['categoria_id']);
  $subCategoriaNome = '';
  if (isset($_GET['sub_categoria_id'])) {
    $subCategoria = $objProdutos->pegaSubCategoria($_GET['sub_categoria_id']);
    $subCategoriaNome = ' / ' . $subCategoria->nome;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Loja: [<?= $empresa->nome_fantasia; ?>]</title>
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
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  <?php require_once './modal.php'; ?>
  <header class="header mb-5">
    <!-- navbar-->
    <nav class="navbar navbar-expand-lg ">
      <div class="container">
        <a href="./index.php" class="navbar-brand home"><img src="img/logo.jpg" alt="Obaju logo" class="d-none d-md-inline-block"><img src="img/logo_peq.jpg" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
        <div class="navbar-buttons">
          <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
          <button type="button" data-toggle="modal" data-target="#login-modal" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
          <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="./pedido.php" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div id="navigation" class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="./index.php" class="nav-link">Home</a></li>

            <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Categorias<b class="caret"></b></a>
              <ul class="dropdown-menu megamenu">
                <li>
                  <div class="row">
                    <?php
                    $categorias = $objProdutos->selectCategorias("id,nome", "", "4");
                    if (!empty($categorias)) {
                      foreach ($categorias as $itemCat) : ?>
                        <div class="col-md-6 col-lg-3">
                          <h5><?= $itemCat->nome; ?></h5>
                          <?php $subCategoria = $objProdutos->selectSubCategorias("id,nome", "categoria_id=$itemCat->id", "4");
                          if (!empty($subCategoria)) { ?>
                            <ul class="list-unstyled mb-3">
                              <?php foreach ($subCategoria as $itemSub) {   ?>
                                <li class="nav-item"><a href="./produtos.php?categoria_id=<?= $itemCat->id ?>&sub_categoria_id=<?= $itemSub->id; ?> " class="nav-link"><?= $itemSub->nome; ?></a></li>
                              <?php } ?>
                            </ul>
                          <?php } ?>
                        </div>
                      <?php endforeach;
                    } else { ?>
                      <div class="col-md-6 col-lg-3">
                        <h5>Sem categorias para exibir</h5>
                      </div>
                    <?php } ?>
                </li>
              </ul>
            </li>
          </ul>
          <div class="navbar-buttons d-flex justify-content-end">
            <!-- /.nav-collapse-->
            <?php
            if (!isset($_SESSION['cliente_id'])) { ?>
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a href="#" class="btn navbar-btn btn-primary d-none d-lg-inline-block" data-toggle="modal" data-target="#login-modal">Login</a>
            <?php } else { ?>
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a href="./minha-conta.php" class="btn navbar-btn btn-primary d-none d-lg-inline-block"> Minha Conta </a>
            <?php } ?>
            <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
            <?php
            //PEGAR QTDE DE ITENS DO PEDIDO
            $itensPedido = $objPedidos->contaItens(session_id());
            if ($itensPedido > 0) { ?>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="./carrinho.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span><?= $itensPedido; ?> Itens </span></a></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>
    <div id="search" class="collapse">
      <div class="container">
        <form role="search" class="ml-auto" method="get" action="./produtos.php">
          <div class="input-group">
            <input type="text" placeholder="Procurar" name="buscar" class="form-control">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
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