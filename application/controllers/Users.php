<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Users extends CI_Controller
{
    public function index()
    {
        $this->load->library('Restfull');
        $endpoint = 'auth/sign_in';
        $metodo = 'GET';
        $params = '';

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/users_table';
        $this->load->view('structure/container', $data);
    }

    public function new_user()
    {
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/users_form';
        $this->load->view('structure/container', $data);
    }

}