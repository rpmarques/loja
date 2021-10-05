<?php
require_once './header.php';
if (isset($_POST['logar']) || isset($_POST['registrar'])){
  $wLogar = isset($_POST['logar']);
  $wRegistrar = isset($_POST['registrar']);
  
  if ($wRegistrar) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
  
    if ($objClientes->criaConta($nome, $email, $senha)) {
      abreModal("sucesso-modal");
    } else {
      abreModal("erro-modal");
    }
  }
  if ($wLogar) {
  }
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
              <li aria-current="page" class="breadcrumb-item active">Nova conta / Entrar</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6">
          <div class="box">
            <h1>Nova conta</h1>
            <p class="lead">Ainda não é nosso cliente registrado?</p>
            <p>Com o registro você terá acesso a descontos excluisos e muito mais! Todo o processo não levará mais de um minuto!</p>
            <p>Se você tiver alguma dúvida, sinta-se à vontade, nosso centro de atendimento ao cliente está trabalhando para você 24 horas por dia, 7 dias por semana.</p>
            <hr>
            <form method="post">
              <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" type="text" name="nome" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" name="senha" class="form-control">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" name="registrar" id="registrar"><i class="fa fa-user-md"></i> Registrar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box">
            <h1>Login</h1>
            <p class="lead">Já é nosso cliente?</p>
            <p class="text-muted"></p>
            <hr>
            <form method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" type="password" class="form-control" name="senha">
              </div><br><br><br><br><br><br><br><br><br><br>
              <div class="text-center">
                <button type="submit" class="btn btn-primary" name="logar"><i class="fa fa-sign-in"></i> Entrar</button>
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