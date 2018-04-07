<?php

/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 01/03/2018
 * Time: 22:26
 */
class Restfull
{

    function cUrl($params, $endpoint, $metodo)
    {
        $curl = curl_init();
        $base_url = 'https://motohappy.herokuapp.com';
        $array_fields = json_encode($params);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$base_url/$endpoint",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "$metodo",
            CURLOPT_POSTFIELDS => "$array_fields",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: b516d027-a2ad-5220-baeb-8a050af56995"
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
        $return = $this->arrayCastRecursive(json_decode($response));
        return $return;


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