<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Categories extends CI_Controller
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
        $endpoint = 'api/v1/admin/categories';
        $metodo = 'GET';
        $params = '';

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response ['response'];
//        print_r($response);
//        die;
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/categories_table';
        $this->load->view('structure/container', $data);
    }

    public function new_categories()
    {
        $this->load->library('Restfull');
        $endpoint = 'api/v1/admin/categories';
        $metodo = 'POST';
        $params = array('name' => $this->input->post('categoria_name'));

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        if ($response) {
            return true;
        }


    }

}