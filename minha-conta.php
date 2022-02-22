<?php
require_once './header.php';
$id = $_SESSION['cliente_id'];
Logger("VAMOS PROCURAR O CLIENTE");
if ($cliente = $objClientes->pegaCliente($id)) {
  Logger("LOCALIZAMOS O CLIENTE");
  $gravaSenha = isset($_POST['gravar_senha']);
  $gravaDados = isset($_POST['gravar_dados']);
  if ($gravaSenha) {
    Logger('VAMOS ALTERAR A SENHA');
    $senha = $_POST['senha'];
    if ($objClientes->atualizaSenha($senha, $id)) {
      Logger("SENHA DO CLIENTE ID:[$id] ATUALZIADOS");
      $cliente = $objClientes->pegaCliente($id);
      abreModal("modal-senha-alterada");
    } else {
      Logger("ERRO AO ATUALIZAR DADOS DO CLINTE");
      abreModal("erro-modal");
    }
  }
  //DADOS DA CONTA
  if ($gravaDados) {
    Logger('VAMOS ALTERAR OS DADOS');
    if ($objClientes->atualizaCliente(
      $_POST['nome'],
      $_POST['email'],
      $_POST['endereco'],
      $_POST['cep'],
      $_POST['bairro'],
      $_POST['cgc'],
      $_POST['numero'],
      $_POST['cidade'],
      $_POST['uf'],
      $_POST['fone1'],
      $id
    )) {
      Logger("DADOS DO CLIENTE ID:[$id] ATUALZIADOS");
      $cliente = $objClientes->pegaCliente($id);
      abreModal("sucesso-modal-dados_alterados");
    } else {
      Logger("ERRO AO ATUALIZAR DADOS DO CLINTE");
      abreModal("erro-modal");
    }
  }
}
if (empty($cliente)) {
  Logger("NÃO TEMOS CLIENTE, VAMOS PRO INDEX");
  vaiPraPagina('index');
}
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
              <li aria-current="page" class="breadcrumb-item active">Minha Conta</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <!-- MENU DA CONTA -->
          <div class="card sidebar-menu">
            <div class="card-header">
              <h3 class="h4 card-title">Seção do cliente</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column">
                <a href="./meus-pedidos.php" class="nav-link "><i class="fa fa-list"></i> Meus Pedidos</a>
                <a href="./lista-desejos.php" class="nav-link"><i class="fa fa-heart"></i> Lista de Desejos</a>
                <a href="./minha-conta.php" class="nav-link active"><i class="fa fa-user"></i> Minha Conta</a>
                <a href="./logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Sair</a>
              </ul>
            </div>
          </div> <!-- /.col-lg-3-->
          <!-- MENU DA CONTA -->
        </div>
        <div class="col-lg-9">
          <div class="box">
            <h1>Minha Conta</h1>
            <p class="lead">Altere seus dados pessoais ou sua senha aqui.</p>
            <h3>Alterar a senha</h3>
            <form method="post" data-toggle="validator" id="formSenha">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Senha nova</label>
                    <input type="password" class="form-control" name="senha" id="senha">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Digite novamente a nova senha</label>
                    <input type="password" class="form-control" id="repeteSenha" data-match="#senha" data-match-error="Senhas não conferem, verifique">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary" name="gravar_senha"><i class="fa fa-save"></i> Gravar Nova Senha</button>
              </div>
            </form>
            <!-- DADOS PESSOAIS -->
            <h3 class="mt-5">Dados Pessoais</h3>
            <form method="post" id="formDados">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?= $cliente->nome ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>CNPJ / CPF</label>
                    <input type="text" class="form-control cgc" name="cgc" value="<?= $cliente->cgc ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="street">Endereço</label>
                    <input id="street" type="text" class="form-control" name="endereco" value="<?= $cliente->endereco ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="numero">Número</label>
                    <input id="numero" type="text" class="form-control" name="numero" value="<?= $cliente->numero ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input id="bairro" type="text" class="form-control" name="bairro" value="<?= $cliente->bairro ?>">
                  </div>
                </div>
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-md-6 col-lg-3">
                  <div class="form-group">
                    <label for="zip">CEP</label>
                    <input id="zip" type="text" class="form-control cep" name="cep" value="<?= $cliente->cep ?>">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="city">Cidade</label>
                    <input id="city" type="text" class="form-control" name="cidade" value="<?= $cliente->cidade ?>">
                  </div>
                </div>
                <div class="col-md-6 col-lg-3">
                  <div class="form-group">
                    <label for="state">Estado (UF)</label>
                    <?= selectEstados('uf', $cliente->uf); ?>
                    <!-- <select id="state" class="form-control" ></select> -->
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">Telefone</label>
                    <input id="phone" type="text" class="form-control fone" name="fone1" value="<?= $cliente->fone1 ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value="<?= $cliente->email ?>">
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary" name="gravar_dados"><i class="fa fa-save"></i> Salvar alterações</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require_once './footer.php';
?>