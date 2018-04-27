<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Establishments extends CI_Controller
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
        $endpoint = 'api/v1/admin/establishments';
        $metodo = 'GET';
        $params = '';
        $params3 = '';
        $endpoint3 = 'api/v1/admin/partners';
        $metodo3 = 'GET';
        $response3 = $this->restfull->cUrl($params3, $endpoint3, $metodo3);
        $data['partners'] = $response3;
        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response['response'];
//        print_r($response);
//        die;
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/establishments_table';
        $this->load->view('structure/container', $data);
    }

    public function new_establishments($id = null)
    {

        if ($this->input->post('salvar') == 'salvar' and $id == null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/establishments';
            $metodo = 'POST';
            $vetor = explode(',',$this->input->post('categorys'));
            $params = array(


                "name" => $this->input->post('name'),
                "address" => $this->input->post('address'),
                "city" => $this->input->post('city'),
                "state" => $this->input->post('state'),
                "number" => $this->input->post('number'),
                "neighborhood" => $this->input->post('neighborhood'),
                "establishment_cod" => $this->input->post('establishment_cod'),
                "category" => $vetor,
                "description" => $this->input->post('description'),
                "image" => $this->input->post('image'),
                "attendance" => $this->input->post('attendance'),

            );
//            print_r($this->input->post());
//            die;
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];

        }
        if ($id != '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/establishments/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response['response'];

        }
        if ($this->input->post('salvar') == 'salvar' and $id != null) {


            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/establishments/' . $id;
            $metodo = 'PATCH';
            $vetor = explode(',',$this->input->post('categorys'));
            if ($this->input->post('image')) {
                $params = array(


                    "name" => $this->input->post('name'),
                    "address" => $this->input->post('address'),
                    "city" => $this->input->post('city'),
                    "state" => $this->input->post('state'),
                    "establishment_cod" => $this->input->post('establishment_cod'),
                    "category" => $vetor,
                    "number" => $this->input->post('number'),
                    "neighborhood" => $this->input->post('neighborhood'),
                    "image" => $this->input->post('image'),
                    "attendance" => $this->input->post('attendance'),
                    "description" => $this->input->post('description'),
                );
            } else {
                $params = array(


                    "name" => $this->input->post('name'),
                    "address" => $this->input->post('address'),
                    "city" => $this->input->post('city'),
                    "state" => $this->input->post('state'),
                    "establishment_cod" => $this->input->post('establishment_cod'),
                    "category" => $vetor,
                    "number" => $this->input->post('number'),
                    "neighborhood" => $this->input->post('neighborhood'),
                    "attendance" => $this->input->post('attendance'),
                    "description" => $this->input->post('description'),
                );
            }


            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//            print_r($response);
//            die;
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];

        }

        $params2 = '';
        $endpoint2 = 'api/v1/admin/categories';
        $metodo2 = 'GET';
        $response2 = $this->restfull->cUrl($params2, $endpoint2, $metodo2);
        $data['categories'] = $response2;

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/establishments_form';
        $this->load->view('structure/container', $data);
    }

    public
    function delete($id)
    {
        if ($id != null or $id != '') {
            $endpoint = 'api/v1/admin/establishments/' . $id;
            $metodo = 'DELETE';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            redirect('Establishments');
        }
    }
}