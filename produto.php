<?php  
require_once('./header.php');
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
                  <li class="breadcrumb-item"><a href="./produtos.php">Categoria</a></li>
                  <li class="breadcrumb-item"><a href="./produtos.php">Sub Cat</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Nome do Produto</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
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
                          <input type="checkbox"> Marca 1 (10)
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
              <!-- *** MENUS AND FILTERS END ***-->              
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
              <div id="productMain" class="row">
                <div class="col-md-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div class="item"> <img src="https://via.placeholder.com/450x678" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="https://via.placeholder.com/450x678" alt="" class="img-fluid"></div>
                    <div class="item"> <img src="https://via.placeholder.com/450x678" alt="" class="img-fluid"></div>
                  </div>
                  <div class="ribbon sale">
                    <div class="theribbon">MAIS VENDIDO</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                  <div class="ribbon new">
                    <div class="theribbon">NOVIDADE</div>
                    <div class="ribbon-background"></div>
                  </div>
                  <!-- /.ribbon-->
                </div>
                <div class="col-md-6">
                  <div class="box">
                    <h1 class="text-center">Nome do Produto</h1>
                    <p class="goToDescription"><a href="#details" class="scroll-to">Clique aqui para mais detalhes</a></p>
                    <p class="price">R$124.00</p>
                    <p class="text-center buttons"><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Adicionar</a><a href="basket.html" class="btn btn-outline-primary"><i class="fa fa-heart"></i> Lista de Desejo</a></p>
                  </div>
                  <div data-slider-id="1" class="owl-thumbs">
                    <button class="owl-thumb-item"><img src="https://via.placeholder.com/500x500" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="https://via.placeholder.com/500x500" alt="" class="img-fluid"></button>
                    <button class="owl-thumb-item"><img src="https://via.placeholder.com/500x500" alt="" class="img-fluid"></button>
                  </div>
                </div>
              </div>
              <div id="details" class="box">
                <p></p>
                <h4>Detalhes do produto</h4>
                <p>Aqui vai HTML puro...sem frescuta sem nada, com as tags normais do HTML</p>
                <p>White lace top, woven, has a round neck, short sleeves, has knitted lining attached</p>
                <h4>Caracteristiscas </h4>
                <ul>
                  <li>Caracteristisca 1</li>
                  <li>Caracteristisca 2</li>
                  <li>Caracteristisca 3</li>
                  <li>Caracteristisca 4</li>
                </ul>                
                <blockquote>
                  <p><em>Mais alguma coisa que pode ser importante pra saber deste produto.</em></p>
                </blockquote>
                <hr>
                <div class="social">
                  <h4>Compartilhe com seus amigos</h4>
                  <p><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" class="email"><i class="fa fa-envelope"></i></a></p>
                  
                  <a href="#"> <h4>Todos os anúncios deste fornecedor</h4></a>
                </div>
              </div>
              <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                  <div class="box same-height">
                    <h3>Mais produtos deste fornecedor</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Pro 1</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Pro 2</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Pro 3</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              </div>
              <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                  <div class="box same-height">
                    <h3>Produtos vistos recentemente</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Pro 1</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Pro 2</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Pro 3</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              </div>
            </div>
            <!-- /.col-md-9-->
          </div>
        </div>
      </div>
    </div>
    <?php 
require_once ('./footer.php');
?>