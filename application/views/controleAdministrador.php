<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php 

/*
echo("<pre>");
var_dump($reservas);
echo("</pre>");
*/?>

<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="shortcut icon" href="/favicon.ico" /> 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Adm</title>
  </head>
  <body>
    
    <div class="container">
  <div class="row">
    <div class="col-2">col-2
    
    
    
    
    </div>
    <div class="col-9">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Laboratorio</th>
      <th scope="col">Descricao</th>
      <th scope="col">Data</th>
      <th scope="col">Horario Inicio</th>
      <th scope="col">Horario Fim</th>
      <th scope="col">Estado </th>
      <th scope="col"> Ações </th>
    </tr>
  </thead>
  <tbody>
      
      
            <?php foreach ($reservas as $reserva => $re) : ?>
      
    <tr>
      <th scope="row"><?= $re->res_id ?></th>
      <td><?= $re->lab_id ?></td>
      <td><?= $re->res_descricao ?></td>
      <td><?= $re->res_data ?></td>
      <td><?= $re->res_horai ?></td>
      <td><?= $re->res_horaf ?></td>
      <td><?= $re->res_situacao ?></td>
      <td><button type="button" id ="<?= $re->res_id ?>" value="<?= $re->res_id ?>" class="btn btn-primary" data-toggle="modal" onclick="document.getElementById('idaux').value = this.id;" data-target="#escolha">Editar Estado </button></td>
      <td><button type="button" id ="<?= $re->res_id ?>" value="<?= $re->res_id ?>" class="btn btn-primary" data-toggle="modal" onclick="document.getElementById('idaux').value = this.id;" data-target="#delete">deletar Reserva </button></td>

    </tr>
    <?php endforeach ?>

      </tbody>
</table>  
<!-- Modal -->
            <form method="POST" action="<?=base_url('solicitacao/alterarEstado')?>">
<div class="modal fade" id="escolha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de Pedido</h5>        
      </div>
      <div class="modal-body">
      
     
     
        <div class="row">
            <div class="col-12"><center>
  
<div class="slidecontainer">
          Não <input type="range" min="0" max="100" value="50" step="50" class="slider" id="confRes" name="confRes">Sim
       <!--   <input id="idaux" nome="idaux" value="0">-->
          <input type="hidden" name="idaux" id="idaux" value="tes">

</div>
                    <div class="modal-footer">
        <div class="row">
            <div class="col">   
                    <input type="submit" name="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
    </div>
            </center></div>
        </div>
            
              
    
     </div>
    </div>
  </div>
</div>
     <!-- fim Modal -->   
           </form>
<!-- Modal deletar -->
            <form method="POST" action="<?=base_url('solicitacao/deletarReserva')?>">
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar</h5>        
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-12"><center>
<div class="slidecontainer">
 <!--         <input id="idaux" nome="idaux" value="0">-->
          Digite o valor do ID da reserva a ser deletada(coluna #):
          <input type="text" name="idaux" id="idaux" value="0">
</div>
                    <div class="modal-footer">
        <div class="row">
            <div class="col">   
                    <input type="submit" name="submit" class="btn btn-success" value="Deletar">
            </div>
        </div>
    </div>
            </center></div>
        </div>
     </div>
    </div>
  </div>
</div>
     <!-- fim Modal -->   
           </form>
        </div>
  </div>
</div>

      <style>
.slider {
  -webkit-appearance: none;
  width: 50%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%; 
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: waw;
  background: #4CAF50;
  cursor: pointer;
}
          
          
          
      </style>
    <script type="text/javascript" src="<?=base_url('assets/js/jquery-3.3.1.min.js')?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>

    <script src="<?=base_url("assets/fullCalendar/core/main.js")?>"></script>
    <script src="<?=base_url("assets/fullCalendar/core/locales-all.js")?>"></script>
    <script src="<?=base_url("assets/fullCalendar/interaction/main.js")?>"></script>
    <script src="<?=base_url("assets/fullCalendar/daygrid/main.js")?>"></script>
    <script src="<?=base_url("assets/fullCalendar/timegrid/main.js")?>"></script>
    <script src="<?=base_url("assets/fullCalendar/list/main.js")?>"></script>
    <script src="<?=base_url("assets/js/calendar.js")?>"></script>
  </body>
</html>