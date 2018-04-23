<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Hot extends CI_Controller
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
        $endpoint = 'api/v1/admin/hots';
        $metodo = 'GET';
        $params = '';

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//        print_r($response);
//        die;
        $data['response'] = $response['response'];

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/hot_table';
        $this->load->view('structure/container', $data);
    }

    public function new_user($id = null)
    {
        if ($this->input->post('name') and $id == null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/hot';
            $metodo = 'POST';
            $params = array(
                'description' => $this->input->post('description'),
                'value' => $this->input->post('value'),
                'image' => $this->input->post('image'),
//                'phone' => $this->input->post('phone'),
//                'password' => $this->input->post('password'),
//                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

            );

            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];
        }

        if ($id != null and $this->input->post('name') == '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/hot/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response['response'];
//            $data['id'] = $id;

        }
        if ($this->input->post('name') and $id != null) {

            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/hot/' . $id;
            $metodo = 'PATCH';
            if ($this->input->post('image')) {
                $params = array(
                    'description' => $this->input->post('description'),
                    'value' => $this->input->post('value'),
                    'image' => $this->input->post('image'),
//                'phone' => $this->input->post('phone'),
//                'password' => $this->input->post('password'),
//                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

                );
            } else {
                $params = array(
                    'description' => $this->input->post('description'),
                    'value' => $this->input->post('value'),
//                    'nickname' => $this->input->post('nickname'),
//                    'establishments_ids' => [$this->input->post('establishments_ids')],
//                    'image' => $this->input->post('image'),
//                'phone' => $this->input->post('phone'),
//                'password' => $this->input->post('password'),
//                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

                );
            }
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//            print_r($response);
//            die;
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];
//            print_r($this->input->post());
//            print_r($response);
//            die;

        }

//        $params2 = '';
//        $endpoint2 = 'api/v1/admin/categories';
//        $metodo2 = 'GET';
//        $response2 = $this->restfull->cUrl($params2, $endpoint2, $metodo2);
//        $data['categories'] = $response2['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/hot_form';
        $this->load->view('structure/container', $data);
    }

    public
    function delete($id)
    {
        if ($id != null or $id != '') {
            $endpoint = 'api/v1/admin/hot/' . $id;
            $metodo = 'DELETE';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            redirect('Hot');
        }
    }
}
