<?php
// 1=> VERIFICA SE EXISTE CARRINHO CRIADO
// 2=> FAZ A CABEÇA DO PEDIDO
// 3=> ADICIONA O ITEM NO PEDIDO

// SE CLIQUEI NO ADICIONAR AO CARRINHO, VERIFICO SE TEM CARRINHO CRIADO E DPEOIS DISSO DECIDO SE CRIO OU ADICIONO

if (isset($_POST['produto_id']) && isset($_POST['addCarrinho'])) {
    LoggerCarrinho("VAMOS VERIFICAR SE TEM CARRINHO CRIADO");
    if (!isset($_SESSION['carrinho_id'])) {
        LoggerCarrinho("NÃO TEMOS CARRINHO, VAMOS CRIAR");
        $_SESSION['carrinho_id'] = session_id();
        if ($objPedidos->criaPedido($_SESSION['carrinho_id'])) { //CRIAMOS O PEDIDO
            LoggerCarrinho("criamos o pedido");
            if ($objPedidos->insertItemPedido($_SESSION['carrinho_id'], $_POST['produto_id'], '1')) {
                LoggerCarrinho("ADICIONAMOS O 1o ITEM");
                LoggerCarrinho("CODIGO DO PRODUTO:" . $_POST['produto_id']);
            }
        } else {
            escreve("NÃO CONSEGUIMOS CRIAR....VER LOG");
        }
    } else {
        LoggerCarrinho("JA TEM CARRINHO, VAMOS ADICIOANR ITENS");
    }
}
