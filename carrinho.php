<?php
require_once './header.php';
if (isset($_SESSION['cliente_id'])) {
  if ($objPedidos->atualziaCliente($_SESSION['cliente_id'], $_SESSION['carrinho_id'])) {
    LoggerCarrinho("CLIENTE GRAVADO NO PEDIDO");
  }
}
$pedido = $objPedidos->pegaCabecaCarrinho(session_id());
if ($_POST) {
  //APLICAR CUPOM
  if (isset($_POST['cupom_desconto'])) {
    $wCupomDesconto = $_POST['cupom_desconto'];
    LoggerCarrinho("VAMOS PROCURAR O CUPOM DE DESCONTO :[$wCupomDesconto]");
    $cupom = $objCupom->pegaCupom($wCupomDesconto);
    if (!empty($cupom)) {
      LoggerCarrinho("MARAVILHA, TEMOS O CUPOM :[$wCupomDesconto], AGORA VAMOS SABER SE ESTA DENTRO DO PERÍODO PERMITIDO");
      //VALIDAÇÃO DO CUPOM DE DESCONTO
      if (date("Y-m-d", strtotime("now")) >= $cupom->data_ini && (date("Y-m-d", strtotime("now")) <= $cupom->data_fim)) {
        LoggerCarrinho(" CUPOM :[$wCupomDesconto], ESTA DENTRO DO PERÍODO, VAMOS VAMOS DESCOBRIR O TIPO DE DESCONTO");
        if ($cupom->tipo_desconto === 'V') {
          LoggerCarrinho(" CUPOM :[$wCupomDesconto], ESTA USANDO DESCONTO EM VALORES");
        } else {
          LoggerCarrinho(" CUPOM :[$wCupomDesconto], ESTA USANDO DESCONTO EM %");
        }
        $retDesconto = $objPedidos->aplicaDescontoTotal($_SESSION['carrinho_id'], $cupom->tipo_desconto, $cupom->valor, $cupom->id);
        escreve("CUPOM VÁLIDO");
      } else {
        LoggerCarrinho(" CUPOM :[$wCupomDesconto], QUE PENA, FORA DO PERÍODO DO DESCONTO");
        abreModal("cupom-fora-do-prazo-modal");
      }
    } else {
      LoggerCarrinho(" NÃO EXISTE ESTE CUPOM NO SISTEMA :[$wCupomDesconto]");
      abreModal("cupom-nao-cadastrado-modal");
    }
  } //FIM if (isset($_POST['cupom_desconto'])) {
  if (isset($_POST['excluir_item'])) {
    escreve("VAMOS EXCUIR O ITEM:[] DO PEDIDO:[]");
  }
  //ATUALIZAR PEDIDO
  //APAGAR ITEM DO PEDIDO
}
$pedido = $objPedidos->pegaCabecaCarrinho(session_id());
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
              <li aria-cuRent="page" class="breadcrumb-item active">Carrinho</li>
            </ol>
          </nav>
        </div>
        <div id="basket" class="col-lg-9">
          <div class="box">
            <form method="post" action="">
              <h1>Carrinho de compras</h1>
              <?php $itensPedido = $objPedidos->contaItens(session_id()); ?>
              <p class="text-muted">No momento, você tem <?= $itensPedido ?> item(s) em seu carrsinho.</p>
              <div class="table-responsive">
                <table class="table">
                  <?php
                  $itensPedido = $objPedidos->pegaItemCarrinho(session_id());
                  if (!empty($itensPedido)) { ?>
                    <thead>
                      <tr>
                        <th colspan="2">Produto</th>
                        <th>Quantidade</th>
                        <th>Preço unitário</th>
                        <th>Desconto</th>
                        <th colspan="2">Total</th>
                      </tr>
                    </thead>
                    <?php
                    foreach ($itensPedido as $item) { ?>
                      <tbody>
                        <tr>
                          <?php $foto = $objProdutos->pegaFotos($item->produto_id, true) ?>
                          <td><a href="#"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="Black Blouse Armani"></a></td>
                          <td><a href="./produto.php?produto_id=<?= $item->produto_id ?>"><?= $item->nome_produto ?></a></td>
                          <td><input type="number" value="<?= intval($item->qtde) ?>" class="form-control"></td>
                          <td><?= "R$" . formataMoeda($item->valor_unitario) ?></td>
                          <td><?= "R$" . formataMoeda($item->desconto_unitario) ?></td>
                          <td><?= "R$" . formataMoeda(($item->qtde * $item->valor_unitario) - $item->desconto_unitario) ?></td>
                          <form action="" method="post">
                            <td><button type="submit" class="botao_carrinho" name="excluir_item" value="<?= $item->id; ?>"><i class="fa fa-trash-o"></i></button></td>
                          </form>
                        </tr>
                      </tbody>
                  <?php } //FIM foreach ($itensPedido as $item)
                  } //FIM if (!empty($itensPedido))
                  ?>
                  <tfoot>
                    <tr>
                      <th colspan="5">Total</th>
                      <th colspan="2"><?= "R$" . formataMoeda($pedido->total_pedido); ?></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.table-responsive-->
              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                <div class="left"><a href="./produtos.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue comprando</a></div>
                <div class="right">
                  <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Atualizar carrinho</button>
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
            <!-- PRODUTOS NOVO -->
            <?php
            $wCampos = "id,nome,preco_ven";
            $wOrder = "id DESC";
            $produtos = $objProdutos->selectProduto($wCampos, "", "3", "", $wOrder);
            foreach ($produtos as $pro) { ?>
              <div class="col-md-3 col-sm-6">
                <div class="product same-height">
                  <div class="flip-container">
                    <div class="flipper">
                      <?php
                      $foto = $objProdutos->pegaFotos($pro->id, true);
                      if (isset($foto->foto_1)) { ?>
                        <div class="front"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                      <?php } else { ?>
                        <div class="front"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                        <div class="back"><a href="produto.php?produto_id=<?= $pro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      <?php }  ?>
                    </div>
                  </div><a href="detail.html" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                  <div class="text">
                    <h3><?= $pro->nome; ?></h3>
                    <p class="price"><?= 'R$' . formataMoeda($pro->preco_ven); ?></p>
                  </div>
                </div>
                <!-- /.product-->
              </div>
            <?php } ?>
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
                    <th><?= "R$" . formataMoeda($pedido->total_produtos); ?></th>
                  </tr>
                  <!-- <tr>
                    <td>Frete</td>
                    <th>R$10.00</th>
                  </tr> -->
                  <tr>
                    <td>Desconto</td>
                    <th><?= "R$" . formataMoeda($pedido->desconto); ?></th>
                  </tr>
                  <tr class="total">
                    <td>Total</td>
                    <th><?= "R$" . formataMoeda($pedido->total_pedido); ?></th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <?php
          if (empty($pedido->cupom_desconto_id)) { ?>
            <div class="box">
              <div class="box-header">
                <h4 class="mb-0">Cupom de Desconto</h4>
              </div>
              <p class="text-muted">Se você tiver um código de desconto, insira-o na caixa abaixo.</p>
              <form method="post">
                <div class="input-group">
                  <input type="text" class="form-control" name="cupom_desconto"><span class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-gift"></i></button></span>
                </div> <!-- /input-group-->
              </form>
            </div>
          <?php }
          ?>

        </div> <!-- /.col-md-3-->
      </div>
    </div>
  </div>
</div>
<?php include_once './footer.php'; ?>