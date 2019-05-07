<div id="painel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">                      
                <h4 class="modal-title">Dados da reserva de laboratório</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">                    
                <dl class="dl-horizontal">
                    <dt>Solicitante</dt>
                    <dd><?=$reserva->sol_nome?></dd>

                    <dt>Data / Horário</dt>
                    <dd><?=$reserva->res_data . ' das ' . $reserva->res_horai . ' às ' . $reserva->res_horaf?></dd>
                    
                    <dt>Descrição</dt>
                    <dd><?=$reserva->res_descricao?></dd>
                    
                    <dt>Laboratório</dt>
                    <dd><?=$reserva->lab_identificacao?></dd>
                    
                    <dt>Situação</dt>
                    <dd><?=$reserva->res_situacao?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>