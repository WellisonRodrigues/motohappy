<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Combos extends CI_Controller
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
        $endpoint = 'api/v1/admin/combos';
        $metodo = 'GET';
        $params = '';

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//        print_r($response);
//        die;
        $data['response'] = $response['response'];

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/combos_table';
        $this->load->view('structure/container', $data);
    }


    public function new_user($id = null)
    {
        if ($this->input->post('salvar') and $id != null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/combos/' . $id;
            $metodo = 'PATCH';
            $params = array(


                "description" => $this->input->post('description'),
                "establishment_id" => $this->input->post('establishment_id'),
                "value" => $this->input->post('valor'),
                "value_before" => $this->input->post('value_before'),

            );
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response ['response'];
            $data['message'] = $response ['response'];
        }
        if ($this->input->post('salvar') and $id == null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/combos';
            $metodo = 'POST';
            $params = array(

                "description" => $this->input->post('description'),
                "establishment_id" => $this->input->post('establishment_id'),
                "value" => $this->input->post('valor'),
                "value_before" => $this->input->post('value_before'),
            );
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response ['response'];
            $data['message'] = $response ['response'];
        }
        if ($id != null and $this->input->post('salvar') == '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/combos/' . $id;
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
        $data['view'] = 'pages_examples/combos_form';
        $this->load->view('structure/container', $data);
    }

    public
    function delete($id)
    {
        if ($id != null or $id != '') {
            $endpoint = 'api/v1/admin/combos/' . $id;
            $metodo = 'DELETE';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            redirect('Combos');
        }
    }

}