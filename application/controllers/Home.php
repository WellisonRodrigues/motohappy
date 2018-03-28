<?php

/**
 * Created by PhpStorm.
 * User: wrodrigues
 * Date: 27/03/2018
 * Time: 16:04
 */
class Home extends CI_Controller
{


    public function index()
    {

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/home_form';
        $this->load->view('structure/container', $data);
    }

}