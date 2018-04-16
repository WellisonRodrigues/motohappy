<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Partners extends CI_Controller
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
        $endpoint = 'api/v1/admin/partners';
        $metodo = 'GET';
        $params = '';

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//        print_r($response);
//        die;
        $data['response'] = $response['response'];

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/partners_table';
        $this->load->view('structure/container', $data);
    }

    public function new_user($id = null)
    {
        $this->load->library('Restfull');

        if ($id == null and $this->input->post('name')) {
            $endpoint = 'admin/auth/partners';
            $metodo = 'POST';
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('city'),
                'usuario' => $this->input->post('address'),
                'state' => $this->input->post('state'),
                'phone' => $this->input->post('phone'),
                'password' => $this->input->post('phone'),
                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

            );

            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//            print_r($response);
//            die;
            $data['response'] = $response['response'];


        }

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/partners_form';
        $this->load->view('structure/container', $data);
    }

}