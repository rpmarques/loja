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
                  <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active"><a href="./produtos.php">Produtos</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <!--
              *** MENUS AND FILTERS ***
              -->
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Categorias</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                    <?php 
                    $categorias = $objProdutos->selectCategorias("id,nome","","4");
                    if (!empty($categorias)){
                      foreach ($categorias as $itemCat) { ?>
                        <li><a href="./produtos.php?categoria_id=<?=$itemCat->id;?>" class="nav-link active" ><?=$itemCat->nome;?> <span class="badge badge-secondary">42</span></a>
                          <ul class="list-unstyled">
                            <?php 
                              $subCategoria= $objProdutos->selectSubCategorias("id,nome","categoria_id=$itemCat->id");
                              if (!empty($subCategoria)){
                                foreach ($subCategoria as $itemSub) { ?>
                                  <li><a href="./produtos.php?categoria_id=<?=$itemCat->id;?>&sub_categoria_id=<?=$itemSub->id;?>" class="nav-link"><?=$itemSub->nome;?></a></li>
                          <?php }
                              }
                            ?>
                          </ul>
                        </li>
                     <?php }
                    }
                    ?>                    
                  </ul>
                </div>
              </div>
              <!-- MARCAS -->
              <!-- <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Marcas <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Limpar</a></h3>
                </div>
                <div class="card-body">
                  <?php $marcas = $objProdutos->selectMarcas($rCampos="id,nome"); ?>
                  <form>
                    <div class="form-group">
                      <?php 
                      foreach ($marcas as $itemMarca) { ?>
                        <div class="checkbox"> <label> <input type="checkbox" name="marca" value="<?=$itemMarca->id;?>"> <?=$itemMarca->nome;?> </label> </div>
                      <?php }
                      ?>
                    </div>
                    <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Aplicar</button>
                  </form>
                </div>
              </div> -->
              <!-- <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Opções <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Limpar</a></h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour white"></span> Opção 1 (14)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour blue"></span> Opção 2 (10)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour green"></span>  Opção 3 (20)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour yellow"></span>  Opção 4 (13)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour red"></span>  Opção 5 (10)
                        </label>
                      </div>
                    </div>
                    <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Aplicar</button>
                  </form>
                </div>
              </div> -->
              <!-- *** MENUS AND FILTERS END ***-->
            </div>
            <div class="col-lg-9">
              <div class="box">                
                <?php 
                if (isset($_GET['categoria_id'])){
                  $categoria = $objProdutos->pegaCategoria($_GET['categoria_id']);?>
                  <h1> <?=$categoria->nome;?></h1>
                  <p>Em nosso departamento de <?=$categoria->nome;?>, oferecemos uma ampla seleção dos melhores produtos que encontramos e cuidadosamente selecionados.</p>
                <?php }else{?>
                <p>Em nossos departamentos oferecemos uma ampla seleção dos melhores produtos que encontramos e cuidadosamente selecionados.</p>
                <?php }
                ?>
                
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
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="produto.php">Fur coat with very but very very long name</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="produto.php">White Blouse Armani</a></h3>
                      <p class="price"> 
                        <del>R$280</del> R$143.00
                      </p>
                      <p class="buttons"><a href="produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
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
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="produto.php">Black Blouse Versace</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="produto.php">Black Blouse Versace</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="produto.php">White Blouse Versace</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                    <div class="ribbon new">
                      <div class="theribbon">NOVIDADE</div>
                      <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon-->
                  </div>
                  <!-- /.product            -->
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="produto.php">Fur coat</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                    <div class="ribbon gift">
                      <div class="theribbon">PROMOÇÃO</div>
                      <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon-->
                  </div>
                  <!-- /.product            -->
                </div>
                <!-- /.products-->
              </div>
              <div class="pages">
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
              </div>
            </div>
            <!-- /.col-lg-9-->
          </div>
        </div>
      </div>
    </div>
   <?php 
   require_once './footer.php';
   ?>