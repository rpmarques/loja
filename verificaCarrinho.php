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
        LoggerCarrinho("TEMOS O CARRINHO, VAMOS ADICIONAR ITENS");
        LoggerCarrinho("VAMOS VERIFICAR SE JÁ TEMOS ESTE PRODUTO NO CARIRNHO");
        $itemCarrinho = $objPedidos->pegaItemCarrinho(session_id(), $_POST['produto_id']);
        if (empty($itemCarrinho)) {
            escreve("NÃO TEMOS O PRODUTO NO CARRINHO");
            if ($objPedidos->insertItemPedido(session_id(), $_POST['produto_id'], '1')) {
                LoggerCarrinho("OK...ADICIONAMOS ITEM NO CARRINHO EXISTENTE");
                LoggerCarrinho("CODIGO DO PRODUTO:" . $_POST['produto_id']);
            } else {
                escreve("PROBLEMAS PARA INSERIR ITENS....VER LOG");
            }
        } else {
            $wQtde = intval($itemCarrinho->qtde);
            $ret = $objPedidos->atualizaQTDE($itemCarrinho->id, $itemCarrinho->qtde + 1);
            if ($ret) {
                LoggerCarrinho("ADICIONAMOS QTDE NO ITEM DO CARRINHO ID:[" . session_id() . "]");
            }
        }
    }
}
