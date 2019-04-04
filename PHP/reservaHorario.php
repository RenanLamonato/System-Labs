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
            $nReserva = isset($_POST["assunto"])?$_POST["assunto"]:"error"; 
            $fim = isset($_POST["inicioF"])?$_POST["inicioF"]:"error"; 
            $inic = isset($_POST["inicioR"])?$_POST["inicioR"]:"error";
            $n = isset($_GET["n"])?$_GET["n"]:"error";            
            $cod = isset($_POST["area"])?$_POST["area"]:"erro";
            $labs = isset($_GET["buscacodigo"])?$_GET["buscacodigo"]:"error"; 
            $tur = isset($_GET["turno"])?$_GET["turno"]:"error"; 
    #cria a expressão sql de inserção
   
    #$sql = "INSERT INTO Reserva(nomeReserva,cod_lab,inic_res,fim_res,estado,periodo)VALUES('".$nReserva."','".$labs."', '".$inic."', '".$fim."', '".$cod."', '".$tur."')";
            
   $sql = "UPDATE Reserva SET nomeReserva ='".$nReserva."', cod_lab='".$labs."', estado='".$cod."', fim_res='".$fim."', inic_res='".$inic."', periodo ='".$tur."' WHERE id_Reserva =".$cod."";
    #executa a expressão SQL no servvidor, armazena o resultado
    $result =mysqli_real_query($link, $sql);
        
    
    #verefica o sucesso da operação
    if(!$result)
        
    {     echo"$nReserva e $fim e $inic e $n e $cod e $labs";
        die('erro aqui: '.mysql_error());}
    #se a operação for realizada com sucesso
    else
        {        echo "<br>A operação foi realizadada com sucesso $nReserva e $fim e $inic e $n e $cod e $labs;";}
//echo "os valores mandados foram $liv e $aut e $edit";
?>

<br><?php echo"<a href=../paginaHorarios.php?buscacodigo=$labs&Horario=$tur&n=$n";?>>Clique aqui para Reservar outro horario</a>
<br><a href="mostrarDadosBancoSoftware.php">Clique aqui para mostrar os valores em registro</a>
    
      </div>
                   <footer id="rodape">
                <a href="PaginaInicial.php"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
  <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
               </footer>
    </body>
</html>