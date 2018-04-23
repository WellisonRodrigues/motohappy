<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 23/04/2018
 * Time: 17:10
 */
class Profile extends CI_Controller {

    function index(){

        $this->load->library('Restfull');

        $endpoint = 'api/v1/admin/partners';

        $metodo = 'GET';
        $params = '';
        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/profle_form';
        $this->load->view('structure/container', $data);
    }





}