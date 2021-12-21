<?php
require_once './header.php';
if ($_GET){
  if (isset($_GET['buscar'])){

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
              <li aria-current="page" class="breadcrumb-item active"><a href="./produtos.php">Produtos</a></li>
            </ol>
          </nav>
        </div>
        <?php require_once './menu-categoria.php'; ?>
        <div class="col-lg-9">
          <div class="box">
            <?php if (isset($categoria)) {  ?>
              <h1> <?= $categoria->nome . $subCategoriaNome; ?></h1>
              <p>Em nosso departamento de <?= $categoria->nome; ?>, oferecemos uma ampla seleção dos melhores produtos que encontramos e cuidadosamente selecionados.</p>
            <?php } else { ?>
              <p>Em nossos departamentos oferecemos uma ampla seleção dos melhores produtos que encontramos e cuidadosamente selecionados.</p>
            <?php } ?>
          </div>
          <!-- <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing">Exbibindo <strong>12</strong> de <strong>25</strong> produtos</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                      <div class="products-number"><strong>Exibir</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">Todos</a></div>
                      <div class="products-sort-by mt-2 mt-lg-0"><strong>Ordem</strong>
                        <select name="sort-by" class="form-control">
                          <option>Preço</option>
                          <option>Nome</option>
                          <option>Mais Vendidos</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
              </div> -->
          <div class="row products">
            <?php
            if (isset($categoria)) {
              $wWhere = "produto.categoria_id=$categoria->id";
              if (isset($_GET['sub_categoria_id'])) {
                $subCategoria = $objProdutos->pegaSubCategoria($_GET['sub_categoria_id']);
                $wWhere = $wWhere . " AND produto.sub_categoria_id=$subCategoria->id";
              }
              $produtos = $objProdutos->selectProduto($rCampos = "produto.*", $wWhere);
            } else {
              $produtos = $objProdutos->selectProduto($rCampos = "produto.*");
            }
            foreach ($produtos as $itemPro) { ?>
              <div class="col-lg-4 col-md-6">
                <div class="product">
                  <div class="flip-container">
                    <div class="flipper">
                      <?php
                      $foto = $objProdutos->pegaFotos($itemPro->id, true);
                      if (isset($foto->foto_1)) { ?>
                        <div class="front"><a href="produto.php?produto_id=<?= $itemPro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php?produto_id=<?= $itemPro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                      <?php } else { ?>
                        <div class="front"><a href="produto.php?produto_id=<?= $itemPro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php?produto_id=<?= $itemPro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      <?php }  ?>
                    </div>
                  </div>
                  <?php
                  if (isset($foto->foto_1)) { ?>
                    <a href="produto.php?produto_id=<?= $itemPro->id ?>" class="invisible"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a>
                  <?php } else { ?>
                    <a href="produto.php?produto_id=<?= $itemPro->id ?>" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                  <?php } ?>
                  <div class="text">
                    <h3><a href="produto.php?produto_id=<?= $itemPro->id ?>"><?= $itemPro->nome; ?></a></h3>
                    <p class="price">
                      <del><?= $itemPro->preco_antigo > 0 ? 'R$' . formataMoeda($itemPro->preco_antigo) : ''; ?></del> R$<?= formataMoeda($itemPro->preco_ven); ?>
                    </p>
                    <p class="buttons"><a href="produto.php?produto_id=<?= $itemPro->id ?>" class="btn btn-outline-secondary">Visualizar</a><a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                  </div><!-- /.text-->
                  <!-- /.text-->
                  <?php
                  if ($itemPro->mais_vendido) { ?>
                    <div class="ribbon sale">
                      <div class="theribbon">MAIS VENDIDO</div>
                      <div class="ribbon-background"></div>
                    </div>
                  <?php }
                  if ($itemPro->novidade) { ?>
                    <!-- /.ribbon-->
                    <div class="ribbon new">
                      <div class="theribbon">NOVIDADE</div>
                      <div class="ribbon-background"></div>
                    </div>
                  <?php }
                  if ($itemPro->promocao) { ?>
                    <!-- /.ribbon-->
                    <div class="ribbon gift">
                      <div class="theribbon">PROMOÇÃO</div>
                      <div class="ribbon-background"></div>
                    </div>
                  <?php } ?>
                </div>
              </div> <!-- /.product -->
            <?php } ?>
          </div> <!-- /.products-->
          <!-- AQUI É PAGINAÇÃO -->
          <!-- <div class="pages">
                <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Mostrar Mais</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                  </ul>
                </nav>
              </div> -->
        </div>
        <!-- /.col-lg-9-->
      </div>
    </div>
  </div>
</div>
<?php
require_once './footer.php';
?>