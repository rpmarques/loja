<?php
require_once './header.php';
?>
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Minha Lista de Desejos</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="card sidebar-menu">
            <div class="card-header">
              <h3 class="h4 card-title">Seção do cliente</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column">
                <a href="./meus-pedidos.php" class="nav-link "><i class="fa fa-list"></i> Meus Pedidos</a>
                <a href="./lista-desejos.php" class="nav-link active"><i class="fa fa-heart"></i> Lista de Desejos</a>
                <a href="./minha-conta.php" class="nav-link "><i class="fa fa-user"></i> Minha Conta</a>
                <a href="/.logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Sair</a>
              </ul>
            </div>
          </div>
          <!--MENU CLIENTE -->
        </div>
        <div id="wishlist" class="col-lg-9">

          <div class="box">
            <h1>Minha Lista de Desejos</h1>
            <!-- <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p> -->
          </div>
          <div class="row products">
            <?php
            //selectProduto($rCampos = "", $rWhere = "", $rLimit = "", $rLeft = "", $rOrderBy = "", $rGroupBy = "")
            $wWhere = " lista_desejo.cliente_id=" . $_SESSION['cliente_id'];
            $wLeft = "LEFT JOIN lista_desejo ON lista_desejo.produto_id=produto.id";
            $produtos = $objProdutos->selectProduto($rCampos = "produto.*", $wWhere, "", $wLeft);
            foreach ($produtos as $pro) { ?>
              <div class="col-lg-3 col-md-4">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <?php
                      $foto = $objProdutos->pegaFotos($pro->id, true);
                      if (isset($foto->foto_1)) { ?>
                        <div class="front"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                      <?php } else { ?>
                        <div class="front"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      <?php }  ?>
                    </div>
                  </div>
                  <a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><a href="./produto.php"><?= $pro->nome; ?></a></h3>
                    <p class="price">
                      <del><?= $pro->preco_antigo > 0 ? 'R$' . formataMoeda($pro->preco_antigo) : ''; ?></del> R$<?= formataMoeda($pro->preco_ven); ?>
                    </p>
                    <p class="buttons"><a href="produto.php?produto_id=<?= $pro->id ?>" class="btn btn-outline-secondary">Visualizar</a><a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                  </div>
                  <!-- /.text-->
                  <div class="ribbon sale">
                    <div class="theribbon">MAIS VENDIDOS</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                  <div class="ribbon new">
                    <div class="theribbon">NOVIDADE</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                  <div class="ribbon gift">
                    <div class="theribbon">PROMOÇÃO</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                </div>
                <!-- /.product            -->
              </div>
            <?php } ?>
            <!-- /.products-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require_once './footer.php';
?>