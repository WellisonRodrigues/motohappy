<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Users extends CI_Controller
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
        $endpoint = 'api/v1/admin/users';
        $metodo = 'GET';
        $params = '';

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
        $data['response'] = $response['response'];

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/users_table';
        $this->load->view('structure/container', $data);
    }

    public function new_user($id = null)
    {
        $this->load->library('Restfull');

        if ($this->input->post('name') and $id != null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/users/' . $id;
            $metodo = 'PATCH';
            $params = array(
                'name' => $this->input->post('name'),
                'city' => $this->input->post('city'),
                'address' => $this->input->post('address'),
                'state' => $this->input->post('state'),
                'phone' => $this->input->post('phone'),
                'birthday' => $this->input->post('birthday'),
                'email' => $this->input->post('email'),
                'image' => $this->input->post('image'),

            );
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];

        }
        if ($this->input->post('name') and $id == null) {

            $this->load->library('Restfull');
            $endpoint = 'admin/auth/users';
            $metodo = 'POST';
            $params = array(
                'name' => $this->input->post('name'),
                'city' => $this->input->post('city'),
                'address' => $this->input->post('address'),
                'state' => $this->input->post('state'),
                'phone' => $this->input->post('phone'),
                'birthday' => $this->input->post('birthday'),
                'email' => $this->input->post('email'),
                'image' => $this->input->post('image'),
                'password' => $this->input->post('password')

            );
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];
        }
        if ($id != null and $this->input->post('name') == '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/users/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response['response'];
            $data['id'] = $id;

        }

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/users_form';
        $this->load->view('structure/container', $data);
    }

    public
    function delete($id)
    {
        if ($id != null or $id != '') {
            $endpoint = 'api/v1/admin/users/' . $id;
            $metodo = 'DELETE';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            redirect('Users');
        }
    }

}