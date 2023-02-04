<?php
require_once "topo.php";

if (isset($_SESSION['idUsuario'])) {
    if (isset($_GET['id'])) {
        $var_id = $_GET['id'];
        $var_data = $_GET['data'];
        $var_status = $_GET['status'];

        echo "<h2>Meu pedido</h2><br><br>";
        echo "<p>Número: $var_id Data: $var_data Status: $var_status</p>";

        require_once "conexao.php";

        $sql = "SELECT ip.*, p.descricao from itenspedido ip, produtos p, pedidos ped
                where ip.idProduto = p.id and 
                ip.idPedido = p.id and
                ip.idPedido = $var_id and
                ped.idPessoa = $_SESSION[idUsuario]";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {
            echo "<p>id: $linha[id] - $linha[descricao] ($linha[preco])";
        }

        echo "<a href='pedidos.php'>Voltar</a>";
    } else {
        echo "<p>Seleciona um pedido.</p>";
    }
} else
    echo "<p>Você não tem permissão para executar esta ação.</p>";

require_once "rodape.php";
