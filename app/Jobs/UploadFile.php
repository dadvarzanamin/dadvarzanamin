<?php

namespace App\Jobs;

use App\Models\Dashboard\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Facades\Image;

class UploadFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $customers = Customer::whereId($this->data['customer_id'])->first();

        $sizes = ["300" , "600" , "900"];
        //$url['images'] = $this->resize($this->data['imagePath'].$this->data['filename'] , $sizes , $this->data['imagePath'] , $this->data['filename']);
        foreach ($sizes as $size) {
            $images[$size] = $this->data['imagePath'] . "{$size}_" . $this->data['filename'];

            Image::make($this->data['imagePath'].$this->data['filename'])
                ->resize($size, null, function ($constraint) {$constraint->aspectRatio();})
                ->save(public_path($images[$size]));
        }
        //$url['thumb'] = $url['images'][$sizes[0]];
        //$imagesUrl = $url['thumb'];
        //$customers->image = json_encode($imagesUrl, true);
    }


//    private function resize($path , $sizes , $imagePath , $filename)
//    {
//        //dd($path , $sizes , $imagePath , $filename);
//        $images['original'] = $imagePath . $filename;
//        foreach ($sizes as $size) {
//            $images[$size] = $imagePath . "{$size}_" . $filename;
//
//            Image::make('/public/customers/images/Kanoon_logo.png')
//               ->resize($size, null, function ($constraint) {$constraint->aspectRatio();})
//               ->save(public_path($images[$size]));
//            //dd($d);
//        }
//
//        return $images;
//    }
}
