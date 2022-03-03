<?php
require_once './header.php';
if ($_GET) {
  if (isset($_GET['id'])) {
    $clienteId = base64_decode($_GET['id']);
    $cliente = $objClientes->pegaCliente($clienteId);
  }
}
if ($_POST) {




  if (isset($_POST['id'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $cgc = $_POST['cgc'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $fone1 = $_POST['fone1'];
    $id = $_POST['id'];

    $ret = $objClientes->atualizaCliente($nome, $email, $endereco, $cep, $bairro, $cgc, $numero, $cidade, $uf, $fone1, $id);
    $cliente = $objClientes->pegaCliente($id);
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
          if (!empty($cliente)) { ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edição de Cliente</h3>
              </div> <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input type="hidden" value="<?= $cliente->id; ?>" name="id">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control form-control-sm" name="nome" value="<?= $cliente->nome; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>CNPJ / CPF</label>
                        <input type="text" class="form-control form-control-sm cgc" name="cgc" value="<?= $cliente->cgc; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Fone 1</label>
                        <input class="form-control form-control-sm fone" name="fone1" value="<?= $cliente->fone1; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control form-control-sm " name="email" type="email" value="<?= $cliente->email; ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                      <hr>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control form-control-sm" name="endereco" value="<?= $cliente->endereco; ?>">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>Número</label>
                        <input type="text" class="form-control form-control-sm" name="numero" value="<?= $cliente->numero; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Bairro</label>
                        <input type="text" class="form-control form-control-sm" name="bairro" value="<?= $cliente->bairro; ?>">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label>CEP</label>
                        <input type="text" class="form-control form-control-sm" name="cep" value="<?= $cliente->cep; ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" class="form-control form-control-sm" name="cidade" value="<?= $cliente->cidade; ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>UF</label>
                        <?= selectEstados('uf', $cliente->uf); ?>
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
          <!-- general form elements -->
        </div>
        <!--/.col  -->
      </div> <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>