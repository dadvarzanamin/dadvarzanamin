<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendImageInquiryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;
    protected $method;
    protected $headers;
    protected $image;

    public $tries = 3;        // تا ۵ بار retry شود
    public $backoff = 60;     // فاصله بین retry ها ۶۰ ثانیه

    /**
     * Create a new job instance.
     */
    public function __construct($url, $method, $headers, $image)
    {
        $this->url     = $url;
        $this->method  = $method;
        $this->headers = $headers;
        $this->image   = $image;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {

            $user = User::where('national_code', $this->image['nationalCode'])->first();

            if (!$user) {
                Log::warning("User with ID $this->image['nationalCode'] not found.");
                return;
            }

            $http = Http::withHeaders($this->headers)->timeout(10);

            $response = $this->method === 'POST' ? $http->post($this->url, $this->image) : $http->send($this->method, $this->url);

            if ($response->successful()) {
                $data = $response->json();
                if (!empty($data['isSuccess']) && $data['isSuccess'] === true) {
                    $result = $data['data']['result'] ?? [];

                    $imagedata  = $data['data']['result']['image'];

                    // اینجا می‌توانید داده‌ها را در دیتابیس ذخیره کنید یا لاگ بگیرید:
                    Log::info('Name inquiry successful', compact('imagedata'));

                    $user->update([
                        'imageData'        => $imagedata,
                    ]);
                } else {
                    Log::warning('API response received but isSuccess is false.');
                    throw new \Exception('API returned failure status.');
                }
            } else {
                Log::warning('API HTTP error: ' . $response->status());
                throw new \Exception('API returned HTTP error: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('SendImageInquiryJob failed: ' . $e->getMessage());
            throw $e; // اجازه می‌دهد لاراول job را مجدد اجرا کند
        }
    }
}
