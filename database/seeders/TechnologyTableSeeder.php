<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML' , 'CSS' , 'JavaScript' , 'PHP' , 'Java' ,'C++'];
        foreach ($technologies as $tech) {
            $new_technology = new Technology();
            $new_technology->name = $tech;
            $new_technology->save();

        }
    }
}
