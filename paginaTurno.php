<!DOCTYPE html>
      <?php
      include("./fabricaConecao.php");
       $lab = isset($_GET["buscacodigo"])?$_GET["buscacodigo"]:"não informado";
?>
<html>
    <head>
        <title>Systen Lab</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css"/> 
        <script language="javascript" src="JavaScript/funcoes.js"></script>
    </head>
    <body>
        
            <div id="cabecalio">
                <a href="PaginaInicial.php"><img id="utfpr" src="Imagens/utfpr.png"/></a>
                <a href="paginaLogin.php"><img id="iimgLogin" src="Imagens/BTlogin.png"/></a>
                
            </div>

            <div id="ladoEsquerdo">
                <nav class="menu">
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
                            <li><?php echo "<a href=paginaEspecificacoes.php?buscacodigo=$Codigo&n=$n> Ver Especificações </li>";?>
                            <?php echo"<li><a href=paginaTurno.php?buscacodigo=$Codigo> Ver Disponibilidade </a>";?>
                        </ul></li><?php  } ?>
                    </ul>
                  </nav>
           
            </div>
        <p id="labs">
 
        </p>    <?php echo "<a id=apreto href=paginaHorarios.php?buscacodigo=$lab&tur=1>";?>
        <div id="t_manham">
                    <p>M a n h ã</p> 
        </div><?php echo "</a>";?>
        
        <?php echo "<a id=apreto href=paginaHorarios.php?buscacodigo=$lab&tur=2>";?>
                <div id="t_tarde">
                          <p>T a r d e</p>
                   
                </div>
        <?php echo "</a>"; ?>
               <?php echo "<a id=averde href=paginaHorarios.php?buscacodigo=$lab&tur=3>";?>
        <div id="t_noite">
                          <p>N o i t e</p>
                </div>
        <?php echo "</a>"; ?>
        <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
   <p>Contact information: <a href="renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
              </footer>
    </body>
</html>


