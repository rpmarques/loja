<!-- MODAL LOGIN -->
<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login do cliente</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <input id="email-modal" type="email" name="email" placeholder="exemplo@exemplo.com" class="form-control">
          </div>
          <div class="form-group">
            <input id="password-modal" type="password" name="senha" placeholder="Senha" class="form-control">
          </div>
          <p class="text-center">
            <button class="btn btn-primary" name="btn-logar"><i class="fa fa-sign-in"></i> Login </button>
          </p>
        </form>
        <p class="text-center text-muted">Não se registrou ainda?</p>
        <p class="text-center text-muted"><a href="./registrar.php"><strong>Registre-se</strong></a> É fácil e feito em 1 minuto e dá acesso a descontos especiais e muito mais!</p>
      </div>
    </div>
  </div>
</div>

<!-- MODAL CRIAR CONTA -->
<div id="sucesso-modal-criar-conta" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Conta criada</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-success"><b>Conta criada com suscesso !!!</b></p>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ERRO -->
<div id="erro-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Erro</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-danger"><b>Ops. Tivemos um problema, verifique com o suporte</b></p>
      </div>
    </div>
  </div>
</div>

<!-- MODAL SENHA ALTERADA -->
<div id="modal-senha-alterada" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sucesso</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-success"><b>Senha alterada com sucesso.</b></p>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DADOS ALTERADOS -->
<div id="sucesso-modal-dados_alterados" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sucesso</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-success"><b>Dados alterados com sucesso !!!</b></p>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE CUPOM NÃO PERMITIDO -->
<div id="cupom-fora-do-prazo-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atenção</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-danger"><b>Cupom fora do prazo, veirifque</b></p>
      </div>
    </div>
  </div>
</div>
<!-- MODAL DE CUPOM NÃO PERMITIDO -->
<div id="cupom-nao-cadastrado-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atenção</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center text-danger"><b>Não existe este cupom no sistema</b></p>
      </div>
    </div>
  </div>
</div>