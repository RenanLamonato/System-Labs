<html>
    <head>
        <title>Systen Lab</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/estilo.css"/>
  
    </head>
    <body>
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

$sql = "SELECT * FROM Hardware WHERE id_Hardware =".$buscacod."";
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
    
            $Codigo = $tbl["id_Hardware"];
            $nomeS = $tbl["nome_Hardware"];
            $ver = $tbl["Versao"];
            $des = $tbl["descricao"];

                }
    if( !$result ){
    echo mysqli_error($link);
               }
               ?>




<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerenciando registros</title>
    </head>
    <body>
        atualize os campos abaixo:
     
            <div id="ladoDireito">
            
                <form method="POST" action="atualizarHardware.php?">
            <table>
                <tr>
                    <td>Nome do Software:</td>
                    <td>
                        <input name="FormNomeHardware" maxlength="100" value="<?php echo"$nomeS" ?>">
                    </td>
                </tr>
                <tr>
                    <td>versão:</td>
                    <td>
                        <input name="FormVersao" maxlength="50" value="<?php echo"$ver" ?>">
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
