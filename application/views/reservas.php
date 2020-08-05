<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Reservas</title>

    <link href="<?=base_url("assets/css/calendar.css")?>" rel="stylesheet">
    <link href="<?=base_url("assets/css/default.css")?>" rel="stylesheet">

    <link href="<?=base_url("assets/fullCalendar/core/main.css")?>" rel='stylesheet' />
    <link href="<?=base_url("assets/fullCalendar/daygrid/main.css")?>" rel='stylesheet' />
    <link href="<?=base_url("assets/fullCalendar/timegrid/main.css")?>" rel='stylesheet' />
    <link href="<?=base_url("assets/fullCalendar/list/main.css")?>" rel='stylesheet' />        
</head>

<body>
    <input type="hidden" id="url_cadastro" value="<?=base_url("solicitacao/cadastro")?>">
    <input type="hidden" id="url_solicitacao" value="<?=base_url("solicitacao/cadastro")?>">

    <main>
        <div id="wrap">
            <div id='external-events'>
                <h4>Laboratórios</h4>

                <div id='external-events-list'>
                    <div class="form-group">
                        <!--label>Grupo</label-->
                        <select class="form-control" id="lab_id" required>
                          <option disabled <?=isset($laboratorios)?'':'selected'?>>Selecione</option>
                          <?php foreach($laboratorios  as $i => $lab): ?>
                            <option value="<?= $lab->lab_id?>">
                              <?= $lab->lab_identificacao?>
                            </option>
                          <?php endforeach ?>
                        </select>
                     </div>
                </div>

                <!--p>
                    <input type='checkbox' id='drop-remove' />
                    <label for='drop-remove'>remove after drop</label>
                </p-->
            </div>
            
            <a id="id" class="btn btn-secondary" href="<?=base_url("solicitacao/pgAdmin")?>">adm</a>
        
            <div id="calendar"></div>
            
            <div style="clear:both"></div>
        </div>

        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

    </main>

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