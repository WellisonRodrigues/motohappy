<?php

/**
 * Created by PhpStorm.
 * User: welli
 * Date: 30/03/2018
 * Time: 17:15
 */
class Sair extends CI_Controller
{
    public function index()
    {
        $this->session->sess_destroy();

        $data['alert'] =
            [
                'type' => 'erro',
                'message' => 'Você saiu do sistema'
            ];
        $this->session->set_flashdata('alert', $data['alert']);
        redirect('Login');
    }
}