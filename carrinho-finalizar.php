<?php require_once './header.php';?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Carrinho - Resumo do Pedido</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="checkout4.html">
                  <h1>Carrinho - Resumo do Pedido</h1>
                  <div class="nav flex-column flex-sm-row nav-pills">
                  <a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker"></i>Endereço</a>
                  <a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck"></i>Tipo de Entrega</a>
                  <a href="checkout3.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money"></i>Tipo de Pagamento</a>
                  <a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye"></i>Resumo</a>
                  </div>
                  <div class="content">
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
                            <td>2</td>
                            <td>R$123.00</td>
                            <td>R$0.00</td>
                            <td>R$246.00</td>
                          </tr>
                          <tr>
                            <td><a href="#"><img src="https://via.placeholder.com/50x50" alt="Black Blouse Armani"></a></td>
                            <td><a href="#">Black Blouse Armani</a></td>
                            <td>1</td>
                            <td>R$200.00</td>
                            <td>R$0.00</td>
                            <td>R$200.00</td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="5">Total</th>
                            <th>R$446.00</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.table-responsive-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Voltar para tipo de Pagamento</a>
                    <button type="submit" class="btn btn-primary">Finalizar Pedido<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <div class="col-md-3">
              <div id="order-summary" class="card">
                <div class="card-header">
                  <h3 class="mt-4 mb-4">Resumo do Pedido</h3>
                </div>
                <div class="card-body">
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
                          <td><br></td>
                          <th></th>
                        </tr>
                        <tr class="total">
                          <td>Total</td>
                          <th>R$456.00</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col-lg-3-->
          </div>
        </div>
      </div>
    </div>
<?php require_once './footer.php';?>