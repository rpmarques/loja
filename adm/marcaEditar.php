<?php
require_once './header.php';
if ($_GET) {
  if (isset($_GET['id'])) {
    $rMarcaID = base64_decode($_GET['id']);
    $marca = $objProdutos->pegaMarca($rMarcaID);
  }
}
if ($_POST) {
  if (isset($_POST['id'])) {
    $nome = $_POST['nome'];
    $rMarcaID = $_POST['id'];

    $ret = $objProdutos->atualizaMarca($nome, $rMarcaID);
    $marca = $objProdutos->pegaMarca($rMarcaID);
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header"> </section> <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <?php
          if (isset($ret)) {
            if ($ret) {
              require_once './alertaSucesso.php';
            } else {
              require_once './alertaErro.php.php';
            }
          }
          if (!empty($marca)) { ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edição de Forma de Pagamento</h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" value="<?= $marca->id; ?>" name="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control form-control-sm" name="nome" value="<?= $marca->nome; ?>">
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Gravar</button>
                </div>
              </form>
            </div> <!-- /.card -->
          <?php } ?>
        </div>
        <!--/.col  -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>