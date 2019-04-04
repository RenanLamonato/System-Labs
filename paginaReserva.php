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
                <a href="PaginaInicial.php"><img id="utfpr" src="Imagens/utfpr.png"/></a>
                <a href="paginaLogin.php"><img id="iimgLogin" src="Imagens/BTlogin.png"/></a>
                
            </div>

            <div id="ladoEsquerdo">
                <nav class="menu">
                    <ul id="nav">
                        <a href="paginaLaboratorios.php"> <li>Laboratorios</li></a>

                                        <?php  $result = mysqli_query($link, $sql);
    if( !$result ){
    echo mysqli_error($link);
    }
        while ($tbl = mysqli_fetch_array($result))
                //$tbl = mysqli_fetch_all($result,MYSQLI_BOTH))
                {
      $Nom = $tbl["nome"];
      $Codigo = $tbl["id_Laboratorio"];

    ?>
                        <li><?php echo "$Nom"; ?>
                        <ul>
                            <li><?php echo "<a href=paginaEspecificacoes.php?buscacodigo=$Codigo&n=$n> Ver Especificações </li>";?>
                            <li><?php echo"<a href=paginaHorarios.php?buscacodigo=$Codigo&n=$n> Ver Disponibilidade </a>";?>
                        </ul></li>
                <?php  }   ?>
                    </ul>
                  </nav>
           
            </div>
            
            <div id="ladoDireito">
                
                <h1>Agendamento</h1>
                
                <form id="Agens">
                    <fieldset id="dias"><legend>Dias da Semana</legend>
                    <table id="tabeDias">
                        <!-- <caption>Dias da Semana</caption> -->

                    <tr>
                        <td class="col"><label for="cSegunda">Segunda</label><input type="checkbox" name="tSegunda" id="cSegunda"/></td>
                        <td class="col"><label for="cTerca">Terça</label><input type="checkbox" name="tTerca" id="cTerca"/></td>
                        <td class="col"><label for="cQuarta">Quarta</label><input type="checkbox" name="tQuarta" id="cQuarta"/></td>
                        <td class="col"><label for="cQuinta">Quinta</label><input type="checkbox" name="tQuinta" id="cQuinta"/></td>
                        <td class="col"><label for="cSexta">Sexta</label><input type="checkbox" name="tSexta" id="cSexta"/></td>
                        <td class="col"><label for="cSabado">Sabado </label><input type="checkbox" name="tSabado" id="cSabado"/></td>                            
                    </tr>
                    </table>
                </fieldset>
                    <fieldset id="datas"><legend>Data de inicio e fim da reserva</legend>
                        <p>Inicio:<input id="DInicio" type="date">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fim:<input id="cDFim" type="date" ></p>
                        
                    </fieldset>
                    
                    <fieldset id="horario">
                        <legend>Horario:</legend>
                        <p><label for="cIncio">Inicio:&nbsp;&nbsp;</label><select name="tInicio" id="cInicio">
                                <optgroup label="Manhã">
                                <option value="m">07:30</option>
                                <option>08:20</option>
                                <option>09:10</option>
                                <option>10:20</option>
                                <option>11:10</option>
                                <option>12:00</option>
                                </optgroup>
                                  <optgroup label="Tarde">
                                <option>13:00</option>
                                <option>13:50</option>
                                <option>14:40</option>
                                <option>15:50</option>
                                <option>16:40</option>
                                <option>15:30</option>
                                </optgroup>
                                <optgroup label="Noite">
                                <option>18:40</option>
                                <option>19:30</option>
                                <option>20:20</option>
                                <option>21:20</option>
                                <option>22:10</option>
                                </optgroup>
                            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="cFim">Fim:&nbsp;&nbsp;</label><select name="tFim" id="cFim" >
                                <optgroup label="Manhã">
                                <option>08:20</option>
                                <option>09:10</option>
                                <option>10:20</option>
                                <option>11:10</option>
                                <option>12:00</option>
                                </optgroup>
                                  <optgroup label="Tarde">
                                <option>13:00</option>
                                <option>13:50</option>
                                <option>14:40</option>
                                <option>15:50</option>
                                <option>16:40</option>
                                <option>15:30</option>
                                </optgroup>
                                <optgroup label="Noite">
                                <option>18:40</option>
                                <option>19:30</option>
                                <option>20:20</option>
                                <option>21:20</option>
                                <option>22:10</option>
                                <option>23:00</option>
                                </optgroup>
                            </select>
                        
                        </p>
                    </fieldset>
                    <br><br><br>
                    <center>  <img src="Imagens/BTagenadar.png" name="tAgendar" id="cAgendar"></center>
                    
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
