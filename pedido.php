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
            <?php $pedido = $objPedidos->pegaCabecaCarrinho(session_id()); ?>
            <h1>Pedido Nro.: <?= $pedido->id; ?></h1>
            <p class="lead">O Pedido Nro.:<?= $pedido->id; ?> foi incluido dia <strong><?= formataData($pedido->datac); ?></strong> e atualmente esta <strong>sendo preparado</strong>.</p>
            <p class="text-muted">Se você tiver alguma dúvida, sinta-se à vontade, nosso centro de atendimento ao cliente está trabalhando para você 24 horas por dia, 7 dias por semana.</p>
            <hr>
            <div class="table-responsive mb-4">
              <?php
              $itensPedido = $objPedidos->pegaItemCarrinho(session_id());
              if (!empty($itensPedido)) { ?>
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
                  <?php foreach ($itensPedido as $item) { ?>
                    <tbody>
                      <tr>
                        <?php $foto = $objProdutos->pegaFotos($item->produto_id, true) ?>
                        <td><a href="#"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="Black Blouse Armani"></a></td>
                        <td><a href="./produto.php?produto_id=<?= $item->produto_id ?>"><?= $item->nome_produto ?></a></td>
                        <td><?= $item->qtde ?></td>
                        <td><?= "R$" . formataMoeda($item->valor_unitario) ?></td>
                        <td><?= "R$" . formataMoeda($item->desconto_unitario) ?></td>
                        <td><?= "R$" . formataMoeda(($item->qtde * $item->valor_unitario) - $item->desconto_unitario) ?></td>
                      </tr>
                    </tbody>
                  <?php } // FIM foreach ($itensPedido as $item) 
                  ?>
                  <tfoot>
                    <tr>
                      <th colspan="5" class="text-right">Sub Total</th>
                      <th><?= "R$" . formataMoeda($pedido->total_produtos); ?></th>
                    </tr>
                    <!-- <tr>
                      <th colspan="5" class="text-right">Frete</th>
                      <th>R$10.00</th>
                    </tr> -->
                    <tr>
                      <th colspan="5" class="text-right">Desconto</th>
                      <th>R$<?= "R$" . formataMoeda($pedido->desconto); ?></th>
                    </tr>
                    <tr>
                      <th colspan="5" class="text-right">Total</th>
                      <th><?= "R$" . formataMoeda($pedido->total_pedido); ?></th>
                    </tr>
                  </tfoot>
                </table>
              <?php } // FIM !empty($itensPedido) 
              ?>
            </div> <!-- /.table-responsive-->
            <div class="row addresses">
              <div class="col-lg-6">
                <?php $cliente = $objClientes->pegaCliente($pedido->cliente_id); ?>
                <h2>Endereço de Cobrança</h2>
                <p><?= $cliente->endereco . ", " . $cliente->numero; ?><br>
                  <?= $cliente->bairro; ?><br>
                  <?= $cliente->cidade . "-" . $cliente->uf;; ?><br>
                  <!-- Brasil<br> -->
                </p>
              </div>
              <div class="col-lg-6">
                <h2>Endereço de Entrega</h2>
                <p><?= $cliente->endereco . ", " . $cliente->numero; ?><br>
                  <?= $cliente->bairro; ?><br>
                  <?= $cliente->cidade . "-" . $cliente->uf;; ?><br>
                  <!-- Brasil<br> -->
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