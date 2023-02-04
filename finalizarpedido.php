<?php
require_once("topo.php");

if (isset($_SESSION['carrinho']) && isset($_SESSION['nomeUsuario'])) {

    $produtos = explode(',', $_SESSION['carrinho']);
    $sqlPedido = "insert into pedidos (data, idPessoa, status) values (now(), $_SESSION[idUsuario], 0)";
    require_once('conexao.php');

    $pedido = $conexao->prepare($sqlPedido);
    $pedido->execute();
    $idPedido = $conexao->lastInsertId();

    for ($i = 0; $i < sizeof($produtos) - 1; $i++) {
        echo "<br>" . $produtos[$i];
        $sqlItem = "insert into itenspedido (idPedido, idProduto, quantidade, preco) values ($idPedido, $produtos[$i], 1,
                    (select precovenda from produtos where id=$produtos[$i]))";
        $itemPedido = $conexao->prepare($sqlItem);
        $itemPedido->execute();
        echo "<p>Gravado...</p>";
    }
    echo "<p>Pedido salvo com sucesso!</p>";
    unset($_SESSION['carrinho']);
    unset($_SESSION['qtde']);
} else {
    echo "<p>Você não tem permissão para acessar esta página</p>";
}

require_once("rodape.php");
