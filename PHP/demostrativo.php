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
$sql = "SELECT * FROM Software ORDER BY id_Software";
?>
<html>
    
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

        ?>
            
    <input type="checkbox" id="1" name="<?php echo "$Codigo"; ?>" onclick="verificarCheckBox()" value="<?php echo"$nomeS"?>"><?php echo"$nomeS"?>
                
                 
               <?php }
    if( !$result ){
    echo mysqli_error($link);
               }
               ?>
        

    </form>
      </div>
                  
    </body>
</html>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head><script>
	function chamaFuncao(NOME){
		if(NOME == '<?php echo "$Codigo";?>'){//SE FOR IGUAL A CPF NOME E FONE
			document.getElementById("campo").innerHTML=""; //APAGA O CONTEUDO DA DIV
			$('#campo').append('CPF:<input type="text" name="cpf" id="cpf" /><br>Nome:<input type="text" name="nome" id="nome" /><br>Fone:<input type="text" name="fone" id="fone" />');// ADICIONA OS ELEMENTOS NA DIV
		}
		else if(NOME == 'cnpj_ie_razao'){//SE FOR IGUAL A CNPJ IE E RAZÃO
			document.getElementById("campo").innerHTML=""; //APAGA O CONTEUDO DA DIV
			$('#campo').append('CNPJ:<input type="text" name="cnpj" id="cnpj" /><br>IE:<input type="text" name="IE" id="IE" /><br>RAZÃO:<input type="text" name="razao" id="razao" />');// ADICIONA OS ELEMENTOS NA DIV
		}
		else if(NOME == 'id_nome'){//SE FOR IGUAL A ID E NOME
			document.getElementById("campo").innerHTML=""; //APAGA O CONTEUDO DA DIV
			$('#campo').append('ID:<input type="text" name="ID" id="ID" /><br>NOTA:<input type="text" name="NOTA" id="NOTA" />');// ADICIONA OS ELEMENTOS NA DIV
		}else{//SE NÃO FOR IGUAL A NENHUM DE CIMA
			document.getElementById("campo").innerHTML=""; //APAGA O CONTEUDO DA DIV
			$('#campo').append('MATRICULA:<input type="text" name="MATRICULA" id="MATRICULA" />');// ADICIONA OS ELEMENTOS NA DIV
		}
	}
</script>
<body>
<select name="paginas" onchange="javascript: chamaFuncao(this.value)">
<option selected="selected" disabled="disabled">Selecione..</option>
<option value="cpf_nome_fone">CPF, NOME E FONE</option>
<option value="cnpj_ie_razao">CNPJ, IE E RAÇÃO</option>
<option value="id_nome">ID E NOTA</option>
<option value="matricula">MATRICULA</option>
</select>
<div id="campo">
</div>
</body>
</html>