<?php
if (isset($_POST['btn-logar']) || isset($_POST['logar'])) {

    //1->LOGAR
    //2->VERICA SE TEM CARRINHO
    //3->SE TIVER CARRINHO, SETA O CLIENTE E VAI PRA PAGINA DE VISUALIZAR O CARRRINHO
    //4->SE NÃO TIVER CARRINHO VAI PRA PAGINA PRINCIAL
    //5->SE NÃO ACHAR, DAR MENSAGEM QUE TEM QUE SE CADASTRAR OU A SENHA ESTA ERRADA

    $modalLogin = isset($_POST['btn-logar']);
    $paginaRegistrar = isset($_POST['logar']);

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    Logger("VAMOS TENTAR LOGAR");
    Logger("AGORA VAMOS BUSCAR O CLIENTE PELO EMAIL:$email E SENHA:$senha");
    $cliente = $objClientes->pegaLogin($email, $senha);

    if (!empty($cliente)) {
        Logger("ACHAMOS O CLIENTE");
        $_SESSION['cliente_id'] = $cliente->id;
    } else {
        Logger("NÃO LOCALIZAMOS O CLIENTE, VAMOS PRA PAGINA DE CADASTRO");
        vaiPraPagina('registrar');
    }
}
