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

$sql = "SELECT * FROM Software WHERE id_Software =".$buscacod."";
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
    
            $Codigo = $tbl["id_Software"];
            $nomeS = $tbl["nome_Software"];
            $ver = $tbl["Versao"];
            $des = $tbl["descricao"];

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
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerenciando registros</title>
    </head>
    <body>
        atualize os campos abaixo:
                </nav>

</div>            

<div id="ladoDireito">
            
                <form method="POST" action="atualizar.php?">
            <table>
                <tr>
                    <td>Nome do Software:</td>
                    <td>
                        <input name="FormNomeSoftware" maxlength="100" value="<?php echo"$nomeS" ?>">
                    </td>
                </tr>
                <tr>
                    <td>versão:</td>
                    <td>
                        <input name="FormVersao" maxlength="10" value="<?php echo"$ver" ?>">
                    </td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>
                        <input name="FormDescricao" maxlength="100" size="50" value="<?php echo"$des" ?>">
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