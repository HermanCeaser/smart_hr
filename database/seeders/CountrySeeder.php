<?php

namespace Database\Seeders;

use App\Models\Country;
use ErrorException;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // If Filexists and the file is not empty, then 
        // loop through the countries list and insert them in the countries table and states tables
        // Else fetch the data using `Http` and save the file to the path.
        // then insert the countries  using the fetched data

        $directoryPath = __DIR__ . '/data';
        $filePath = $directoryPath . '/countries.json';

        $dataURL = 'http://data.lunarphp.io/countries+states.json';

        // Check if the directory exists, if not, create it
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0755, true);
        }

        if (file_exists($filePath) && filesize($filePath) > 0) {
            $countries = json_decode(file_get_contents($filePath), true);
        } else {
            $response = Http::get($dataURL);

            if ($response->ok()) {
                $countries = $response->json();
                try {
                    file_put_contents($filePath, json_encode($countries));
                } catch (ErrorException $e) {
                    Log::error($e->getMessage());
                }
            } else {
                throw new \Exception('Failed to fetch data from the URL.');
            }
        }

        foreach ($countries as $country) {
            $model = Country::create([
                'name' => $country['name'],
                'iso3' => $country['iso3'],
                'iso2' => $country['iso2'],
                'phonecode' => $country['phone_code'],
                'capital' => $country['capital'],
                'currency' => $country['currency'],
                'native' => $country['native'],
                'emoji' => $country['emoji'],
                'emoji_u' => $country['emojiU'],
            ]);

            $states = collect($country['states'])->map(function ($state) {
                return [
                    'name' => $state['name'],
                    'code' => $state['state_code'],
                ];
            });

            $model->states()->createMany($states->toArray());
        }
    }
}
