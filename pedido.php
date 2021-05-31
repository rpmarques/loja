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
                  <li aria-current="page" class="breadcrumb-item"><a href="./meus-pedidos.php">Meus Pedidos</a></li>
                  <li aria-current="page" class="breadcrumb-item active">Pedido Nro.: 1735</li>
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
                <a href="./meus-pedidos.php" class="nav-link active"><i class="fa fa-list"></i> Meus Pedidos</a>
                    <a href="./lista-desejos.php" class="nav-link"><i class="fa fa-heart"></i> Lista de Desejos</a>
                    <a href="./minha-conta.php" class="nav-link "><i class="fa fa-user"></i> Minha Conta</a>
                    <a href="/.logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Sair</a></ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div id="customer-order" class="col-lg-9">
              <div class="box">
                <h1>Pedido Nro.: 1735</h1>
                <p class="lead">O Pedido Nro.:1735 foi incluido dia <strong>22/06/2013</strong> e atualmente esta <strong>sendo preparado</strong>.</p>
                <p class="text-muted">Se você tiver alguma dúvida, sinta-se à vontade, nosso centro de atendimento ao cliente está trabalhando para você 24 horas por dia, 7 dias por semana.</p>
                <hr>
                <div class="table-responsive mb-4">
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
                        <th colspan="5" class="text-right">Sub Total</th>
                        <th>R$446.00</th>
                      </tr>
                      <tr>
                        <th colspan="5" class="text-right">Frete</th>
                        <th>R$10.00</th>
                      </tr>
                      <!-- <tr>
                        <th colspan="5" class="text-right">Tax</th>
                        <th>R$0.00</th>
                      </tr> -->
                      <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th>R$456.00</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.table-responsive-->
                <div class="row addresses">
                  <div class="col-lg-6">
                    <h2>Endereço de Cobrança</h2>
                    <p>Nome<br>
                        Endereço<br>
                        Baiiro<br>
                        Número<br>
                        Brasil<br>
                        Cidade-UF
                      </p>
                  </div>
                  <div class="col-lg-6">
                    <h2>Endereço de Entrega</h2>
                    <p>Nome<br>
                        Endereço<br>
                        Baiiro<br>
                        Número<br>
                        Brasil<br>
                        Cidade-UF
                      </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php require_once './footer.php'; ?>