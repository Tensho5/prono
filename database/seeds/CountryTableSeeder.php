<?php

use App\Models\Country;

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(database_path("./datas/common/countries.json"));
        $countries = json_decode($file, true);

        foreach($countries as $code => $country) {
            Country::create([
                "name"   => $country,
                "code"   => $code,
            ]);
        }
    }
}
