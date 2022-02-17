<?php
require_once './header.php';
$ok = "false";
if ($_GET && isset($_GET['id'])) {
  $id = base64_decode($_GET['id']);
  if ($ctrec = $objContasReceber->pegaConta($id)){
    $cliente = $objClientes->pegaCli($ctrec->cliente_id);
  }
  
}
if ($_POST && isset($_POST['id'])) {
  $id = $_POST['id'];
  $ret = $objContasReceber->delete($id);
  $ctrec = $objContasReceber->pegaConta($_POST['id']);
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
              $ok = "true";
              require_once './alertaSucesso.php';
            } else {
              require_once './alertaErro.php';
            }
          }
          ?>
          <!-- general form elements -->
          <?php
          if (!empty($ctrec)) { ?>
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Exclusão de Conta - Nro:<?= $ctrec->nronf ?> - Série:<?= $ctrec->serie ?> - Parcela:<?= $ctrec->ordem . "/" . $ctrec->total_ordem ?></h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" name="id" value="<?= $ctrec->id ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Nro NF</label>
                        <input type="text" class="form-control form-control-sm" disabled name="nronf" value="<?= $ctrec->nronf ?>">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>Série</label>
                        <input type="text" class="form-control form-control-sm " disabled name="serie" value="<?= $ctrec->serie ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Data</label>
                        <input type="text" class="form-control form-control-sm data" disabled name="datac" value="<?= formataData($ctrec->datac) ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Data Venc.</label>
                        <input type="text" class="form-control form-control-sm data" disabled name="data_venc" value="<?= formataData($ctrec->data_venc) ?>">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>ctrecornecedor</label>
                        <cliente class="form-control form-control-sm" type="text" disabled value="<?= $ctrec->cliente_id . " - " . $fornec->nome; ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Valor da Parcela</label>
                        <input class="form-control form-control-sm valor" name="valor" disabled value="<?= $ctrec->valor ?>" disabled>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>Parcela</label>
                        <input class="form-control form-control-sm " type="text" name="ordem" disabled value="<?= $ctrec->ordem . "/" . $ctrec->total_ordem ?>">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Histórico</label>
                        <input class="form-control form-control-sm " name="historico" disabled type="text" value="<?= $ctrec->historico ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <h3>Dados da Quitação</h3>
                      <hr>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Forma de Pgto</label>
                        <?=$objContasPagar->montaSelect('forma_pgto_id');?>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Data Pgto.</label>
                        <input type="text" class="form-control form-control-sm data" name="datap" value="<?php echo date('d/m/Y') ?>">
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Excluir</button>
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