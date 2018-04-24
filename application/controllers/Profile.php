<?php

/**
 * Created by PhpStorm.
 * User: welli
 * Date: 23/04/2018
 * Time: 17:10
 */
class Profile extends CI_Controller
{

    public function index()
    {

        $this->load->library('Restfull');

        $endpoint = 'api/v1/admin/';

        $metodo = 'GET';
        $params = '';
        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/profile_form';
        $this->load->view('structure/container', $data);
    }

    public function update($id)
    {
        $this->load->library('Restfull');
        $endpoint = 'api/v1/admin/partners/' . $id;
        $metodo = 'PATCH';
        if ($this->input->post('image')) {
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
//                'nickname' => $this->input->post('nickname'),
//                'establishments_ids' => [$this->input->post('establishments_ids')],
                'image' => $this->input->post('image'),
//                'phone' => $this->input->post('phone'),
                'password' => $this->input->post('password'),
//                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

            );
        } else {
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nickname' => $this->input->post('nickname'),
//                'establishments_ids' => [$this->input->post('establishments_ids')],
//                    'image' => $this->input->post('image'),
//                'phone' => $this->input->post('phone'),
                'password' => $this->input->post('password'),
//                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

            );
        }
        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        redirect('Profile');
    }


}