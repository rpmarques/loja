<?php
require_once('./header.php');
if (isset($_GET['produto_id'])) {
  $produto = $objProdutos->pegaProduto($_GET['produto_id']);
  if (!empty($produto)) {
    $categoria = $objProdutos->pegaCategoria($produto->categoria_id);
    $subCategoria = $objProdutos->pegaSubCategoria($produto->sub_categoria_id);
    $fotos = $objProdutos->pegaFotos($produto->id);
    $objProdutos->somaClick($produto->id);
  } else {
    vaiPraPagina('produtos');
  }
}
?>
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="./produtos.php"><?= $categoria->nome; ?></a></li>
              <li class="breadcrumb-item"><a href="./produtos.php"><?= $subCategoria->nome; ?></a></li>
              <li aria-current="page" class="breadcrumb-item active"><?= $produto->nome; ?></li>
            </ol>
          </nav>
        </div>
        <?php require_once './menu-categoria.php'; ?>
        <div class="col-lg-9 order-1 order-lg-2">
          <div id="productMain" class="row">
            <div class="col-md-6">
              <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                <?php
                if (isset($fotos->foto_1)) { ?>
                  <div class="item"> <img src="./img/pro/<?= $fotos->foto_1 ?>" alt="" class="img-fluid"></div>
                <?php }
                if (isset($fotos->foto_2)) { ?>
                  <div class="item"> <img src="./img/pro/<?= $fotos->foto_2 ?>" alt="" class="img-fluid"></div>
                <?php }
                if (isset($fotos->foto_3)) { ?>
                  <div class="item"> <img src="./img/pro/<?= $fotos->foto_3 ?>" alt="" class="img-fluid"></div>
                <?php }
                if (isset($fotos->foto_4)) { ?>
                  <div class="item"> <img src="./img/pro/<?= $fotos->foto_4 ?>" alt="" class="img-fluid"></div>
                <?php }
                if (isset($fotos->foto_5)) { ?>
                  <div class="item"> <img src="./img/pro/<?= $fotos->foto_5 ?>" alt="" class="img-fluid"></div>
                <?php }
                if (isset($fotos->foto_6)) { ?>
                  <div class="item"> <img src="./img/pro/<?= $fotos->foto_6 ?>" alt="" class="img-fluid"></div>
                <?php }
                ?>
                <!-- <div class="item"> <img src="https://via.placeholder.com/450x678" alt="" class="img-fluid"></div>
                <div class="item"> <img src="https://via.placeholder.com/450x678" alt="" class="img-fluid"></div>
                <div class="item"> <img src="https://via.placeholder.com/450x678" alt="" class="img-fluid"></div> -->
              </div>
              <?php
              if ($produto->mais_vendido) { ?>
                <div class="ribbon sale">
                  <div class="theribbon">MAIS VENDIDO</div>
                  <div class="ribbon-background"></div>
                </div>
              <?php }
              if ($produto->novidade) { ?>
                <!-- /.ribbon-->
                <div class="ribbon new">
                  <div class="theribbon">NOVIDADE</div>
                  <div class="ribbon-background"></div>
                </div>
              <?php }

              if ($produto->promocao) { ?>
                <div class="ribbon gift">
                  <div class="theribbon">PROMOÇÃO</div>
                  <div class="ribbon-background"></div>
                </div>
              <?php }
              ?>
              <!-- /.ribbon-->
            </div>
            <div class="col-md-6">
              <div class="box">
                <h1 class="text-center"><?= $produto->nome; ?></h1>
                <p class="goToDescription"><a href="#details" class="scroll-to">Clique aqui para mais detalhes</a></p>
                <p class="price"><?= formataMoeda($produto->preco_ven); ?></p>
                <p class="text-center buttons">
                  <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Adicionar</a>
                  <a href="#" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Lista de Desejo</a>
                </p>
              </div>
              <div data-slider-id="1" class="owl-thumbs">
                <?php
                if (isset($fotos->foto_1)) { ?>
                  <button class="owl-thumb-item"><img src="./img/pro/<?= $fotos->foto_1 ?>" alt="" class="img-fluid"></button>
                <?php }
                if (isset($fotos->foto_2)) { ?>
                  <button class="owl-thumb-item"><img src="./img/pro/<?= $fotos->foto_2 ?>" alt="" class="img-fluid"></button>
                <?php }
                if (isset($fotos->foto_3)) { ?>
                  <button class="owl-thumb-item"><img src="./img/pro/<?= $fotos->foto_3 ?>" alt="" class="img-fluid"></button>
                <?php }
                if (isset($fotos->foto_4)) { ?>
                  <button class="owl-thumb-item"><img src="./img/pro/<?= $fotos->foto_4 ?>" alt="" class="img-fluid"></button>
                <?php }
                if (isset($fotos->foto_5)) { ?>
                  <button class="owl-thumb-item"><img src="./img/pro/<?= $fotos->foto_5 ?>" alt="" class="img-fluid"></button>
                <?php }
                if (isset($fotos->foto_6)) { ?>
                  <button class="owl-thumb-item"><img src="./img/pro/<?= $fotos->foto_6 ?>" alt="" class="img-fluid"></button>
                <?php }
                ?>
                <!-- <button class="owl-thumb-item"><img src="https://via.placeholder.com/500x500" alt="" class="img-fluid"></button>
                <button class="owl-thumb-item"><img src="https://via.placeholder.com/500x500" alt="" class="img-fluid"></button>
                <button class="owl-thumb-item"><img src="https://via.placeholder.com/500x500" alt="" class="img-fluid"></button> -->
              </div>
            </div>
          </div>
          <div id="details" class="box">
            <p></p>
            <h4>Detalhes do produto</h4>
            <?= $produto->descricao; ?>
            <!-- <p>Aqui vai HTML puro...sem frescuta sem nada, com as tags normais do HTML</p>
            <h4>Caracteristiscas </h4>
            <ul>
              <li>Caracteristisca 1</li>
              <li>Caracteristisca 2</li>
              <li>Caracteristisca 3</li>
              <li>Caracteristisca 4</li>
            </ul>
            <blockquote>
              <p><em>Mais alguma coisa que pode ser importante pra saber deste produto.</em></p>
            </blockquote> -->
            <hr>
            <div class="social">
              <h4>Compartilhe com seus amigos</h4>
              <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
              <!-- <a href="#">
                <h4>Todos os anúncios deste fornecedor</h4>
              </a> -->
            </div>
          </div>
          <!-- PRODUTOS DA MESMA CATEGORIA -->
          <?php
          $wCampos = "id,nome,preco_ven";
          $wWhere = " categoria_id=$categoria->id ";
          $produtos = $objProdutos->selectProduto($wCampos, $wWhere, "3");
          ?>
          <div class="row same-height-row">
            <div class="col-md-3 col-sm-6">
              <div class="box same-height">
                <h3>Mais produtos da categoria:<br> <b><?= $categoria->nome; ?></b> </h3>
              </div>
            </div>
            <?php
            foreach ($produtos as $pro) { ?>
              <div class="col-md-3 col-sm-6">
                <div class="product same-height">
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
                  <?php
                  if (isset($foto->foto_1)) { ?>
                    <a href="produto.php?produto_id=<?= $pro->id ?>" class="invisible"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a>
                  <?php } else { ?>
                    <a href="produto.php?produto_id=<?= $pro->id ?>" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                  <?php } ?>
                  <div class="text">
                    <a href="produto.php?produto_id=<?= $pro->id ?>">
                      <h3><?= $pro->nome; ?></h3>
                    </a>
                    <p class="price"><?= formataMoeda($pro->preco_ven); ?></p>
                  </div>
                </div>
                <!-- /.product-->
              </div>
            <?php }  ?>
          </div>
          <!-- PRODUTOS NOVO -->
          <?php
          $wCampos = "id,nome,preco_ven";
          $wOrder = "id DESC";
          $produtos = $objProdutos->selectProduto($wCampos, "", "3", "", $wOrder);
          ?>
          <div class="row same-height-row">
            <div class="col-md-3 col-sm-6">
              <div class="box same-height">
                <h3>Produtos Novos</h3>
              </div>
            </div>
            <?php
            foreach ($produtos as $pro) { ?>
              <div class="col-md-3 col-sm-6">
                <div class="product same-height">
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
                  <?php
                  if (isset($foto->foto_1)) { ?>
                    <a href="produto.php?produto_id=<?= $pro->id ?>" class="invisible"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a>
                  <?php } else { ?>
                    <a href="produto.php?produto_id=<?= $pro->id ?>" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                  <?php } ?>
                  <div class="text">
                    <a href="produto.php?produto_id=<?= $pro->id ?>">
                      <h3><?= $pro->nome; ?></h3>
                    </a>
                    <p class="price"><?= formataMoeda($pro->preco_ven); ?></p>
                  </div>
                </div>
                <!-- /.product-->
              </div>
            <?php } ?>
          </div>
        </div>
        <!-- /.col-md-9-->
      </div>
    </div>
  </div>
</div>
<?php
require_once('./footer.php');
?>