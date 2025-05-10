<?php

function sendCurlRequest($url, $method, $headers, $data = [])
{
    if (!function_exists('sendCurlRequest')) {
        function sendCurlRequest($url, $method, $headers, $data = [])
        {
            try {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                if (strtoupper($method) === 'POST') {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                }
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $response = curl_exec($ch);

                if (curl_errno($ch)) {
                    throw new \Exception(curl_error($ch));
                }

                curl_close($ch);
                return json_decode($response, true);
            } catch (\Exception $e) {
                \Log::error("CURL Request Failed: " . $e->getMessage(), [
                    'url' => $url,
                    'method' => $method,
                    'data' => $data
                ]);
                return null;
            }
        }
    }
}
