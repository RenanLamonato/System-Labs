<div id="painel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formGrupo" method="POST" action="<?=base_url('solicitacao/' . (isset($grupo) ? 'editar' : 'cadastrar'))?>">
                <input type="hidden" name="res_id" id="res_id" <?=isset($reserva) ? "value=\"$reserva->res_id\"":""?>>
                <input type="hidden" name="lab_id" id="lab_id" <?=isset($reserva) ? "value=\"$reserva->lab_id\"":""?>>
                <div class="modal-header">                      
                    <h4 class="modal-title">Solicitação de reserva de laboratório</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <div class="alert alert-dark" role="alert">
                        <small id="res_lab" class="form-text text-muted">
                            Esta informação será usada para a comunicação da sua solicitação de reserva.
                        </small>
                        <input type="text" id="res_horario" name="res_horario" readonly class="form-control-plaintext">
                    </div>
                    <div class="form-group">
                        <label>Solicitante</label>
                        <input type="text" id="sol_nome" name="sol_nome" class="form-control" <?=isset($reserva) ? "value=\"$reserva->res_solicitante\"":""?> placeholder="Informe aqui seu nome para a solicitação" required>
                    </div>
                    <div class="form-group">
                        <label>Identificação Institucional</label>
                        <input type="text" id="sol_identificacao" name="sol_identificacao" class="form-control" <?=isset($reserva) ? "value=\"$reserva->res_identificacao\"":""?> placeholder="Informe aqui seu SIAPE ou RA para a solicitação" required>
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input type="email" id="sol_email" name="sol_email" class="form-control" <?=isset($reserva) ? "value=\"$reserva->res_mail\"":""?> placeholder="Informe aqui seu e-mail para a solicitação" required>
                        <small id="res_mail" class="form-text text-muted">
                            Esta informação será usada para a comunicação da sua solicitação de reserva.
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control" id="res_descricao" name="res_descricao" placeholder="Descrição da solicitação de reserva" required><?=isset($reserva) ? $reserva->res_descricao : ""?></textarea>
                        <small id="res_mail" class="form-text text-muted">
                            Exemplos: nome e código da disciplina, nome e número de processo SEI caso seja curso, título do curso/palestra/seminário quando algo isolado ou de semana acadêmica.
                        </small>
                    </div>
                    <div id="alertas"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="Solicitar">
                </div>
            </form>
        </div>
    </div>
</div>