<?php
/**
 * Created by PhpStorm.
 * User: welli
 * Date: 07/04/2018
 * Time: 13:33
 */

class Partners extends CI_Controller
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
        $endpoint = 'api/v1/admin/partners';
        $metodo = 'GET';
        $params = '';

        $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//        print_r($response);
//        die;
        $data['response'] = $response['response'];

        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/partners_table';
        $this->load->view('structure/container', $data);
    }

    public function new_user($id = null)
    {
//        $this->load->library('Restfull');
//
//        if ($id == null and $this->input->post('name')) {
//            $endpoint = 'admin/auth/partners';
//            $metodo = 'POST';
//            $params = array(
//                'name' => $this->input->post('name'),
//                'email' => $this->input->post('email'),
//                'nickname' => $this->input->post('nickname'),
////                'state' => $this->input->post('state'),
////                'phone' => $this->input->post('phone'),
//                'password' => $this->input->post('password'),
////                'password_confirmation' => $this->input->post('phone'),
////                'phone'=> $this->input->post('phone'),
//
//            );
//
//            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//            $data['message'] = $response['response'];
//            $data['response'] = $response['response'];
//
//
//        }
//
//        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
//        $data['view'] = 'pages_examples/partners_form';
//        $this->load->view('structure/container', $data);
//    }
//
//}

        if ($this->input->post('name') and $id != null) {

            $this->load->library('Restfull');
            $endpoint = 'admin/auth/partners';
            $metodo = 'POST';
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nickname' => $this->input->post('nickname'),
//                'state' => $this->input->post('state'),
//                'phone' => $this->input->post('phone'),
//                'password' => $this->input->post('password'),
//                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

            );

//            print_r($this->input->post() );
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//       print_r($response);
//       die;
        }
        if ($this->input->post('name') and $id == null) {

            $this->load->library('Restfull');
            $endpoint = 'admin/auth/partners';
            $metodo = 'POST';
            $params = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nickname' => $this->input->post('nickname'),
//                'state' => $this->input->post('state'),
//                'phone' => $this->input->post('phone'),
                'password' => $this->input->post('password'),
//                'password_confirmation' => $this->input->post('phone'),
//                'phone'=> $this->input->post('phone'),

            );
//            print_r($this->input->post());
//            die;
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response;
//                   print_r($response);
//       die;
        }
        if ($id != null and $this->input->post('name') == '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/partners/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response['response'];
            $data['id'] = $id;

        }
//        $params2 = '';
//        $endpoint2 = 'api/v1/admin/categories';
//        $metodo2 = 'GET';
//        $response2 = $this->restfull->cUrl($params2, $endpoint2, $metodo2);
//        $data['categories'] = $response2['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/partners_form';
        $this->load->view('structure/container', $data);
    }

    public
    function delete($id)
    {
        if ($id != null or $id != '') {
            $endpoint = 'api/v1/admin/partners/' . $id;
            $metodo = 'DELETE';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            redirect('Partners');
        }
    }
}