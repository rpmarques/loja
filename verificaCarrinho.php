<?php
// 1=> VERIFICA SE EXISTE CARRINHO CRIADO
// 2=> FAZ A CABEÇA DO PEDIDO - OK
// 3=> ADICIONA O ITEM NO PEDIDO - OK
// SE CLIQUEI NO ADICIONAR AO CARRINHO, VERIFICO SE TEM CARRINHO CRIADO E DPEOIS DISSO DECIDO SE CRIO OU ADICIONO - OK

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
                LoggerCarrinho("JÁ TEMOS ESTE PRODUTO ID:[" . $_POST['produto_id'] . "], ADICIONAMOS QTDE NO ITEM DO CARRINHO ID:[" . session_id() . "]");
            }
        }
    }
}

// VERIFICO SE TEM SESSION['cliente_id'], SE TIVER SETO O CODCLI NO PEDIDO
if (isset($_SESSION['cliente_id']) && isset($_SESSION['carrinho_id'])) {
    escreve("TEMOS CLIENTE E CARRINHO");
}
