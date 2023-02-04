<?php
require_once "topo.php";

if (isset($_SESSION['idUsuario'])) {
    require_once "conexao.php";
    $sql = "SELECT * from pedidos where idPessoa = " . $_SESSION['idUsuario'];
    $resultado = $conexao->query($sql);
    $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        echo "<p>id: $linha[id] - 
            $linha[data] ($linha[status])
            <a href='verpedido.php?id=$linha[id]&data=$linha[data]&status=$linha[status]'
            <i class='fas fa-bars'></i>
            </a>
            ";
    }
} else
    echo "<p>Você não tem permissão para executar esta ação.</p>";

require_once "rodape.php";
