<?php
require_once './header.php';
if ($_GET) {
  if (isset($_GET['id'])){
    $fornecedorID = base64_decode($_GET['id']);
    $fornecedor = $objFornecedores->pegaFornec($fornecedorID);
  }
  
}
if ($_POST) {
  if (isset($_POST['id'])) {
    $nome=$_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $fone1 = $_POST['fone1'];
    $fone2 = $_POST['fone2'];
    $email= $_POST['email'];
    $rContato = '';
    $fornecedorID = $_POST['id'];
    $cpf= $_POST['cpf'];

    $ret = $objFornecedores->update($nome, $cnpj, $fone1, $fone2, $email, $rContato, $fornecedorID, $cpf);
    $fornecedor = $objFornecedores->pegaFornec($fornecedorID);
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
          if (!empty($fornecedor)) { ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edição de Fornecedor</h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" value="<?= $fornecedor->id; ?>" name="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control form-control-sm" name="nome" value="<?= $fornecedor->nome; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>CNPJ</label>
                        <input type="text" class="form-control form-control-sm cnpj" name="cnpj" data-inputmask='"mask": "99.999.999/9999-99"' data-mask value="<?= $fornecedor->cnpj; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>CPF</label>
                        <input class="form-control form-control-sm cpf" name="cpf" data-inputmask='"mask": "999.999.999-99"' data-mask value="<?= $fornecedor->cpf; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fone 1</label>
                        <input class="form-control form-control-sm fone" name="fone1" data-inputmask='"mask": "(99)-99999-9999"' data-mask value="<?= $fornecedor->fone1; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fone 2</label>
                        <input class="form-control form-control-sm fone" name="fone2" data-inputmask='"mask": "(99)-99999-9999"' data-mask value="<?= $fornecedor->fone2; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control form-control-sm " name="email" type="email" value="<?= $fornecedor->email; ?>">
                      </div>
                    </div>
                  </div>
                </div> <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Gravar</button>
                </div>
              </form>
            </div> <!-- /.card -->
          <?php }
          ?>
          <!-- general form elements -->

        </div>
        <!--/.col  -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>