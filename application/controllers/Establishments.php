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
            $params = array(


                "name" => $this->input->post('name'),
                "address" => $this->input->post('address'),
                "city" => $this->input->post('city'),
                "state" => $this->input->post('state'),
                "establishment_cod" => $this->input->post('establishment_cod'),
                "category" => [$this->input->post('categorys')],
//                "partner_id" => [],
                "image" => $this->input->post('image'),
                "attendance" => $this->input->post('attendance'),

            );
//            print_r($this->input->post());
//            die;
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];

//            $data['id'] = $response['response']['id'];
                   print_r($response);
       die;
        }
        if ($id != '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/establishments/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response['response'];
//            print_r($response);
//            die;
//            $data['message'] = $response['response'];
//            $data['id'] = $id;


        }
        if ($this->input->post('salvar') == 'salvar' and $id != null) {


            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/establishments/' . $id;
            $metodo = 'PATCH';
            if ($this->input->post('image')) {
                $params = array(


                    "name" => $this->input->post('name'),
                    "address" => $this->input->post('address'),
                    "city" => $this->input->post('city'),
                    "state" => $this->input->post('state'),
                    "establishment_cod" => $this->input->post('establishment_cod'),
                    "category" => [$this->input->post('categorys')],
//                    "partner_id" => [$this->input->post('partner_id')],
                    "image" => $this->input->post('image'),
                    "attendance" => $this->input->post('attendance'),

                );
            } else {
                $params = array(


                    "name" => $this->input->post('name'),
                    "address" => $this->input->post('address'),
                    "city" => $this->input->post('city'),
                    "state" => $this->input->post('state'),
                    "establishment_cod" => $this->input->post('establishment_cod'),
                    "category" => [$this->input->post('categorys')],
//                    "partner_id" => [$this->input->post('partner_id')],
                    "attendance" => $this->input->post('attendance'),

                );
            }

            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];
//            print_r($response);
//            die;
        }

        $params2 = '';
        $endpoint2 = 'api/v1/admin/categories';
        $metodo2 = 'GET';
        $response2 = $this->restfull->cUrl($params2, $endpoint2, $metodo2);
        $data['categories'] = $response2;
        $params3 = '';
        $endpoint3 = 'api/v1/admin/partners';
        $metodo3 = 'GET';
        $response3 = $this->restfull->cUrl($params3, $endpoint3, $metodo3);
        $data['partners'] = $response3;

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