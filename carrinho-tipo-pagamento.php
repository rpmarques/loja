<?php require_once './header.php'; ?>
    <div id="all">
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Carrinho - Tipo de Pagamento</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="./carrinho-finalizar.php">
                  <h1>Carrinho - Tipo de Pagamento</h1>
                  <div class="nav flex-column flex-sm-row nav-pills">
                    <a href="./carrinho-endereco.php" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker"></i>Endereço</a>
                    <a href="./carrinho-tipo-entrega.php" class="nav-link flex-sm-fill text-sm-center "> <i class="fa fa-truck"></i>Tipo de Entrega</a>
                    <a href="./carrinho-tipo-pagamento.php" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-money"></i>Tipo de Pagamento</a>
                    <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"></i>Resumo</a>
                  </div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Boleto Bancário</h4>
                          <p>Liberado após compensação do pagamento.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="payment1">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Cartão / Boleto</h4>
                          <p>VISA ou Mastercard.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="payment2">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="box payment-method">
                          <h4>Pagamento na entrega</h4>
                          <p>Você paga quando recebe.</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="payment" value="payment3">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <!-- /.content-->
                  <div class="box-footer d-flex justify-content-between">
                  <a href="./carrinho-tipo-entrega.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Voltar para Tipo de Entrega</a>
                    <button type="submit" class="btn btn-primary">Resumo do Pedido<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
                <!-- /.box-->
              </div>
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
 <?php require_once './footer.php'; ?>