<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Fuel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user")) {
            redirect('sair');
        }

//        $this->load->library('table');
        $this->load->library('Restfull');
//        $this->load->library('PerfectTable');
    }

    public function index()
    {
        $this->load->library('Restfull');
        $endpoint = 'api/v1/admin/fuels';
        $metodo = 'GET';
        $params = '';
        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/fuel_table';
        $this->load->view('structure/container', $data);
    }


    public function new_user($id = null)
    {
        if ($this->input->post('salvar') and $id != null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/fuels/' . $id;
            $metodo = 'PATCH';
            $params = array(


                "title" => $this->input->post('title'),
                "measure" => $this->input->post('measure'),
                "money_atual" => substr(str_replace(",", ".", $this->input->post('money_atual')), 1),
                "debit_atual" => substr(str_replace(",", ".", $this->input->post('debit_atual')),1),
                "credit_atual" => substr(str_replace(",", ".", $this->input->post('credit_atual')),1),
                "credit_before" => substr(str_replace(",", ".", $this->input->post('credit_before')),1),
                "money_before" => substr(str_replace(",", ".", $this->input->post('money_before')),1),
                "debit_before" => substr(str_replace(",", ".", $this->input->post('debit_before')),1),
                "establishment_id" => $this->input->post('establishment_id'),

            );
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//            echo '<pre>';
//            print_r($response);
//            die;
            $data['response'] = $response ['response'];
            $data['message'] = $response ['response'];
        }
        if ($this->input->post('salvar') and $id == null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/fuels';
            $metodo = 'POST';
            $params = array(
                "title" => $this->input->post('title'),
                "measure" => $this->input->post('measure'),
                "money_atual" => substr(str_replace(",", ".", $this->input->post('money_atual')), 1),
                "debit_atual" => substr(str_replace(",", ".", $this->input->post('debit_atual')),1),
                "credit_atual" => substr(str_replace(",", ".", $this->input->post('credit_atual')),1),
                "credit_before" => substr(str_replace(",", ".", $this->input->post('credit_before')),1),
                "money_before" => substr(str_replace(",", ".", $this->input->post('money_before')),1),
                "debit_before" => substr(str_replace(",", ".", $this->input->post('debit_before')),1),
                "establishment_id" => $this->input->post('establishment_id'),

            );

            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response ['response'];
            $data['message'] = $response ['response'];

        }
        if ($id != null and $this->input->post('salvar') == '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/fuels/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response['response'];
            $data['id'] = $id;

        }

        $params2 = '';
        $endpoint2 = 'api/v1/admin/establishments';
        $metodo2 = 'GET';
        $response2 = $this->restfull->cUrl($params2, $endpoint2, $metodo2);
        $data['estabelecimentos'] = $response2['response'];


        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/fuel_form';
        $this->load->view('structure/container', $data);
    }


    public
    function delete($id)
    {
        if ($id != null or $id != '') {
            $endpoint = 'api/v1/admin/fuels/' . $id;
            $metodo = 'DELETE';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            redirect('Fuel');
        }
    }


}