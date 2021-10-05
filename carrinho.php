<?php include_once './header.php';?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                  <li aria-cuRent="page" class="breadcrumb-item active">Carrinho</li>
                </ol>
              </nav>
            </div>
            <div id="basket" class="col-lg-9">
              <div class="box">
                <form method="post" action="./carrinho-endereco.php">
                  <h1>Carrinho de compras</h1>
                  <p class="text-muted">No momento, você tem 3 item(s) em seu carrsinho.</p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Produto</th>
                          <th>Quantidade</th>
                          <th>Preço unitário</th>
                          <th>Desconto</th>
                          <th colspan="2">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="#"><img src="https://via.placeholder.com/50x50" alt="White Blouse Armani"></a></td>
                          <td><a href="#">White Blouse Armani</a></td>
                          <td>
                            <input type="number" value="2" class="form-control">
                          </td>
                          <td>R$123.00</td>
                          <td>R$0.00</td>
                          <td>R$246.00</td>
                          <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                        <tr>
                          <td><a href="#"><img src="https://via.placeholder.com/50x50" alt="Black Blouse Armani"></a></td>
                          <td><a href="#">Black Blouse Armani</a></td>
                          <td>
                            <input type="number" value="1" class="form-control">
                          </td>
                          <td>R$200.00</td>
                          <td>R$0.00</td>
                          <td>R$200.00</td>
                          <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="5">Total</th>
                          <th colspan="2">R$446.00</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue comprando</a></div>
                    <div class="right">
                      <button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Atualizar carrinho</button>
                      <button type="submit" class="btn btn-primary">Finalizar Pedido <i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.box-->
              <div class="row same-height-row">
                <div class="col-lg-3 col-md-6">
                  <div class="box same-height">
                    <h3>Você também pode gostar desses produtos</h3>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="product same-height">
                    <div class="flip-container">
                      <div class="flipper">
                        <div class="front"><a href="detail.html"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="detail.html"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      </div>
                    </div><a href="detail.html" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                    <div class="text">
                      <h3>Fur coat</h3>
                      <p class="price">R$143</p>
                    </div>
                  </div>
                  <!-- /.product-->
                </div>
              </div>
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Resumo do pedido</h3>
                </div>
                <p class="text-muted">Frete e custos adicionais são calculados com base nos valores que você inseriu.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Sub Total</td>
                        <th>R$446.00</th>
                      </tr>
                      <tr>
                        <td>Frete</td>
                        <th>R$10.00</th>
                      </tr>
                      <tr>
                        <td> <br> </td>
                        <th><br></th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th>R$456.00</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="box">
                <div class="box-header">
                  <h4 class="mb-0">Cupom de Desconto</h4>
                </div>
                <p class="text-muted">Se você tiver um código de desconto, insira-o na caixa abaixo.</p>
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control"><span class="input-group-append">
                      <button type="button" class="btn btn-primary"><i class="fa fa-gift"></i></button></span>
                  </div>
                  <!-- /input-group-->
                </form>
              </div>
            </div>
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>
    <?php include_once './footer.php';?>