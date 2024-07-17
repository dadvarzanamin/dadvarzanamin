<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class FontAwesomeIconsSeeder extends Seeder
{
    public function run()
    {

        $client = new Client();
        $response = $client->get('https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/metadata/icons.json');
        $data = json_decode($response->getBody(), true);

        dd($data['wifi']['svg']);

        $iconNames = array_column($data[]['svg']['brands']['path'], 'name');

        try {

            foreach ($iconNames as $iconData) {
                DB::table('icons')->insert([
                    'title' => $iconData['id'],
                ]);
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
