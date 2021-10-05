<?php require_once './header.php'; ?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Carrinho -  Tipo de Entrega</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="./carrinho-tipo-pagamento.php">
                  <h1>Carrinho - Tipo de Entrega</h1>
                  <div class="nav flex-column flex-sm-row nav-pills">
                    <a href="./carrinho-endereco.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker"></i>Endereço</a>
                    <a href="./carrinho-tipo-entrega.php" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-truck"></i>Tipo de Entrega</a>
                    <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money"></i>Tipo de Pagamento</a>
                    <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"></i>Resumo</a>
                  </div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="box shipping-method">
                          <h4>Retirar no Local</h4>
                          <p>Aguarde nosso contato para retirar o seu produto.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="delivery" value="delivery1">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box shipping-method">
                          <h4>Entregar</h4>
                          <p>Em breve entraremos em contato para avisar sobre a entrega.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="delivery" value="delivery2">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="./carrinho-endereco.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Alterar Endereço</a>
                    <button type="submit" class="btn btn-primary">Escolher Tipo de Pagamento<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-md-9-->
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
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
    </div>
<?php require_once './footer.php'; ?>