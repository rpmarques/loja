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
                  <li aria-current="page" class="breadcrumb-item active">Carrinho - Endereço de Entrega</li>
                </ol>
              </nav>
            </div>
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="get" action="./carrinho-tipo-entrega.php">
                  <h1>Carrinho - Endereço de Entrega</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center">
                        <a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker"></i>Endereço </a>
                        <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck"></i>Tipo de Entrega</a>
                        <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money"></i>Tipo de Pagamento</a>
                        <a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye"></i>Resumo </a>
                    </div>
                  <div class="content py-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">Nome</label>
                          <input id="firstname" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">Sobrenome</label>
                          <input id="lastname" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="street">Endereço</label>
                          <input id="street" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="city">Bairro</label>
                          <input id="city" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="zip">CEP</label>
                          <input id="zip" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="state">Estado</label>
                          <select id="state" class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="country">Cidade</label>
                          <select id="country" class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="phone">Telefone</label>
                          <input id="phone" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input id="email" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="./carrinho.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Voltar </a>
                    <button type="submit" class="btn btn-primary">Selecione o Tipo de Entrega<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-lg-9-->
            <div class="col-lg-3">
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