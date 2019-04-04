
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
<?php

$result = mysqli_query($link, $sql);
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
                <form>
                    <center>
                  <table border=1>
        <tr>
            <td>Lab.</td>
            <td>Nome</td>
            <td>Data de inicio</td>
            <td>Data final</td>
            <td>Horario inicial</td>
            <td>Horario final</td>
        </tr>
        <?php
        $sql = "SELECT * FROM Reserva order by cod_lab";
        #Exibe os resultados de novidades e noticias
    $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                //$tbl = mysqli_fetch_all($result,MYSQLI_BOTH))
                {
            $iniRes = $tbl["inic_res"];
            $fimRes = $tbl["fim_res"];
            $horInic = $tbl["hora_inic"];
            $horFim = $tbl["hora_fim"];
            $codlab = $tbl["cod_lab"];
            $nomRes = $tbl["nomeReserva"];
            $Codigo = $tbl["id_Reserva"];


        echo"<tr>";
        echo "<td>$codlab";
        echo "<a href=PHP/deletarReserva.php?buscacodigo=$Codigo>";
//        echo "<a href =inserirHTML.php?buscacodigo=$Codigo&buscalivro=$Livro&buscaAutor=$Autor&buscaEditora=$Editora>";
        echo "(deletar)</a></TD>";
        echo "<td>$nomRes</td>";
        echo "<td>$iniRes</td>";
        echo "<td>$fimRes</td>";
        echo "<td>$horInic</td>";
        echo "<td>$horFim</td>";
        echo "</tr>";

                }
    if( !$result ){
    echo mysqli_error($link);
               }
               ?>
        
    </table>
                    </center>
    <br><a href="paginaAdmControle.php">Clique aqui para voltar</a>
    </form>    
            </div>
                   <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
  <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
               </footer>
    </body>
</html>


