<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Telesign
{
    private $customer_id;
    private $api_key;
    private $api_url;

    public function __construct()
    {
        $this->customer_id = 'B6FE1751-014D-4B6E-A2D1-2AF99711E9AE'; // Replace with your Telesign Customer ID
        $this->api_key = 'B6FE1751-014D-4B6E-A2D1-2AF99711E9AE';         // Replace with your Telesign API Key
        $this->api_url = 'https://rest-ww.telesign.com/v1/messaging'; // Base URL for Telesign
    }

    public function send_sms($phone_number, $message, $message_type = 'ARN')
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query([
                'phone_number' => $phone_number,
                'message' => $message,
                'message_type' => $message_type,
            ]),
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic " . base64_encode($this->customer_id . ":" . $this->api_key),
                "Content-Type: application/x-www-form-urlencoded",
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return ['status' => 'error', 'message' => $error];
        } else {
            return json_decode($response, true);
        }
    }
}
