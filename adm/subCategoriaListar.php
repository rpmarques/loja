<?php
require_once './header.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listagem de Sub-Categorias</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Categoria</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //listaSubCategorias($rCampos = "", $rWhere = "", $rLimit = "", $rLeft = "", $rOrderBy = "", $rGroupBy = "")
                                    $subCategoria = $objProdutos->listaSubCategorias("sub_categoria.*,categoria.nome AS nomeCat","","","LEFT JOIN categoria ON categoria.id=sub_categoria.id");
                                    foreach ($subCategoria as $sub) { ?>
                                        <tr>
                                            <td><?= $sub->nome; ?></td>
                                            <td><?= $sub->nomeCat; ?></td>
                                            <td>
                                                <a class="btn bg-gradient-primary btn-xs" href="./subCategoriaEditar.php?id=<?= base64_encode($sub->id) ?>"><i class="fa fa-edit"></i> Editar </a>
                                                <a class="btn bg-gradient-danger btn-xs" href="./subCategoriaExcluir.php?id=<?= base64_encode($sub->id) ?>"><i class="fa fa-eraser"></i> Exluir </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="./subCategoriaIncluir.php" class="btn btn-primary btn-sm">Cadastrar Sub-Categoria</a>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>