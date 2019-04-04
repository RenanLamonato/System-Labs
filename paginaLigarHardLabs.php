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
                    <form method="POST" action="paginaTurno.php">
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
                
                <form method="POST" action="PHP/hardXlab.php?">
                    <center>
                                        <h1>Ligar Hardware aos Laboratorios</h1>
            <table>
                <tr>
                    <td>Nome do Hardware:</td>
                    <td>
                        <select name="opHardware">
                            <?php
                            $sql = "SELECT * FROM Hardware";
       $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }                     while ($tbl = mysqli_fetch_array($result))
                {
      $Nom = $tbl["nome_Hardware"];
      $Codigo = $tbl["id_Hardware"];
    
    ?>
                            <option nome="formHardware" value="<?php echo "$Codigo"; ?>">
        <?php                        
echo "$Nom";                 
                            
                ?></option><?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Laboratorio:</td>
                    <td>
                        <select name="opLaboratorio">
                            <?php
                            $sql = "SELECT * FROM Laboratorio";
       $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }                     while ($tbl = mysqli_fetch_array($result))
                {
      $Nom = $tbl["nome"];
      $Codigo = $tbl["id_Laboratorio"];
    
    ?>
                            <option nome="formLaboratorio" value="<?php echo "$Codigo"; ?>">
        <?php                        
echo "$Nom";                 
                            
                ?></option><?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                <td colspan="2" align="right">
                    <input type='submit' value="vincular">
                </td>
                </tr>
                
            </table>
            </center>
            
        </form>
                        <a href="paginaAdmControle.php"> <img src="Imagens/BTvoltar.png"></a>

                
                
                
                
            </div>
      </div>
                   <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
  <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
               </footer>
    </body>
</html>