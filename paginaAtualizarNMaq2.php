
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
                
                
                

<?php
    $servidor = 'localhost';
    $banco = 'systenlab';
    $usuario = 'root';
    $senha = 'fragataC-110';
    
    $link = mysqli_connect($servidor, $usuario, $senha, $banco);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$buscacod = isset($_GET["buscacodigo"])?$_GET["buscacodigo"]:"não informado";

$sql = "SELECT * FROM Laboratorio WHERE id_Laboratorio =".$buscacod."";
?>

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
            $nomeS = $tbl["nome"];
            $nmo = $tbl["num_maq_ope"];
            $nmn = $tbl["num_maq_nor"];

                }
    if( !$result ){
    echo mysqli_error($link);
               }
               ?>



<!--
    
//<?php
//$buscacod = isset($_GET["buscacodigo"])?$_GET["buscacodigo"]:"não informado";
//$buscalivro = isset($_GET["buscalivro"])?$_GET["buscalivro"]:"não informado";
//$buscaAutor = isset($_GET["buscaAutor"])?$_GET["buscaAutor"]:"não informado";
//$buscaEditora = isset($_GET["buscaEditora"])?$_GET["buscaEditora"]:"não informado";
//?>-->
        atualize os campos abaixo:
      </form>
                </nav>
            </div>            
            <div id="ladoDireito">
            
                <form method="POST" action="PHP/PaginaNMaquinas.php?">
            <table>
                <tr>
                    <td>Laboratorio:<?php echo"$nomeS" ?></td>
                    
                </tr>
                <tr>
                    <td>Numero De Maquinas Operantes:</td>
                    <td>
                        <input name="FormnNMO" maxlength="10" value="<?php echo"$nmo" ?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero De Maquinas totais:</td>
                    <td>
                        <input name="FormNMN" maxlength="100" size="50" value="<?php echo"$nmn" ?>">
                    </td>
                </tr>
                <input type="hidden" name="buscacodigo" value="<?php echo"$Codigo" ?>">
                <tr>
                <td colspan="2" align="right">
                    <input type="submit" value="Cadastrar">
                </td>
                </tr>
                
            </table>
            
            
        </form>
            
            
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
