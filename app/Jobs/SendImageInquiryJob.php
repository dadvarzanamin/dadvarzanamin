<?php

namespace App\Jobs;

use App\Models\Dashboard\Estelam;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendImageInquiryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId, $nationalCode, $birthDate, $headers;

    public function __construct($userId, $nationalCode, $birthDate, $headers)
    {
        $this->userId = $userId;
        $this->nationalCode = $nationalCode;
        $this->birthDate = $birthDate;
        $this->headers = $headers;
    }

    public function handle()
    {
        $estelam = Estelam::whereId(7)->first(); // Image Inquiry
        $response = $this->sendCurlRequest($estelam->action_route, $estelam->method, $this->headers, [
            'nationalCode'  => $this->nationalCode,
            'birthDate'     => $this->birthDate,
        ]);

        if ($response['isSuccess'] === true) {
            $image = $response['data']['result']['image'] ?? null;

            User::where('id', $this->userId)->update([
                'imagedata' => $image,
            ]);

            Log::info("Image inquiry success", ['user_id' => $this->userId]);
        } else {
            Log::warning("Image inquiry failed", ['user_id' => $this->userId]);
        }
    }
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
