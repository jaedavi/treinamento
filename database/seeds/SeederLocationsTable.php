<?php

use Illuminate\Database\Seeder;

class SeederLocationsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedStates();
        $this->seedCities();
    }

    public function seedStates()
    {
        $states = [
            ['state' => 'Sao Paulo','abbr' => 'SP'],
            ['state' => 'Rio de Janeiro','abbr' => 'RJ'],
            ['state' => 'Minas Gerais','abbr' => 'MG'],
        ];

        foreach($states as $state) {
            DB::table('states')->insert($state);
        }
    }

    public function seedCities()
    {
        $cities = [
            ['city' => 'Bauru', 'state_abbr' => 'SP'],
            ['city' => 'Marília', 'state_abbr' => 'SP'],
            ['city' => 'Botucatu', 'state_abbr' => 'SP'],

            ['city' => 'Rio de Janeiro', 'state_abbr' => 'RJ'],
            ['city' => 'Copacabana', 'state_abbr' => 'RJ'],
            ['city' => 'Ipanema', 'state_abbr' => 'RJ'],

            ['city' => 'Belo Horizonte', 'state_abbr' => 'MG'],
            ['city' => 'Uberlândia', 'state_abbr' => 'MG'],
            ['city' => 'Betim', 'state_abbr' => 'MG'],
        ];

        foreach($cities as $city) {
            $state = DB::table('states')
                ->where('abbr', $city['state_abbr'])
                ->first()
            ;

            unset($city['state_abbr']);
            $city['state_id'] = $state->id;

            DB::table('cities')->insert($city);
        }
    }
}
