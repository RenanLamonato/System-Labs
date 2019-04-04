<!DOCTYPE html>
<html>
    <head>
        <title>Systen Lab</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css"/>
        <script language="javascript" src="JavaScript/funcoes.js"></script>
        <?php
      include("./fabricaConecao.php");
      
?>
    </head>
    <body>
        <div id="corpoInteiro">
            <div id="cabecalio">
                <a href="PaginaInicial.php"><img id="utfpr" src="Imagens/utfpr.png"/></a> 
                <a href="paginaLogin.php"><img id="iimgLogin" src="Imagens/BTlogin.png"/></a>
            </div>
            <div id="ladoEsquerdo">
                <nav class="menu">
                    <form method="POST" action="PHP/AtualizarHardware.php">
                    <ul id="nav">
                        <a href="paginaLaboratorios.php"> <li>Laboratorios</li></a>
<?php  $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                {
      $Nom = $tbl["nome"];
      $Codigo = $tbl["id_Laboratorio"];
    ?>
                        <li><?php echo "$Nom"; ?>
                        <ul>
                            <?php echo "<li><a href=paginaEspecificacoes.php?buscacodigo=$Codigo> Ver Especificações </li>";?>
                            <?php echo"<li><a href=paginaTurno.php?buscacodigo=$Codigo> Ver Disponibilidade </a>";?>
                        </ul></li><?php  } ?>
                        </ul>
                        </form>
                </nav>
            </div>    
            
            <div id="ladoDireito">
          
                <h1>Adcionar Hardware</h1>
                <form method="POST" action="PHP/paginaAdicionarHardware.php?">
            <table>
                <tr>
                    <td>Nome do Hardware:</td>
                    <td>
                        <input name="FormNomeHardware" maxlength="100">
                    </td>
                </tr>
                <tr>
                    <td>versão:</td>
                    <td>
                        <input name="FormVersao" maxlength="50">
                    </td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>
                        <input name="FormDescricao" maxlength="100">
                    </td>
                </tr>
                <tr>
                <td colspan="2" align="right">
                    <input type="submit" value="Cadastrar">
                </td>
                </tr>
                
            </table>
                    <br><a href="PHP/mostrarDadosBancoHardware.php"><b>Clique aqui para mostrar os valores em registro e os atualizar</b></a>
            
            
        </form>
            
            
            </div>
      </div>
        <a href="paginaAdmControle.php"> <img src="Imagens/BTvoltar.png"></a>
                   <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
  <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
               </footer>
    </body>
</html>