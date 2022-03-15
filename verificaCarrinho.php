<?php
// 1=> VERIFICA SE EXISTE CARRINHO CRIADO
// 2=> FAZ A CABEÇA DO PEDIDO - OK
// 3=> ADICIONA O ITEM NO PEDIDO - OK
// SE CLIQUEI NO ADICIONAR AO CARRINHO, VERIFICO SE TEM CARRINHO CRIADO E DPEOIS DISSO DECIDO SE CRIO OU ADICIONO - OK

if (isset($_POST['produto_id']) && isset($_POST['addCarrinho'])) {
    $produto_id = $_POST['produto_id'];
    LoggerCarrinho("VAMOS VERIFICAR SE TEM CARRINHO CRIADO");
    //CARRINHO NOVO
    if (!isset($_SESSION['carrinho_id'])) {
        LoggerCarrinho("NÃO TEMOS CARRINHO, VAMOS CRIAR");
        $_SESSION['carrinho_id'] = session_id();
        if ($objPedidos->criaPedido($_SESSION['carrinho_id'])) { //CRIAMOS O PEDIDO
            LoggerCarrinho("criamos o pedido");
            if ($objPedidos->insertItemPedido($_SESSION['carrinho_id'], $produto_id, '1')) {
                LoggerCarrinho("ADICIONAMOS O 1o ITEM - PRODUTO ID:[$produto_id]");
                LoggerCarrinho("VAMOS SOMAR O TOTAL DO PEDIDO");
                //somar qtde * valor de todos os itens que tem no carrinho com o mesmo session_id
                if ($objPedidos->somaTotais($_SESSION['carrinho_id'])) {
                    LoggerCarrinho("OK, SOMAMOS O TOTAL DO PEDIDO");
                }
            }
        } else {
            escreve("NÃO CONSEGUIMOS CRIAR....VER LOG");
        }
    } else {
        //ADCIONA ITEM NO CARRINHO EXISTENTE
        LoggerCarrinho("TEMOS O CARRINHO, VAMOS ADICIONAR ITENS");
        LoggerCarrinho("VAMOS VERIFICAR SE JÁ TEMOS ESTE PRODUTO NO CARIRNHO");
        $itemCarrinho = $objPedidos->pegaItemCarrinho(session_id(), $produto_id);
        if (empty($itemCarrinho)) {
            if ($objPedidos->insertItemPedido(session_id(), $produto_id, '1')) {
                LoggerCarrinho("OK...ADICIONAMOS ITEM NO CARRINHO EXISTENTE");
                LoggerCarrinho("CODIGO DO PRODUTO:" . $produto_id);
            } else {
                escreve("PROBLEMAS PARA INSERIR ITENS....VER LOG");
            }
        } else {
            $wQtde = intval($itemCarrinho->qtde);
            $ret = $objPedidos->atualizaQTDE($itemCarrinho->id, $itemCarrinho->qtde + 1);
            if ($ret) {
                LoggerCarrinho("JÁ TEMOS ESTE PRODUTO ID:[" . $produto_id . "], ADICIONAMOS QTDE NO ITEM DO CARRINHO ID:[" . session_id() . "]");
            }
        }
        //somar qtde * valor de todos os itens que tem no carrinho com o mesmo session_id
        LoggerCarrinho("VAMOS SOMAR O TOTAL DO PEDIDO");
        if ($objPedidos->somaTotais($_SESSION['carrinho_id'])) {
            LoggerCarrinho("OK, SOMAMOS O TOTAL DO PEDIDO");
        }
    }
}

// VERIFICO SE TEM SESSION['cliente_id'], SE TIVER SETO O CODCLI NO PEDIDO
if (!empty($email)) {
    if (isset($_SESSION['cliente_id']) && isset($_SESSION['carrinho_id'])) {
        $cliente_id = $_SESSION['cliente_id'];
        LoggerCarrinho("CLIENTE ID:[$cliente_id] LOGOU, VAMOS GRAVAR NO PEDIDO");
        if ($objPedidos->atualziaCliente($cliente_id, $_SESSION['carrinho_id'])) {
            LoggerCarrinho("CLIENTE GRAVADO NO PEDIDO");
        }
    }
}
