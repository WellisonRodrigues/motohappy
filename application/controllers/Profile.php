<?php

/**
 * Created by PhpStorm.
 * User: welli
 * Date: 23/04/2018
 * Time: 17:10
 */
class Profile extends CI_Controller
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

        $endpoint = 'api/v1/admin/profile';

        $metodo = 'GET';
        $params = '';
        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/profile_form';
        $this->load->view('structure/container', $data);
    }

    public function new_user($id)
    {
        $this->load->library('Restfull');
        $endpoint = 'api/v1/admin/profile';
        $metodo = 'PATCH';
        if ($this->input->post('image')) {
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => $this->input->post('image'),
                'password' => $this->input->post('password'),

            );
        } else {
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nickname' => $this->input->post('nickname'),
                'password' => $this->input->post('password'),


            );
        }
        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response['response'];
        $data['message'] = $response['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/profile_form';
        $this->load->view('structure/container', $data);
    }


}