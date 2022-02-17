<?php
require_once './header.php';
if ($_POST) {
  if (isset($_POST['valor'])) {
    $nronf = $_POST['nronf'];
    $serie = $_POST['serie'];
    $datac = $_POST['datac'];
    $clienteID = $_POST['cliente_id'];
    $valor = $_POST['valor'];
    $historico = $_POST['historico'];
    $ordem = '1';
    if ($_POST['ordem'] <> ''){
      $ordem = $_POST['ordem'];
    }    
    if (($_POST['data_venc']) <> '') {
      $dataVenc = $_POST['data_venc'];
    } else {
      $dataVenc = date('d/m/Y');
    }
    $ret = $objContasReceber->incluirConta($nronf, $serie, $datac, $clienteID, $valor, $historico, $ordem, $dataVenc);
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
              require_once './alertaErro.php';
            }
          }
          ?>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Inclusão de Conta</h3>
            </div> <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Nro NF</label>
                      <input type="text" class="form-control form-control-sm" name="nronf">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label>Série</label>
                      <input type="text" class="form-control form-control-sm " name="serie">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Data</label>
                      <input type="text" class="form-control form-control-sm data" name="datac" value="<?php echo date('d/m/Y') ?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Data Venc.</label>
                      <input type="text" class="form-control form-control-sm data" name="data_venc">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Fornecedor</label>
                      <?= $objClientes->montaSelect('cliente_id'); ?>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Valor da Parcela</label>
                      <input class="form-control form-control-sm valor" name="valor">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Parcelas</label>
                      <input class="form-control form-control-sm " type="number" name="ordem">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="form-group">
                      <label>Histórico</label>
                      <input class="form-control form-control-sm " name="historico" type="text">
                    </div>
                  </div>
                </div>
              </div> <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Gravar</button>
              </div>
            </form>
          </div> <!-- /.card -->
        </div>
        <!--/.col  -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>