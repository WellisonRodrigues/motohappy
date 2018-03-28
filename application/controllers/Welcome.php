<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        //Carrega bibliotecas uteis para tabelas(usados na view table)
        $this->load->library('table');
        $this->load->library('Restfull');
        $this->load->library('PerfectTable');

        //Carrega as views
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/table';
        $this->load->view('structure/container', $data);
    }
}
