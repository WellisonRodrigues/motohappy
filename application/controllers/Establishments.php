<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Establishments extends CI_Controller
{
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
        if ($id) {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/establishments/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $endpoint2 = 'api/v1/admin/categories';
            $metodo2 = 'GET';
            $response2 = $this->restfull->cUrl($params, $endpoint2, $metodo2);
            $data['response'] = $response['response'];
            $data['categories'] = $response2['response'];
            $data['id'] = $id;

        }

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/establishments_form';
        $this->load->view('structure/container', $data);
    }

}