<?php
      include("./fabricaConecao.php");

      $sql = "SELECT * FROM Professor";

$NomeProfessor = isset($_POST["login"])?$_POST["login"]:"Nome do Professor não informado";
$SenhaUsuario = isset($_POST["senha"])?$_POST["senha"]:"senha não informado"; 
            

  $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                {
      $Nom = $tbl["nome_professor"];
      $Senha = $tbl["senha_professor"];
                
      if($Nom == $NomeProfessor && $Senha == $SenhaUsuario){
     
          
header('Location: paginaReserva.php');
      

      } else {
      
}
      
                }
        
            ?>
       
                
                 