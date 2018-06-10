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
        $data['response'] = $response['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/hot_table';
        $this->load->view('structure/container', $data);
    }

    public function new_user($id = null)
    {
        $remove = array('R', '$');
        $this->load->library('Restfull');
        if ($this->input->post('salvar') and $id == null) {
            $phpdate = strtotime($this->input->post('duration'));
            $datalocal = date('d/m/Y', $phpdate);
            $endpoint = 'api/v1/admin/hots';
            $metodo = 'POST';
            if ($this->input->post('type') == 'combo') {
                $params = array(
                    'description' => $this->input->post('description'),
                    "value" => str_replace($remove, "", str_replace(",", ".", $this->input->post('value'))),
                    "value_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('value_before'))),
                    'establishment_id' => $this->input->post('establishment_id'),
                    'title' => $this->input->post('title'),
                    'duration' => $datalocal,
                    'image' => $this->input->post('image'),
                    'category' => $this->input->post('type'),


                );
            } elseif ($this->input->post('type') == 'fuel') {
                $params = array(
                    'description' => $this->input->post('description'),
                    "measure" => $this->input->post('measure'),
                    "value" => str_replace($remove, "", str_replace(",", ".", $this->input->post('money_atual'))),
                    "debit_atual" => str_replace($remove, "", str_replace(",", ".", $this->input->post('debit_atual'))),
                    "credit_atual" => str_replace($remove, "", str_replace(",", ".", $this->input->post('credit_atual'))),
                    "credit_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('credit_before'))),
                    "value_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('money_before'))),
                    "debit_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('debit_before'))),
                    'establishment_id' => $this->input->post('establishment_id_fuel'),
                    'title' => $this->input->post('title'),
                    'duration' => $datalocal,
                    'image' => $this->input->post('image'),
                    'category' => $this->input->post('type'),

                );
            }
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
//            print_r($response);
//            die;
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];

        }

        if ($id != null and $this->input->post('salvar') == '') {
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/hots/' . $id;
            $metodo = 'GET';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['response'] = $response['response'];


        }
        if ($this->input->post('salvar') and $id != null) {
            $phpdate = strtotime($this->input->post('duration'));
            $datalocal = date('d/m/Y', $phpdate);
            $this->load->library('Restfull');
            $endpoint = 'api/v1/admin/hots/' . $id;
            $metodo = 'PATCH';
            if ($this->input->post('image')) {
                if ($this->input->post('type') == 'combo') {
                    $params = array(
                        'description' => $this->input->post('description'),
                        "value" => str_replace($remove, "", str_replace(",", ".", $this->input->post('value'))),
                        "value_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('value_before'))),
                        'establishment_id' => $this->input->post('establishment_id'),
                        'title' => $this->input->post('title'),
                        'duration' => $datalocal,
                        'image' => $this->input->post('image'),
                        'category' => $this->input->post('type'),


                    );
                } elseif ($this->input->post('type') == 'fuel') {
                    $params = array(
                        'description' => $this->input->post('description'),
                        "measure" => $this->input->post('measure'),
                        "value" => str_replace($remove, "", str_replace(",", ".", $this->input->post('money_atual'))),
                        "debit_atual" => str_replace($remove, "", str_replace(",", ".", $this->input->post('debit_atual'))),
                        "credit_atual" => str_replace($remove, "", str_replace(",", ".", $this->input->post('credit_atual'))),
                        "credit_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('credit_before'))),
                        "value_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('money_before'))),
                        "debit_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('debit_before'))),
                        'establishment_id' => $this->input->post('establishment_id_fuel'),
                        'title' => $this->input->post('title'),
                        'duration' => $datalocal,
                        'image' => $this->input->post('image'),
                        'category' => $this->input->post('type'),

                    );
                }
            } else {

                if ($this->input->post('type') == 'combo') {
                    $params = array(
                        'description' => $this->input->post('description'),
                        "value" => str_replace($remove, "", str_replace(",", ".", $this->input->post('value'))),
                        "value_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('value_before'))),
                        'establishment_id' => $this->input->post('establishment_id'),
                        'title' => $this->input->post('title'),
                        'duration' => $datalocal,
                        'image' => $this->input->post('image'),
                        'category' => $this->input->post('type'),


                    );
                } elseif ($this->input->post('type') == 'fuel') {
                    $params = array(
                        'description' => $this->input->post('description'),
                        "measure" => $this->input->post('measure'),
                        "value" => str_replace($remove, "", str_replace(",", ".", $this->input->post('money_atual'))),
                        "debit_atual" => str_replace($remove, "", str_replace(",", ".", $this->input->post('debit_atual'))),
                        "credit_atual" => str_replace($remove, "", str_replace(",", ".", $this->input->post('credit_atual'))),
                        "credit_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('credit_before'))),
                        "value_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('money_before'))),
                        "debit_before" => str_replace($remove, "", str_replace(",", ".", $this->input->post('debit_before'))),
                        'establishment_id' => $this->input->post('establishment_id_fuel'),
                        'title' => $this->input->post('title'),
                        'duration' => $datalocal,
                        'image' => $this->input->post('image'),
                        'category' => $this->input->post('type'),

                    );
                }
            }
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            $data['message'] = $response['response'];
            $data['response'] = $response['response'];
        }
//        print_r(json_encode($params));
//        die;
        $params2 = '';
        $endpoint2 = 'api/v1/admin/establishments';
        $metodo2 = 'GET';
        $response2 = $this->restfull->cUrl($params2, $endpoint2, $metodo2);
        $data['estabelecimentos'] = $response2['response'];
        $data['menu'] = true;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/hot_form';
        $this->load->view('structure/container', $data);
    }

    public
    function delete($id)
    {
        if ($id != null or $id != '') {
            $endpoint = 'api/v1/admin/hots/' . $id;
            $metodo = 'DELETE';
            $params = '';
            $response = $this->restfull->cUrl($params, $endpoint, $metodo);
            redirect('Hot');
        }
    }
}
