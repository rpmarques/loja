<div class="col-lg-3">
          <!-- *** MENUS AND FILTERS *** -->
          <!-- *** TRAGO TODAS AS CATEGORIAS E SUBs *** -->
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Categorias</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column category-menu">
                <?php
                $categorias = $objProdutos->selectCategorias("id,nome", "", "4");
                if (!empty($categorias)) {
                  foreach ($categorias as $itemCat) {
                    $wWhere = " categoria_id=$itemCat->id"; ?>
                    <li><a href="./produtos.php?categoria_id=<?= $itemCat->id; ?>" class="nav-link active"><?= $itemCat->nome; ?> <span class="badge badge-secondary"><?= $objProdutos->contaProduto($wWhere); ?></span></a>
                      <ul class="list-unstyled">
                        <?php
                        $subCategoria = $objProdutos->selectSubCategorias("id,nome", "categoria_id=$itemCat->id");
                        if (!empty($subCategoria)) {
                          foreach ($subCategoria as $itemSub) {
                            $wWhere1 = " AND sub_categoria_id=$itemSub->id";
                            $wWhereFinal = $wWhere . $wWhere1;
                        ?>
                            <li><a href="./produtos.php?categoria_id=<?= $itemCat->id; ?>&sub_categoria_id=<?= $itemSub->id; ?>" class="nav-link"><?= $itemSub->nome; ?><span class="badge badge-secondary"><?= $objProdutos->contaProduto($wWhereFinal); ?></span></a></li>
                        <?php
                            $wWhereFinal = '';
                          }
                        }
                        ?>
                      </ul>
                    </li>
                <?php }
                }
                ?>
              </ul>
            </div>
          </div>