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
$select=mysqli_select_db($link, $senha);

#verefica se o arquivo foi chamado a partir de um formulario
            $ver = isset($_POST["FormnNMO"])?$_POST["FormnNMO"]:" não informado"; 
            $des = isset($_POST["FormNMN"])?$_POST["FormNMN"]:" não informada";
            $cod = isset($_POST["buscacodigo"])?$_POST["buscacodigo"]:"erro";

    #cria a expressão sql de inserção
    $sql = "UPDATE Laboratorio SET num_maq_ope='".$ver."', num_maq_nor='".$des."' WHERE id_Laboratorio =".$cod."";
    #executa a expressão SQL no servvidor, armazena o resultado
    $result =mysqli_real_query($link, $sql);
    
    
    #verefica o sucesso da operação
    if(!$result)
    {die('erro aqui: '.mysql_error());}
    #se a operação for realizada com sucesso
    else
        {        echo "<br>A operação foi realizadada com sucesso.";}
//echo "os valores mandados foram $liv e $aut e $edit";
?>
<br><a href="../paginaAdmControle.php">Clique aqui para Voltar ao Controle Central</a>
<br><a href="../paginaAtualizarNMaq.php">Clique aqui para mostrar os valores em registro</a>
    
      </div>
                   <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
  <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
               </footer>
    </body>
</html>