
<html>
    <head>
        <title>Systen Lab</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/estilo.css"/>
        <script language="javascript" src="../JavaScript/funcoes.js"></script>
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
            $tit = isset($_POST["v1"])?$_POST["v1"]:"erro"; 
//            $datainicio = isset($_POST["DInicio"])?$_POST["DInicio"]:"erro"; 
            $datafim = isset($_POST["DFim"])?$_POST["DFim"]:"erro"; 
            $v3 = isset($_POST["v3"])?$_POST["v3"]:"erro";
            $v2 = isset($_POST["v2"])?$_POST["v2"]:"erro";
            $lab = isset($_POST["lab"])?$_POST["lab"]:"erro"; 
            if($tit != NULL){
                             
            $hfim = explode(" ",$v3);
            $hInic = explode(" ",$v2);
            
            if($hInic[1] == "Jan"){
                $s1 = 1;
            }
            if($hInic[1] == "Feb"){+
                $s1 = 2;
            }
            if($hInic[1] == "Mar"){
                $s1 = 3;
            }
            if($hInic[1] == "Apr"){
                $s1 = 4;
            }
            if($hInic[1] == "May"){
                $s1 = 5;
            }
            if($hInic[1] == "Jun"){
                $s1 = 6;
            }
            if($hInic[1] == "Jul"){
                $s1 = 7;
            }
            if($hInic[1] == "Aug"){
                $s1 = 8;
            }
            if($hInic[1] == "Sep"){
                $s1 = 9;
            }
            if($hInic[1] =="Oct"){
                $s1 = 10;
            }
            if($hInic[1] == "Nov "){
                $s1 = 11;
            }
            if($hInic[1] == "Dec"){
                $s1 = 12;
            }
            $s2 = "$hInic[3]-$s1-$hInic[2]";
            
            
    #cria a expressão sql de inserção
    $sql = "INSERT INTO Reserva(cod_lab,hora_inic,hora_fim,inic_res,fim_res,nomeReserva)VALUES('".$lab."','".$hInic[4]."', '".$hfim[4]."','".$s2."','".$datafim."','".$tit."')";
    #executa a expressão SQL no servvidor, armazena o resultado
    $result =mysqli_real_query($link, $sql);
    
    
    #verefica o sucesso da operação
    if(!$result)
    {die('erro aqui: '.mysql_error());}
    #se a operação for realizada com sucesso
    else
        {        echo "<br><h1>!!! sucesso !!! <h1>";
                
        }
            }else {
                 echo "<h1> esta faltando informaçoes para realizar a reserva </h1>"; 
            }
//echo "os valores mandados foram $liv e $aut e $edit";
?>

<br>               <?php echo "<a href=../paginaHorarios.php?buscacodigo=$lab>";?>
<img src="../Imagens/nova.png"/></a><br><br><br>
<a href="../paginaInicial.php"><img src="../Imagens/sair.png"/></a>
    

   </div>
                   <footer id="rodape">
                       <a href="../paginaInicial.php"><img id="utfpr_rodape" src="../Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
  <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
               </footer>
    </body>
</html>