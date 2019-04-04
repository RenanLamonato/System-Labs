<?php 

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

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
$select = mysql_select_db("$banco") or die("Sem acesso ao DB");

$result = mysql_query("SELECT * FROM professor 
WHERE nome_professor = '$login' AND senha_professor`= '$senha'");

if(mysql_num_rows ($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:paginaInicial.php');
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:paginaReserva.php');
   
}