<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendNameInquiryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;
    protected $method;
    protected $headers;
    protected $fullname;

    public $tries = 3;        // تا ۵ بار retry شود
    public $backoff = 60;     // فاصله بین retry ها ۶۰ ثانیه

    /**
     * Create a new job instance.
     */
    public function __construct($url, $method, $headers, $fullname)
    {
        $this->url     = $url;
        $this->method  = $method;
        $this->headers = $headers;
        $this->fullname = $fullname;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {

            $user = User::where('national_code', $this->fullname['nationalCode'])->first();

            if (!$user) {
                Log::warning("User with ID {$this->fullname['nationalCode']} not found.");
                return;
            }

            $http = Http::withHeaders($this->headers)->timeout(10);

            $response = $this->method === 'POST' ? $http->post($this->url, $this->fullname) : $http->send($this->method, $this->url);

            if ($response->successful()) {
                $data = $response->json();
                if (!empty($data['isSuccess']) && $data['isSuccess'] === true) {
                    $result = $data['data']['result'] ?? [];

                    $name        = ($result['firstName'] ?? '') . ' ' . ($result['lastName'] ?? '');
                    $gender      = $result['gender'] ?? null;
                    $father_name = $result['fatherName'] ?? null;

                    // اینجا می‌توانید داده‌ها را در دیتابیس ذخیره کنید یا لاگ بگیرید:
                    Log::info('Name inquiry successful', compact('name', 'gender', 'father_name'));

                    $user->update([
                        'name'        => $name,
                        'gender'      => $gender,
                        'father_name' => $father_name,
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
            Log::error('SendNameInquiryJob failed: ' . $e->getMessage());
            throw $e; // اجازه می‌دهد لاراول job را مجدد اجرا کند
        }
    }
}
