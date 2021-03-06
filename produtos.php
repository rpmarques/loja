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
                  <li aria-current="page" class="breadcrumb-item active"><a href="./produtos.php">Categoria 1</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3">
              <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Categorias</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                    <li><a href="category.html" class="nav-link">Categoria 1 <span class="badge badge-secondary">42</span></a>
                      <ul class="list-unstyled">
                        <li><a href="category.html" class="nav-link">Sub 1</a></li>
                        <li><a href="category.html" class="nav-link">Sub 2</a></li>
                        <li><a href="category.html" class="nav-link">Sub 3</a></li>
                        <li><a href="category.html" class="nav-link">Sub 4</a></li>
                      </ul>
                    </li>
                    <li><a href="category.html" class="nav-link active">Categoria 2  <span class="badge badge-light">123</span></a>
                      <ul class="list-unstyled">
                        <li><a href="category.html" class="nav-link">Sub 1</a></li>
                        <li><a href="category.html" class="nav-link">Sub 2</a></li>
                        <li><a href="category.html" class="nav-link">Sub 3</a></li>
                        <li><a href="category.html" class="nav-link">Sub 4</a></li>
                      </ul>
                    </li>
                    <li><a href="category.html" class="nav-link">Categoria 3  <span class="badge badge-secondary">11</span></a>
                      <ul class="list-unstyled">
                        <li><a href="category.html" class="nav-link">Sub 1</a></li>
                        <li><a href="category.html" class="nav-link">Sub 2</a></li>
                        <li><a href="category.html" class="nav-link">Sub 3</a></li>
                        <li><a href="category.html" class="nav-link">Sub 4</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Marcas <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Limpar</a></h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Marca 1  (10)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Marca 2  (12)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Marca 3  (15)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Marca 4  (14)
                        </label>
                      </div>
                    </div>
                    <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Aplicar</button>
                  </form>
                </div>
              </div>
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Op????es <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Limpar</a></h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour white"></span> Op????o 1 (14)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour blue"></span> Op????o 2 (10)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour green"></span>  Op????o 3 (20)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour yellow"></span>  Op????o 4 (13)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour red"></span>  Op????o 5 (10)
                        </label>
                      </div>
                    </div>
                    <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Aplicar</button>
                  </form>
                </div>
              </div>
              <!-- *** MENUS AND FILTERS END ***-->
            </div>
            <div class="col-lg-9">
              <div class="box">
                <h1> NOME DA CATEGORIA </h1>
                <p>Em nosso departamento de [NOME DA CATEGORIA], oferecemos uma ampla sele????o dos melhores produtos que encontramos e cuidadosamente selecionados.</p>
              </div>
              <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing">Exbibindo <strong>12</strong> de <strong>25</strong> produtos</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                      <div class="products-number"><strong>Exibir</strong><a href="#" class="btn btn-sm btn-primary">12</a><a href="#" class="btn btn-outline-secondary btn-sm">24</a><a href="#" class="btn btn-outline-secondary btn-sm">Todos</a></div>
                      <div class="products-sort-by mt-2 mt-lg-0"><strong>Ordem</strong>
                        <select name="sort-by" class="form-control">
                          <option>Pre??o</option>
                          <option>Nome</option>
                          <option>Mais Vendidos</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
                      <div class="theribbon">PROMO????O</div>
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
                      <div class="theribbon">PROMO????O</div>
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
                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">??</span><span class="sr-only">Previous</span></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">??</span><span class="sr-only">Next</span></a></li>
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