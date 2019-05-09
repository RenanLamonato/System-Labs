<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitacao extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
        header('Access-Control-Allow-Methods: GET');
        
        $this->load->model("ReservasModel");
    }

    public function index(){
        $this->load->model("LaboratoriosModel");
        $lstLabs = $this->LaboratoriosModel->buscarTodosLaboratorios();
        $dados = array("laboratorios" => $lstLabs);

        $this->load->view('reservas', $dados);
    }

    public function cadastro($resId = null){
        if(is_null($resId)){//é solicitação de reserva
            $dados = array(
                'action'   => 'Reservas/Solicitacao'
            );
            $this->load->view('formReserva', $dados);
        }else{//carregamento/visualização da reserva
            $reserva = $this->ReservasModel->buscarReservaPorId($resId);
            $dados = array('reserva' => $reserva[0]);
            $this->load->view('telaReserva', $dados);
        }
    }

    private function validarFormulario(){
        $regras = array(
            array(
                'field' => 'res_horario',
                'label' => 'Horário',
                'rules' => 'callback_validar_horario'
            ),
            array(
                'field' => 'sol_nome',
                'label' => 'Solicitante',
                'rules' => 'required'
            ),
            array(
                'field' => 'sol_identificacao',
                'label' => 'Identificação',
                'rules' => 'min_length[6]'
            ),
            array(
                'field' => 'sol_email',
                'label' => 'E-Mail',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'res_descricao', 
                'label' => 'Descrição', 
                'rules' => 'required|min_length[14]'
            )
        );

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules($regras);

        if($this->form_validation->run() == FALSE){
            $erros = array('erros' => validation_errors());
            echo JSON_encode($erros);
            return FALSE;
        }
        return TRUE;
    }

    public function validar_horario(){
        date_default_timezone_set('America/Sao_Paulo');
        $horaI = substr($this->input->post('res_horario'), 15, 5);
        $horaF = substr($this->input->post('res_horario'), 25, 5);

        $dataAtual = strtotime(Date('Y-m-d H:i:s'));

        $dataReserva = str_replace("/", "-", substr($this->input->post('res_horario'), 0, 10));
        $dataReserva = substr($dataReserva, 6, 4) . '-' . substr($dataReserva, 3, 2) . '-' . substr($dataReserva, 0, 2);

        $dataHoraReservaI = $dataReserva . ' ' . $horaI . ':00';
        $dataHoraReservaF = $dataReserva . ' ' . $horaF . ':00';

        $dataHoraReservaI = strToTime($dataHoraReservaI);
        $dataHoraReservaF = strToTime($dataHoraReservaF);

        if($dataHoraReservaI > $dataHoraReservaF || $dataHoraReservaI < $dataAtual || $dataHoraReservaF < $dataAtual){
            $this->form_validation->set_message('validar_horario', 'Verifique a data de agendamento, ela deve ser futura.');
            return FALSE;
        }
        return TRUE;
    }

    public function cadastrar(){
        $solId = 0;
        if($this->validarFormulario() == TRUE){
            if($this->session->userdata('usuario')){
                $solId = $this->session->userdata('usuario');
            }else{//cadastro os dados do usuário
                $dados = $this->input->post(); //solicitante
                unset($dados['res_id']);
                unset($dados['lab_id']);
                unset($dados['res_horario']);
                unset($dados['res_descricao']);
                $this->load->model('SolicitantesModel');
                $solId = $this->SolicitantesModel->inserir($dados);
                $sDados = array(
                    'nome' => $dados['sol_nome'],
                    'email'=> $dados['sol_email'],
                    'usuario' => $solId
                );
                $this->session->set_userdata($sDados);
            }

            $dados = $this->input->post(); //reserva
            $dataReserva = str_replace("/", "-", substr($this->input->post('res_horario'), 0, 10));
            $dataReserva = substr($dataReserva, 6, 4) . '-' . substr($dataReserva, 3, 2) . '-' . substr($dataReserva, 0, 2);
            $dados['res_data'] = $dataReserva;

            $dados['res_horai'] = substr($this->input->post('res_horario'), 15, 5);
            $dados['res_horaf'] = substr($this->input->post('res_horario'), 25, 5);

            $dados['res_situacao'] = 'análise';
            $dados['sol_id'] = $solId;

            unset($dados['sol_nome']);
            unset($dados['sol_identificacao']);
            unset($dados['sol_email']);
            unset($dados['res_horario']);
            if($this->ReservasModel->inserir($dados)){
                echo(TRUE);
                return TRUE;
            }else{
                $erros = array('erros' => '<div class="error">Não foi possível salvar os dados.</div>');
                echo JSON_encode($erros);
                return FALSE;
            }
            /*echo('<pre>');
            var_dump($dados);
            echo('</pre>');*/
        }
        return FALSE;
    }

    public function eventos($labId = null){
        if(is_null($labId)){
            return FALSE;
        }else{
            $lstReservas = $this->ReservasModel->buscarReservasLaboratorio($labId);
            echo(JSON_encode($lstReservas));
            return TRUE;
        }
    }

}
