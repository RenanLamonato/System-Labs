<!DOCTYPE html>
      <?php
      include("./fabricaConecao.php");
      ?>
<html>
    <head>
        <title>Systen Lab</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css"/> 
    </head>
    <body>
        <div id="corpoInteiro">
            <div id="cabecalio">
                <a href="#"><img id="utfpr" src="Imagens/utfpr.png"/></a>
                
            </div>

            <div id="ladoEsquerdo">
  
          
            </div>
                      
           
            </div>
            
            <div id="ladoDireito">
                
            <div id="login">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <fieldset><h2>Login</h2>
                     
                   <label for="i_Login"> Usuario</label><br><br><input type="text" name="login" id="i_Login" size="30" maxlength="30" placeholder="Seu Login"/>
                	 <br>
                         <br><label for="i_senha">Senha:</label><br><br><input type="password" name="senha" id="i_senha" size="30" maxlength="30" placeholder="Sua Senha" >  
                        <br>
                    </fieldset>
             
<input type="submit" value="LOGAR"/>
                </form>
                <br>
           
             
            </div>
    
                
            </div>

                   <footer id="rodape">
                <a href="#"><img id="utfpr_rodape" src="Imagens/utfpr.png"/></a>
                <p>Developed by: <i>Renan Lamonato && Ricardo de Souza</i></p>
   <p>Contact information: <a href="mailto:renanlamonato@utfpr.edu.br">
 renanlamonato@alunos.utfpr.edu.br</a>.</p>
              </footer>
    </body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
$NomeProfessor = isset($_POST["login"])?$_POST["login"]:"Nome do Professor não informado";
$SenhaUsuario = isset($_POST["senha"])?$_POST["senha"]:"senha não informado"; 
$sql = "SELECT * FROM Professor";
$result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                {
      $Nom = $tbl["nome_professor"];
      $Senha = $tbl["senha_professor"];
      $aces = $tbl["nivelAcesso"];
      $cod = $tbl["id_professor"];
                
      if(($Nom == $NomeProfessor && $Senha == $SenhaUsuario) &&( $aces == 1)){
     
          
header("Location: paginaInicial.php?n=$cod");
      }
      if(($Nom == $NomeProfessor && $Senha == $SenhaUsuario) &&( $aces == 2)){
          header("Location: paginaAdmControle.php?n=$cod");

      }                }
      }
?>
</html>