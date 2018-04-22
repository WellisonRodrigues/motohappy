<?php

/**
 * Created by PhpStorm.
 * User: wrodrigues
 * Date: 27/03/2018
 * Time: 16:04
 */
class Home extends CI_Controller
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
        if ($this->session->userdata("user")['typeuser'] == 'partners') {
            redirect('Establishments');
        } else {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/dashboard';
            $metodo = 'GET';
            $params = '';

            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//        print_r($response);
//        die;
            $data['response'] = $response['response'];



            $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
            $data['view'] = 'pages_examples/home_form';
            $this->load->view('structure/container', $data);
        }
    }

}