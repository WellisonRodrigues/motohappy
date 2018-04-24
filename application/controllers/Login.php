<?php

/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 04/03/2018
 * Time: 21:40
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function index()
    {

        $data['menu'] = false;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/login_form';
        $this->load->view('structure/container', $data);
    }

    public function sign_in()
    {

        if ($this->input->post('entrar') == 'ENTRAR') {


            $this->load->library('Restfull');

            switch ($this->input->post('user')) {
                case 'admin':
                    $endpoint = 'auth/sign_in';
                    $usertype = 'admin';
                    break;
                case 'subadmin':
                    $endpoint = 'admin/auth/subadmins/sign_in';
                    $usertype = 'subadmin';
                    break;
                case 'partners':
                    $endpoint = 'admin/auth/partners/sign_in';
                    $usertype = 'partners';
                    break;


            }


            $metodo = 'POST';
            $params = array('email' => $this->input->post('email'), 'password' => $this->input->post('password'));

            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//            echo '<pre>';
//            print_r($response);
//            die;
            if (isset($response['response']['errors'][0])) {
                $data['message'] = $response['response']['errors'][0];
                $data['menu'] = false;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
                $data['view'] = 'pages_examples/login_form';
                $this->load->view('structure/container', $data);
            } else {
                $userAPI = array('id' => $response['response']['data']['id'], 'name' => $response['response']['data']['name'],
                    'uid' => $response['header']['uid'],'establishments_ids'=> @$response['establishments_ids'], 'image' => @$response['image']['url'], 'auth_token' => $response['header']['access-token'], 'typeuser' => $usertype, 'client' => $response['header']['client']);
                $this->session->set_userdata('user', $userAPI);
                redirect('Home');
            }
        }
    }

    public function sign_up()
    {

    }

}