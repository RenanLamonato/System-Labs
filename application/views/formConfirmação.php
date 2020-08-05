<div id="painel2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
   <!--         <form id="formGrupo" method="POST" action="<?=base_url('solicitacao/' . (isset($grupo) ? 'editar' : 'cadastrar'))?>"-->
                <input type="hidden" name="res_id" id="res_id" <?=isset($reserva) ? "value=\"$reserva->res_id\"":""?>>
                <input type="hidden" name="lab_id" id="lab_id" <?=isset($reserva) ? "value=\"$reserva->lab_id\"":""?>>
                <div class="modal-header">                      
                    <h4 class="modal-title">Solicitação de reserva de laboratório</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                    
                    <div class="alert alert-dark" role="alert">
                        <input type="text" id="res_horario" name="res_horario" readonly class="form-control-plaintext">
                    </div>
                    <div class="form-group">
                        <label>Resultado</label>
                        <input type="radio" id= "aceitar" name="aceitar" class="form-control">
                        <input type="radio" id= "negar" name="negar" class="form-control">
                        
                    </div>
                    

                    <div id="alertas"></div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                    <input type="submit" class="btn btn-success" value="confirmar">
                </div>
       <!--     </form> -->
        </div>
    </div>
</div>