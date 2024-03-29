<?php require_once('./header.php'); ?>
<div id="all">
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main-slider" class="owl-carousel owl-theme">
            <div class="item"><img src="https://via.placeholder.com/1200x563" alt="" class="img-fluid"></div>
            <div class="item"><img src="https://via.placeholder.com/1200x563" alt="" class="img-fluid"></div>
            <div class="item"><img src="https://via.placeholder.com/1200x563" alt="" class="img-fluid"></div>
            <div class="item"><img src="https://via.placeholder.com/1200x563" alt="" class="img-fluid"></div>
          </div>
          <!-- /#main-slider-->
        </div>
      </div>
    </div>
  
    <div id="hot">
      <div class="box py-4">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mb-0">Novidades da Semana</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="product-slider owl-carousel owl-theme">
          <?php
          $wCampos = "id,nome,preco_ven,preco_antigo,mais_vendido,promocao,novidade";
          $wWhere = "";
          $wLimit = "10";
          $wOrderBy = " id DESC";
          $produtos = $objProdutos->selectProduto($wCampos, $wWhere, $wLimit, "", $wOrderBy);
          foreach ($produtos as $pro) {
            $foto = $objProdutos->pegaFotos($pro->id, true);
          ?>
            <div class="item">
              <div class="product">
                <div class="flip-container">
                  <div class="flipper">
                    <?php if (isset($foto->foto_1)) { ?>
                      <div class="front"><a href="./produto.php?produto_id=<?= $pro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="./produto.php?produto_id=<?= $pro->id ?>"><img src="./img/pro/<?= $foto->foto_1 ?>" alt="" class="img-fluid"></a></div>
                    <?php } else { ?>
                      <div class="front"><a href="./produto.php?produto_id=<?= $pro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                      <div class="back"><a href="./produto.php?produto_id=<?= $pro->id ?>"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a></div>
                    <?php }  ?>
                  </div>
                </div>
                <a href="./produto.php?produto_id=<?= $pro->id ?>" class="invisible"><img src="https://via.placeholder.com/450x600" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3><a href="./produto.php?produto_id=<?= $pro->id ?>"><?= $pro->nome; ?></a></h3>
                  <p class="price">
                    <del><?= $pro->preco_antigo > 0 ? 'R$' . formataMoeda($pro->preco_antigo) . '<br>' : '<br>'; ?></del> R$<?= formataMoeda($pro->preco_ven); ?>
                  </p>
                </div> <!-- /.text-->
                <?php
                if ($pro->mais_vendido) { ?>
                  <div class="ribbon sale">
                    <div class="theribbon">MAIS VENDIDOS</div>
                    <div class="ribbon-background"></div>
                  </div>
                <?php }
                if ($pro->novidade) { ?>
                  <div class="ribbon new">
                    <div class="theribbon">NOVIDADE</div>
                    <div class="ribbon-background"></div>
                  </div>
                <?php }
                if ($pro->promocao) { ?>
                  <div class="ribbon gift">
                    <div class="theribbon">PROMOÇÃO</div>
                    <div class="ribbon-background"></div>
                  </div> <!-- /.ribbon-->
                <?php } ?>
              </div> <!-- /.product-->
            </div> <!-- /.product-slider-->
          <?php } ?>
        </div> <!-- /.container-->
      </div> <!-- /#hot-->
      <!-- *** HOT END ***-->
    </div>
  </div>
</div>
<?php require_once('./footer.php'); ?>