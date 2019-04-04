<html>
    <head>
        <title>Systen Lab</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/estilo.css"/>
  
    </head>
    <body>
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
$sql = "SELECT * FROM Hardware ORDER BY id_Hardware";
?>
<html>
    
      <table border=1>
        <tr>
            <td>Cód.</td>
            <td>Nome</td>
            <td>Versão</td>
            <td>Descrição</td>
        </tr>
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
        echo"<tr>";
        echo "<td>$Codigo";
        echo "<a href=PaginaAtualizarHardware.php?buscacodigo=$Codigo>";
//        echo "<a href =inserirHTML.php?buscacodigo=$Codigo&buscalivro=$Livro&buscaAutor=$Autor&buscaEditora=$Editora>";
        echo "(editar)</a></TD>";
        echo "<td>$nomeS</td>";
        echo "<td>$ver</td>";
        echo "<td>$des</td>";
        echo "</tr>";

                }
    if( !$result ){
    echo mysqli_error($link);
               }
               ?>
        
    </table>

    <br><a href="../paginaAddHardware.php">Clique aqui para inserir um novo registro</a>
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
