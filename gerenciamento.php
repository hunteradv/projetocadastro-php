<?php
require_once("topo.php");

if (isset($_SESSION['nomeUsuario'])) {
?>
    <h2>Gerenciamento de conta</h2><br>
    <a href="editarperfil.php">Meu perfil</a>
    <a href="pedidos.php">Meus pedidos</a>
    <a href="logout.php">Sair</a>
<?php
} else {
    echo "<p>Você precisa estar logado para acessar esta função.</p>";
}

require_once("rodape.php");
