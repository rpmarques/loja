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
                            <h3 class="card-title">Listagem de Marcas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $marcas = $objProdutos->listaMarcas();
                                    foreach ($marcas as $marca) { ?>
                                        <tr>
                                            <td><?= $marca->nome; ?></td>
                                            <td>
                                                <a class="btn bg-gradient-primary btn-xs" href="./marcaEditar.php?id=<?= base64_encode($marca->id) ?>"><i class="fa fa-edit"></i> Editar </a>
                                                <a class="btn bg-gradient-danger btn-xs" href="./marcaExcluir.php?id=<?= base64_encode($marca->id) ?>"><i class="fa fa-eraser"></i> Exluir </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="./marcaIncluir.php" class="btn btn-primary btn-sm">Cadastrar Marca</a>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>