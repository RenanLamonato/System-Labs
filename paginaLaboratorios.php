<!DOCTYPE html>
      <?php
      include("./fabricaConecao.php");
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
        <div id="corpoInteiro">
            <div id="cabecalio">
                <a href="PaginaInicial.php"><img id="utfpr" src="Imagens/utfpr.png"/></a>
                <a href="paginaLogin.php"><img id="iimgLogin" src="Imagens/BTlogin.png"/></a>
                
            </div>

            <div id="ladoEsquerdo">
                <nav class="menu">
                    <ul id="nav">
                    <li>Laboratorios</li>

                    <?php
                    $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                //$tbl = mysqli_fetch_all($result,MYSQLI_BOTH))
                {
      $Nom = $tbl["nome"];
      $Codigo = $tbl["id_Laboratorio"];

    ?>
                        <li><?php echo "$Nom"; ?>
                        <ul>
                            <?php echo "<li><a href=paginaEspecificacoes.php?buscacodigo=$Codigo> Ver Especificações </li>";?>
                            <?php echo"<li><a href=paginaTurno.php?buscacodigo=$Codigo> Ver Disponibilidade </a>";?>
                        </ul></li>
                <?php  }   ?>
                </nav>
            </div>
            <div id="ladoDireito1">
  <?php
        #Exibe os resultados de novidades e noticias
    $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                //$tbl = mysqli_fetch_all($result,MYSQLI_BOTH))
                {
    
            $Codigo = $tbl["id_Laboratorio"];
            $Desc = $tbl["descricao"];
            $Nom = $tbl["nome"];
            $numTotal = $tbl["num_maq_nor"];
            $numAtual = $tbl["num_maq_ope"];
                ?>
                 
  
            
            
         <?php         echo "<a href=paginaEspecificacoes.php?buscacodigo=$Codigo&n=$n>";
 
         echo '<div id="lab201">';
                    
         echo "Laboratorio $Nom";?><center>numero de maquinas</center><?php echo "$Desc" ?><center><?php echo "$numAtual / $numTotal "; ?></center>  
                </div>
        <?php echo"</a>"
?>
              <?php
                }
    if( !$result ){
    echo mysqli_error($link);
               }
               ?>
            </div>

        </div>
   <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: Renan Lamonato && Ricardo de Souza</p>
 <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
                </footer>
    </body>
</html>
