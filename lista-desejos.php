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
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
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
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div id="wishlist" class="col-lg-9">
              
              <div class="box">
                <h1>Minha Lista de Desejos</h1>
                <!-- <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p> -->
              </div>
              <div class="row products">
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">Fur coat with very but very very long name</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">White Blouse Armani</a></h3>
                      <p class="price"> 
                        <del>R$280</del> R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
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
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">Black Blouse Versace</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">Black Blouse Versace</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">White Blouse Versace</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
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
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">Fur coat</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
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
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">White Blouse Armani</a></h3>
                      <p class="price"> 
                        <del>R$280</del> R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
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
                <div class="col-lg-3 col-md-4">
                  <div class="product">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="./produto.php"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="./produto.php" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3><a href="./produto.php">Black Blouse Versace</a></h3>
                      <p class="price"> 
                        <del></del>R$143.00
                      </p>
                      <p class="buttons"><a href="./produto.php" class="btn btn-outline-secondary">Visualizar</a><a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Adicionar</a></p>
                    </div>
                    <!-- /.text-->
                  </div>
                  <!-- /.product            -->
                </div>
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