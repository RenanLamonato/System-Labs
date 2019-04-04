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
            $nomeS = isset($_POST["opProfessor"])?$_POST["opProfessor"]:"Nome do professor não informada"; 
            $disc = isset($_POST["opDisciplina"])?$_POST["opDisciplina"]:"Materia não informada"; 
            echo "os valores mandados foram $nomeS e $disc";

    #cria a expressão sql de atualizacao
      $sql = "UPDATE Disciplina SET idProf ='".$nomeS."' WHERE id_Disciplina =".$disc."";

    #executa a expressão SQL no servvidor, armazena o resultado
    $result =mysqli_real_query($link, $sql);
    

    #verefica o sucesso da operação
    if(!$result)
    {die('erro aqui: '.mysql_error());}
    #se a operação for realizada com sucesso
    else
        {        echo "<br>A operação foi realizadada com sucesso.";}
echo "os valores mandados foram $nomeS e $disc";
?>
<br><a href="../paginaProfMateria.php">Clique aqui para inserir um novo registro</a>

    
      </div>
                   <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
  <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
               </footer>
    </body>
</html>