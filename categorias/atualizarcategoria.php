<?php
    require_once "../topo.php";
    if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_POST['id'])&&
        isset($_POST['descricao'])){

        $var_id = $_POST['id'];
        $var_descricao = $_POST['descricao']; 

        require_once "../conexao.php";
        try
            {   
                //vamos atualizar na tabela
                $sql="update categorias set 
                    descricao='$var_descricao'
                    where id=$var_id";
                $query=$conexao->prepare($sql);
                $query->execute();
                echo "<p>Atualizado com sucesso!</p>";
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
    //fim do if
    else {
        echo "<h2>Preencha o <a href='cadprodutos.php'>
        formulário</a></p>";
    }
    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
    require_once "../rodape.php";
