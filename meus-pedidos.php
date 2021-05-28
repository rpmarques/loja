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
                  <li aria-current="page" class="breadcrumb-item active">Meus Pedidos</li>
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
                    <a href="./meus-pedidos.php" class="nav-link active"><i class="fa fa-list"></i> Meus Pedidos</a>
                    <a href="./lista-desejos.php" class="nav-link"><i class="fa fa-heart"></i> Lista de Desejos</a>
                    <a href="./minha-conta.php" class="nav-link "><i class="fa fa-user"></i> Minha Conta</a>
                    <a href="/.logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Sair</a></ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
            <div id="customer-orders" class="col-lg-9">
              <div class="box">
                <h1>Meus Pedidos</h1>
                <p class="lead">Seus pedidos em um só lugar.</p>
                <p class="text-muted">Se você tiver alguma dúvida, sinta-se à vontade, nosso centro de atendimento ao cliente está trabalhando para você 24 horas por dia, 7 dias por semana.</p>
                <hr>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nro Pedido</th>
                        <th>Data</th>
                        <th>Total</th>
                        <th>Situação</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>R$ 150,00</td>
                        <td><span class="badge badge-info">Pedido Recebido</span></td>
                        <td><a href="./pedido.php" class="btn btn-primary btn-sm">Visualizar</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>R$ 150,00</td>
                        <td><span class="badge badge-info">Em Processamento</span></td>
                        <td><a href="./pedido.php" class="btn btn-primary btn-sm">Visualizar</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>R$ 150,00</td>
                        <td><span class="badge badge-success">Pedido Entregue</span></td>
                        <td><a href="./pedido.php" class="btn btn-primary btn-sm">Visualizar</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>R$ 150,00</td>
                        <td><span class="badge badge-danger">Cancelado</span></td>
                        <td><a href="./pedido.php" class="btn btn-primary btn-sm">Visualizar</a></td>
                      </tr>
                      <tr>
                        <th># 1735</th>
                        <td>22/06/2013</td>
                        <td>R$ 150,00</td>
                        <td><span class="badge badge-warning">Em espera</span></td>
                        <td><a href="./pedido.php" class="btn btn-primary btn-sm">Visualizar</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 
require_once './footer.php';
?>