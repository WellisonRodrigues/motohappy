<?php

/**
 * Created by PhpStorm.
 * User: welli
 * Date: 30/03/2018
 * Time: 17:15
 */
class Esqueci extends CI_Controller
{
    public function index()
    {
        $this->load->library('Restfull');
        $data['menu'] = false;  // Menu true significa que a pagina tera o menu principal, false deixa a pagina sem menu(menu = header + navbar)
        $data['view'] = 'pages_examples/esqueci_form';
        $this->load->view('structure/container', $data);
    }

    public function reset()
    {
        if ($this->input->post('entrar')) {

            $this->load->library('Restfull');


            switch ($this->input->post('user')) {
                case 'admin':
                    $endpoint = 'api/v1/admin/define_password';
//                    $usertype = 'admin';
                    break;
                case 'subadmin':
                    $endpoint = 'api/v1/admin/partner/define_password';
//                    $usertype = 'subadmin';
                    break;
                case 'partners':
                    $endpoint = 'api/v1/admin/subadmin/define_password';
//                    $usertype = 'partners';
                    break;


            }

            $metodo = 'POST';
            $params = $this->input->post('email');


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://motohappy.herokuapp.com/$endpoint",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "$metodo",
                CURLOPT_POSTFIELDS => "{\n\t\"email\":\"$params\"\n}",
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/json",
                    "postman-token: 04e2a05f-ad48-f6d9-1426-b66180221208"
                ),
            ));

            $headers = [];
            curl_setopt($curl, CURLOPT_HEADERFUNCTION,
                function ($curl, $header) use (&$headers) {
                    $len = strlen($header);
                    $header = explode(':', $header, 2);
                    if (count($header) < 2) // ignore invalid headers
                        return $len;

                    $name = strtolower(trim($header[0]));
                    if (!array_key_exists($name, $headers))
                        $headers[$name] = [trim($header[1])];
                    else
                        $headers[$name][] = trim($header[1]);

                    return $len;
                }
            );

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $resp['response'] = $response;
            $resp['headers'] = $headers;
            $resp['err'] = $err;
            $return['response'] = $this->arrayCastRecursive(json_decode($resp['response']));
            $return['header'] = $this->arrayCastRecursive($resp['headers']);
//            return $return;

        }
//        print_r($return['response']);
//        die;
        $data['response'] = $response ['response'];
        $data['message'] = ($response ['response'] = 'um email foi enviado');
        $data['menu'] = false;
        $data['view'] = 'pages_examples/esqueci_form';
        $this->load->view('structure/container', $data);
    }

    function arrayCastRecursive($array)
    {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $array[$key] = $this->arrayCastRecursive($value);
                }
                if ($value instanceof stdClass) {
                    $array[$key] = $this->arrayCastRecursive((array)$value);
                }
            }
        }
        if ($array instanceof stdClass) {
            return $this->arrayCastRecursive((array)$array);
        }
        return $array;


    }
}