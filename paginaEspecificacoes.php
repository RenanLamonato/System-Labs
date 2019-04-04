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
        <div id="corpoInteiro">
            <div id="cabecalio">
                <a href="paginaInicial.php"><img id="utfpr" src="Imagens/utfpr.png"/></a>
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
                            <?php echo "<li><a href=paginaEspecificacoes.php?buscacodigo=$Codigo> Ver Especificações </li>";?>
                            <?php echo"<li><a href=paginaTurno.php?buscacodigo=$Codigo> Ver Disponibilidade </a>";?>
                         </ul></li>
                <?php
                if($lab == $Codigo)
      $aux = $Nom;
                }   ?>
              </ul>
                  </nav>
            </div>
            <center><h1><?php
      echo "Laboratorio ".$aux."";?> </h1></center>           
            <div id="ladoDireito">
                <div id="hardware">
                    <P>DEFINICOES HARDWARE</p>
                    <table>
                        <tr><td class="e">Nome</td> <td class="e"> Versão </td><td class="e">Descrição</td> </tr>
     
                         <?php
                      
                      
                    $sql="SELECT *
FROM Hardware
INNER JOIN hwLab ON Hardware.id_Hardware = hwLab.id_hard WHERE hwLab.id_lab = $lab;";
                 
                            $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                {
            $Nome_hard = $tbl["nome_Hardware"];
      $descricao_hard = $tbl["descricao"];
      $vercao_hard = $tbl["Versao"];
              
                      ?>
                        
                        
                        <tr><td class="c_1"><?php echo "$Nome_hard";?></td> <td class="c_2"> <?php echo "$vercao_hard"; ?> </td><td class="c_1"><?php echo "$descricao_hard"; ?></td> </tr>
                <?php } ?> 
                    </table>                 
                </div>
                <div id="software">
                    <P>DEFINICOES SOFTWARE</p>
                    <table>
                        <tr><td class="e">Nome</td> <td class="e"> Versão </td><td class="e">Descrição</td> </tr>
                     <?php
                          $sql="SELECT *
FROM Software
INNER JOIN swLab ON Software.id_Software = swLab.id_soft WHERE swLab.id_lab = $lab;";
                 
                            $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                {
            $Nome_soft = $tbl["nome_Software"];
      $descricao_soft = $tbl["descricao"];
      $vercao_soft = $tbl["Versao"];
              
                     
                     
                     ?>
                        <tr><td class="c_1"><?php echo "$Nome_soft"; ?></td> <td class="c_2"><?php echo "$vercao_soft"; ?></td><td class="c_1"><?php echo "$descricao_soft"; ?></td> </tr>
                    <?php } ?>
                    </table>                 
                </div>
                <?php echo"<a href=paginaHorarios.php?buscacodigo=$lab&n=$n>";?>
                <img src="Imagens/BTagendamento.png"><?php echo"</a>";?>
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